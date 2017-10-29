<?php

use Illuminate\Database\Seeder;
use App\Interview;

class InterviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Interview();
        $type->type_id = 1;
        $type->name = 'Meeting with students';
        $type->save();

        $type = new Interview();
        $type->type_id = 2;
        $type->name = 'First written interview';
        $type->save();
    }
}
