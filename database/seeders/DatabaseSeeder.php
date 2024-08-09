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
        $user = User::updateOrCreate(
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
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

        $user->assignRole(Constants::ADMIN);
    }
}