<?php

namespace Database\Seeders;

use App\Models\Caleg;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CalegSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Caleg::factory()->create([
            'name' =>'caleg',
            'email' =>'caleg@gmail.com',
            'password' =>bcrypt('123456789'),
            'remember_token' =>Str::random('60'),
        ]);
    }
}
