<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Str;

class UpdateUserRandomly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-user-randomly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all users first name, last name and timezone to new random ones.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = User::all();

        $availableTimezones = [
            "CET",
            "CST",
            "GMT+1",
        ];

        foreach ($users as $user) {
            $user->firstname = Str::random(10);
            $user->lastname = Str::random(10);
            $user->timezone = $availableTimezones[array_rand($availableTimezones)];
            $user->save();
        }
    }
}
