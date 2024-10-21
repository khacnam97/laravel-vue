<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = DB::select("SELECT * FROM `roles` WHERE name ='admin' ");
        if (!$roleAdmin) {
            Role::create(['name' => 'admin']);
        }
        $roleDis = DB::select("SELECT * FROM `roles` WHERE name ='user' ");
        if (!$roleDis) {
            Role::create(['name' => 'user']);
        }
        //user admin , role admin
        $user =  User::create([
            'name' => 'admin',
            'password' => \Hash::make('admin'),
            'email' => 'admin@gmail.com',
        ]);
        $role = Role::findByName('admin');

        $user->assignRole([$role->id]);

    }
}
