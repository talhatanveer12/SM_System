<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student  = User::create(
            ['name' => 'Anas Tanveer', 'email' => 'anastanveer930@gmail.com', 'type' => 'student', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );
        $guardian  = User::create(
            ['name' => 'Tanveer', 'email' => 'tanveer930@gmail.com', 'type' => 'guardian', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Student::create([
            'admission_no' => '0001',
            'roll_no'=> '0001',
            'class_id' => 1,
            'date_of_birth' => now(),
            'first_name' => 'Anas',
            'last_name' => 'Tanveer',
            'gender' => 'male',
            'category' => 'general',
            'email' => $student->email,
            'religion' => 'islam',
            'admission_date' => now(),
            'guardian_options' => 'father',
            'guardian_relation' => 'father',
            'guardian_name' => $guardian->name,
            'guardian_email' => $guardian->email,
            'guardian_phone' => '03000000000',
            'guardian_address' => 'johar town lahore',
        ]);

        $student  = User::create(
            ['name' => 'Awais Ali', 'email' => fake()->safeEmail(), 'type' => 'student', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );
        $guardian  = User::create(
            ['name' => 'Tanveer', 'email' => fake()->safeEmail(), 'type' => 'guardian', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Student::create([
            'admission_no' => '0002',
            'roll_no'=> '0002',
            'class_id' => 1,
            'date_of_birth' => now(),
            'first_name' => 'Awais',
            'last_name' => 'Ali',
            'gender' => 'male',
            'category' => 'general',
            'email' => $student->email,
            'religion' => 'islam',
            'admission_date' => now(),
            'guardian_options' => 'father',
            'guardian_relation' => 'father',
            'guardian_name' => $guardian->name,
            'guardian_email' => $guardian->email,
            'guardian_phone' => '03000000000',
            'guardian_address' => 'johar town lahore',
        ]);


        $student  = User::create(
            ['name' => 'Ali', 'email' => fake()->safeEmail(), 'type' => 'student', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );
        $guardian  = User::create(
            ['name' => 'Tanveer', 'email' => fake()->safeEmail(), 'type' => 'guardian', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Student::create([
            'admission_no' => '0003',
            'roll_no'=> '0003',
            'class_id' => 1,
            'date_of_birth' => now(),
            'first_name' => 'Ali',
            'last_name' => 'khan',
            'gender' => 'male',
            'category' => 'general',
            'email' => $student->email,
            'religion' => 'islam',
            'admission_date' => now(),
            'guardian_options' => 'father',
            'guardian_relation' => 'father',
            'guardian_name' => $guardian->name,
            'guardian_email' => $guardian->email,
            'guardian_phone' => '03000000000',
            'guardian_address' => 'johar town lahore',
        ]);


        $student  = User::create(
            ['name' => 'Ali', 'email' => fake()->safeEmail(), 'type' => 'student', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );
        $guardian  = User::create(
            ['name' => 'Tanveer', 'email' => fake()->safeEmail(), 'type' => 'guardian', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Student::create([
            'admission_no' => '0004',
            'roll_no'=> '0004',
            'class_id' => 2,
            'date_of_birth' => now(),
            'first_name' => 'Ali',
            'last_name' => 'Tanveer',
            'gender' => 'male',
            'category' => 'general',
            'email' => $student->email,
            'religion' => 'islam',
            'admission_date' => now(),
            'guardian_options' => 'father',
            'guardian_relation' => 'father',
            'guardian_name' => $guardian->name,
            'guardian_email' => $guardian->email,
            'guardian_phone' => '03000000000',
            'guardian_address' => 'johar town lahore',
        ]);

        $student  = User::create(
            ['name' => 'ali', 'email' => fake()->safeEmail(), 'type' => 'student', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );
        $guardian  = User::create(
            ['name' => 'Tanveer', 'email' => fake()->safeEmail(), 'type' => 'guardian', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Student::create([
            'admission_no' => '0005',
            'roll_no'=> '0005',
            'class_id' => 3,
            'date_of_birth' => now(),
            'first_name' => 'Ali',
            'last_name' => 'Tanveer',
            'gender' => 'male',
            'category' => 'general',
            'email' => $student->email,
            'religion' => 'islam',
            'admission_date' => now(),
            'guardian_options' => 'father',
            'guardian_relation' => 'father',
            'guardian_name' => $guardian->name,
            'guardian_email' => $guardian->email,
            'guardian_phone' => '03000000000',
            'guardian_address' => 'johar town lahore',
        ]);



    }
}
