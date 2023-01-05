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
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'jane@test.test',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Jack Doe',
                'email' => 'jack@test.test',
                'password' => Hash::make('password'),
            ],
        ])->each(function ($user) {
            User::create($user);
        });
    }
}
