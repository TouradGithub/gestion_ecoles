<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Section;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\My_Parent;
use App\Models\Type_Blood;
use App\Models\Nationalitie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('students')->delete();
        $students = new Student();
        $students->name = ['ar' => 'احمد ', 'en' => 'student '];
        $students->email = 'student@yahoo.com';
        $students->password = Hash::make('1234');
        $students->gender_id = 1;
        $students->Date_Birth = date('1995-01-01');
        $students->Grade_id = Grade::all()->unique()->random()->id;
        $students->Classroom_id =Classroom::all()->unique()->random()->id;
        $students->section_id = Section::all()->unique()->random()->id;
        $students->parent_id = My_Parent::all()->unique()->random()->id;
        $students->academic_year ='2021';
        $students->save();
    }
}
