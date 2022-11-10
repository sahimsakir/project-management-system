<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'username' => 'sahimsakir',
                'first_name' => 'Sahim',
                'last_name' => 'Sakir',
                'email' => 'sahimsakir@gmail.com',
                'password' => Hash::make('12345678'),
            ],
            [
                'username' => 'testuser',
                'first_name' => 'Test',
                'last_name' => 'User',
                'email' => 'test@test.com',
                'password' => Hash::make('12345678'),
            ],
            
        ];
        User::insert($data);
    }
}
