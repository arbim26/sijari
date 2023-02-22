<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\User::factory()->create([
            'name' =>'Admin',
            'email' =>'admin@gmail.com',
            'role' =>'1',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);

        \App\Models\User::factory()->create([
            'name' =>'User',
            'email' =>'user@gmail.com',
            'role' =>'2',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
    }
}
