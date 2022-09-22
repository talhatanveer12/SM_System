<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Student;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'type' => 'teacher',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

        // $guardian = User::factory()->create([
        //     'name' => fake()->name(),
        //     'email' => fake()->safeEmail(),
        //     'type' => 'student',
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ]);

        // Student::factory()->create([
        //     'admission_no' => Str::random(10),
        //     'roll_no'=> Str::random(10),
        //     'class_id' => 3,
        //     'date_of_birth' => now(),
        //     'first_name' => fake()->name(),
        //     'last_name' => fake()->name(),
        //     'gender' => 'male',
        //     'category' => 'general',
        //     'email' => $user->email,
        //     'religion' => 'islam',
        //     'admission_date' => now(),
        //     'guardian_options' => 'father',
        //     'guardian_relation' => 'father',
        //     'guardian_name' => fake()->name(),
        //     'guardian_email' => $guardian->email,
        //     'guardian_phone' => Str::random(10),
        //     'guardian_address' => 'johar town lahore',
        // ]);

        Employee::factory()->create([
            'reg_no' => '0006',
            'employee_no'=> '0006',
            'course_id' => 1,
            'date_of_birth' => now(),
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'gender' => 'male',
            'category' => 'general',
            'email' => $user->email,
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
