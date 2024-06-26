<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        User::create([
            'firstname' => 'John',
            'lastname' => 'Doe',
            'username' => 'johndoe',
            'email' => 'user@test.com',
            'access_level' => 'Admin',
            'password' => Hash::make('password'),
        ]);
    }
}
