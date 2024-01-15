<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;


class UsersController extends Controller
{
    public function index() {
        return view('administrator.users.index',[
            'users' => User::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $users = '';
        return view('administrator.users.create', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt('rahasia');
        $users->save();

        $role = Role::find($request->role_id);
        $users->attachRole($role);

        return redirect()->route('administrator.user')->with(['save' => 'Berhasil!!!']);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = bcrypt('rahasia');
        $users->save();

        $role = Role::find($request->role_id);
        $users->syncRoles([$role]);

        return redirect()->route('administrator.user')->with(['update' => 'Berhasil!!!']);
    }

    public function delete($id)
    {
        $member = User::Find($id);
        $member->delete();

        return redirect()->route('administrator.user')->with(['delete' => 'Berhasil Menghapus!!!']);
    }
}

