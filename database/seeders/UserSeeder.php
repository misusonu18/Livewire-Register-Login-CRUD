<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$wVfiGGbYngeV4MWDtkH.yuSebp4zLWtjvdgEAcgi7jHXXd37gIlyy', // 123456,
        ]);
    }
}
