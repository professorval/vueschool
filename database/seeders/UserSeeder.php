<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $availableTimezones = [
            "CET",
            "CST",
            "GMT+1",
        ];

        $numTimesToSeed = 20;

        for ($i = 0; $i < $numTimesToSeed; $i++) {
            DB::table('users')->insert([
                'firstname' => Str::random(10),
                'lastname' => Str::random(10),
                'email' => Str::random(10).'@vueschool.com',
                'password' => Hash::make('password'),
                'timezone' => $availableTimezones[array_rand($availableTimezones)],
            ]);
        }

    }
}
