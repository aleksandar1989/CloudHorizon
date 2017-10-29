<?php

use Illuminate\Database\Seeder;
use App\Type;

class AddInterviewTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new Type();
        $type->name = 'Freshman interview';
        $type->description = 'An interview is not a required part of the application process, but we encourage you to meet and talk with student interviewer';
        $type->status = 1;
        $type->save();

        $type = new Type();
        $type->name = 'Transfer interview';
        $type->description = 'Formal admission interviews are required for transfer applicants';
        $type->status = 1;
        $type->save();


    }
}

