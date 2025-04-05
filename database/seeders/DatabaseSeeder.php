<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::factory(10)->create();

        if (!User::where('email', 'admin@mail.com')->exists()) {
            $admin = User::create([
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('admin1234'),
            ]);
            $admin->assignRole('admin');
        }

        if (!User::where('email', 'employee@mail.com')->exists()) {
            $employee = User::create([
                'name' => 'employee',
                'email' => 'employee@mail.com',
                'password' => Hash::make('employee1234'),
            ]);
            $employee->assignRole('employee');
        }

        if (!User::where('email', 'technicien@mail.com')->exists()) {
            $technicien = User::create([
                'name' => 'technicien',
                'email' => 'technicien@mail.com',
                'password' => Hash::make('technicien1234'),
            ]);
            $technicien->assignRole('technicien');
        }
    }
}
