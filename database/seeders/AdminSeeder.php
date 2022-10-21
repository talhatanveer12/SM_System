<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Institute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::create(
            ['name' => 'Talha Tanveer', 'email' => 'talhatanveer930@gmail.com', 'type' => 'admin', 'password' => Hash::make('12345678'), 'email_verified_at' => Carbon::now()]
        );

        Institute::create(['name' => $user->name,'email' => $user->email]);




    }
}
