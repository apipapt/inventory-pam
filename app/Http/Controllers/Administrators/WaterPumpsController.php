<?php

namespace App\Http\Controllers\Administrators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WaterPump;
use App\User;

class WaterPumpsController extends Controller
{
    public function index() {
        return view('administrator.waterPump.index',[
            'datas' => WaterPump::latest()->paginate(10)
        ]);
    }

    public function create()
    {
        $datas = '';
        return view('administrator.waterPump.create', compact('datas'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $data = new WaterPump;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->save();

        return redirect()->route('administrator.waterpump')->with(['save' => 'Berhasil!!!']);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
        ]);

        $data = WaterPump::find($id);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->save();

        return redirect()->route('administrator.waterpump')->with(['update' => 'Berhasil!!!']);
    }

    public function delete($id) {
        $data = WaterPump::Find($id);
        $data->delete();

        return redirect()->route('administrator.waterpump')->with(['delete' => 'Berhasil Menghapus!!!']);
    }

}
