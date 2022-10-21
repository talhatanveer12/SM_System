<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher  = User::create(
            ['name' => 'Awais Tanveer', 'email' => 'awaistanveer930@gmail.com', 'type' => 'teacher', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Employee::create([
            'reg_no' => '0001',
            'employee_no'=> '0001',
            'course_id' => 1,
            'date_of_birth' => now(),
            'first_name' => 'Awais',
            'last_name' => 'Tanveer',
            'gender' => 'male',
            'category' => 'general',
            'email' => $teacher->email,
            'religion' => 'islam',
            'joining_date' => now(),
            'cnic_no' => '32323232323',
            'phone' => '03455559159',
            'eduction' => 'BS',
            'specialization' => 'english',
            'employee_address' => 'johar town lahore',
        ]);

        $teacher  = User::create(
            ['name' => 'Anas Tanveer', 'email' => fake()->safeEmail(), 'type' => 'teacher', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Employee::create([
            'reg_no' => '0002',
            'employee_no'=> '0002',
            'course_id' => 2,
            'date_of_birth' => now(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => 'male',
            'category' => 'general',
            'email' => $teacher->email,
            'religion' => 'islam',
            'joining_date' => now(),
            'cnic_no' => '32323232323',
            'phone' => '03455559159',
            'eduction' => 'BS',
            'specialization' => 'english',
            'employee_address' => 'johar town lahore',
        ]);


        $teacher  = User::create(
            ['name' => 'Anas Tanveer', 'email' => fake()->safeEmail(), 'type' => 'teacher', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Employee::create([
            'reg_no' => '0003',
            'employee_no'=> '0003',
            'course_id' => 3,
            'date_of_birth' => now(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => 'male',
            'category' => 'general',
            'email' => $teacher->email,
            'religion' => 'islam',
            'joining_date' => now(),
            'cnic_no' => '32323232323',
            'phone' => '03455559159',
            'eduction' => 'BS',
            'specialization' => 'english',
            'employee_address' => 'johar town lahore',
        ]);

        $teacher  = User::create(
            ['name' => 'Anas Tanveer', 'email' => fake()->safeEmail(), 'type' => 'teacher', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Employee::create([
            'reg_no' => '0004',
            'employee_no'=> '0004',
            'course_id' => 4,
            'date_of_birth' => now(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => 'male',
            'category' => 'general',
            'email' => $teacher->email,
            'religion' => 'islam',
            'joining_date' => now(),
            'cnic_no' => '32323232323',
            'phone' => '03455559159',
            'eduction' => 'BS',
            'specialization' => 'english',
            'employee_address' => 'johar town lahore',
        ]);

        $teacher  = User::create(
            ['name' => 'Anas Tanveer', 'email' => fake()->safeEmail(), 'type' => 'teacher', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Employee::create([
            'reg_no' => '0005',
            'employee_no'=> '0005',
            'course_id' => 5,
            'date_of_birth' => now(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => 'male',
            'category' => 'general',
            'email' => $teacher->email,
            'religion' => 'islam',
            'joining_date' => now(),
            'cnic_no' => '32323232323',
            'phone' => '03455559159',
            'eduction' => 'BS',
            'specialization' => 'english',
            'employee_address' => 'johar town lahore',
        ]);
    }
}
