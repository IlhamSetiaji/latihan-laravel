<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'John Doe',
                'email' => 'john@test.test',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@test.test',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Jack Doe',
                'email' => 'jack@test.test',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ],
        ])->each(function ($user) {
            User::create($user);
        });
    }
}
