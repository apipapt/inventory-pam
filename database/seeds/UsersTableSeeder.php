<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Permission;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat role Administrator
        $administratorRole = new Role();
        $administratorRole->name = "administrator";
        $administratorRole->display_name = "Administrator";
        $administratorRole->save();

        // Membuat role Admin
        $adminRole = new Role();
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin";
        $adminRole->save();

        // Membuat role Checker
        $checkerRole = new Role();
        $checkerRole->name = "checker";
        $checkerRole->display_name = "Checker";
        $checkerRole->save();

        // Membuat sample administrator
        $administrator = new User();
        $administrator->name = 'Administrator Apt';
        $administrator->email = 'administrator@apt.com';
        $administrator->email_verified_at = now();
        $administrator->password = bcrypt('rahasia');
        $administrator->save();
        $administrator->attachRole($administratorRole);

        // Membuat sample admin
        $admin = new User();
        $admin->name = 'Admin Apt';
        $admin->email = 'admin@apt.com';
        $admin->email_verified_at = now();
        $admin->password = bcrypt('rahasia');
        $admin->save();
        $admin->attachRole($adminRole);

        // Membuat sample checker
        $checker = new User();
        $checker->name = 'Checker Apt';
        $checker->email = 'checker@apt.com';
        $checker->email_verified_at = now();
        $checker->password = bcrypt('rahasia');
        $checker->save();
        $checker->attachRole($checkerRole);
    }
}
