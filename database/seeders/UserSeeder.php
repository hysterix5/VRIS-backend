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
            'email' => 'user@test.com',
            'password' => Hash::make('password'),
        ]);

        for ($i = 0; $i < 99; $i++) {
            User::create([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'email' => $faker->email(),
                'password' => Hash::make('password')
            ]);
        }
    }
}
