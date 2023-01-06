<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name' => 'Admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'user_type' => '1',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Kevin Felix',
            'email' => 'kevin.felix@ehb.be',
            'password' => Hash::make('Password!321'),
        ]);
    }
}
