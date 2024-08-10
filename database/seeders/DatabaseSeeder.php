<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Constants;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'user_1@example.com'],
            [
                'name' => 'User_1',
                'password' => Hash::make('password'),
            ]
        );

        User::updateOrCreate(
            ['email' => 'user_2@example.com'],
            [
                'name' => 'User_2',
                'password' => Hash::make('password'),
            ]
        );

        $roles = [
            Constants::ADMIN,
            Constants::USER
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate([
                'name' => $role
            ]);
        }

        $admin = User::where('email', 'admin@example.com')->first();
        $user1 = User::where('email', 'user_1@example.com')->first();
        $user2 = User::where('email', 'user_2@example.com')->first();

        $admin->assignRole(Constants::ADMIN);
        $user1->assignRole(Constants::USER);
        $user2->assignRole(Constants::USER);
    }
}