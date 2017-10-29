<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);
        // Add some interview type.
        $this->call(AddInterviewTypes::class);
        // Add some interviews .
        $this->call(InterviewsTableSeeder::class);
        // Add dummy Admissions for interview
        $this->call(AddDummyAdmissions::class);
    }
}
