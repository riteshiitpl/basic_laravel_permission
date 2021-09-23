<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$role = Role::create(['name' => 'superadmin','display_name'=>'superadmin']);
    	    	
        $user = User::create([
            'name' => Str::random(10),
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('superadmin');

        $role = Role::create(['name' => 'admin','display_name'=>'admin','created_by'=>1]);
                
        $user = User::create([
            'name' => Str::random(10),
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('admin');

    }
}
