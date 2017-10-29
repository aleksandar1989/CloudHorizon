<?php

use Illuminate\Database\Seeder;
use App\Admission;

class AddDummyAdmissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ['interview_id' => 1, 'user_id' => 1, 'title'=>'Meeting with students', 'start_date'=>'2017-10-30 12:00:00', 'end_date'=>'2017-10-30 13:00:00', 'status' => 1],

            ['interview_id' => 2, 'user_id' => 1, 'title'=>'First written interview', 'start_date'=>'2017-10-31 09:00:00', 'end_date'=>'2017-10-31 10:00:00', 'status' => 1],

            ['interview_id' => 1, 'user_id' => 1, 'title'=>'Meeting with students', 'start_date'=>'2017-10-30 10:00:00', 'end_date'=>'2017-10-30 11:00:00', 'status' => 1],

        ];

        foreach ($data as $key => $value) {

            Admission::create($value);

        }
    }
}
