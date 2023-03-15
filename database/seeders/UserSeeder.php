<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' =>'User',
        //     'email' =>'user@gmail.com',
        //     'role' =>'2',
        //     'password' =>bcrypt('123456789'),
        //     'remember_token' =>Str::random('60'),
        // ]);

        \App\Models\User::factory()->create([
            'name' =>'Caleg',
            'email' =>'caleg@gmail.com',
            'role' =>'1',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
        
        \App\Models\User::factory()->create([
            'name' =>'Supervisor',
            'email' =>'supervisor@gmail.com',
            'role' =>'2',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);

        \App\Models\User::factory()->create([
            'name' =>'Relawan',
            'email' =>'relawan@gmail.com',
            'role' =>'3',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
    }
}
