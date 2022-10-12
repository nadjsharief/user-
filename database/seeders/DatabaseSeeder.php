<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
             \App\Models\User::factory()->create([
            'name' => 'super admin',
            'password' => Hash::make('12345678'),
            'roles' => 'super admin',
            'email' => 'test2@gmail.com',
        ]);
    }
}
