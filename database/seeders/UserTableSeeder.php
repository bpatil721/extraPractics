<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
            [
            'name'=>"admin",
            'password' => \Hash::make('123'),
            'email'=> 'a@a.com',
            ],

            [
                'name'=>"user",
                'password' => \Hash::make('123'),
                'email'=> 'u@u.com',
            ]
        ];
       foreach ($data as $user) {
            User::create($user);
        }
    }
}
