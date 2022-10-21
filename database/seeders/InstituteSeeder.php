<?php

namespace Database\Seeders;

use App\Models\MarksGrading;
use Illuminate\Database\Seeder;
use App\Models\FeeParticularAmount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InstituteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeeParticularAmount::create(['admission_fee' => 0,'registration_fee' => 0,'books' => 0,'uniform' => 0,'fine' => 0,'other' => 0,'per_course_fee' => 0]);
        MarksGrading::create(['grade_name' => 'A+','percent_from' => 100,'percent_upto' =>90,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'A','percent_from' => 85,'percent_upto' =>89,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'B+','percent_from' => 75,'percent_upto' =>84,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'B','percent_from' => 65,'percent_upto' =>74,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'C+','percent_from' => 55,'percent_upto' =>64,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'C','percent_from' => 45,'percent_upto' =>54,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'D','percent_from' => 34,'percent_upto' =>44,'status' => 'pass']);
        MarksGrading::create(['grade_name' => 'F','percent_from' => 0,'percent_upto' =>33,'status' => 'fail']);
    }
}
