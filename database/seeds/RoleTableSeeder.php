<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'administrator';
        $role_admin->description = 'Administrator has a full access to the site and admin panel';
        $role_admin->save();

        $role_student = new Role();
        $role_student->name = 'student';
        $role_student->description = 'Student User';
        $role_student->save();

        $role_staff = new Role();
        $role_staff->name = 'staff';
        $role_staff->description = 'Staff User';
        $role_staff->save();
    }
}
