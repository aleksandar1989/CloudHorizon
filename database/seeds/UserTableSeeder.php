<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'administrator')->first();

        $user = new User();
        $user->first_name = 'Aleksandar';
        $user->last_name = 'Markovic';
        $user->email = 'admissions@cloudhorizon.com';
        $user->phone = '065/8888-538';
        $user->password = bcrypt('cloud');
        $user->status = 1;
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
