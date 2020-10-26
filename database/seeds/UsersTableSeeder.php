<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'number1',
            'email' => 'number1@gmail.com',
            'company' => 'company1',
            'password' => bcrypt('password'),
            'admin' => 1,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number2',
            'email' => 'number2@gmail.com',
            'company' => 'company1',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' =>'user.jpg'
        ]);

        App\User::create([
            'name' => 'number3',
            'email' => 'number3@gmail.com',
            'company' => 'company1',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number4',
            'email' => 'number4@gmail.com',
            'company' => 'company1',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number5',
            'email' => 'number5@gmail.com',
            'company' => 'company1',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' =>'user.jpg'
        ]);

        App\User::create([
            'name' => 'number6',
            'email' => 'number6@gmail.com',
            'company' => 'company2',
            'password' => bcrypt('password'),
            'admin' => 1,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number7',
            'email' => 'number7@gmail.com',
            'company' => 'company2',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number8',
            'email' => 'number8@gmail.com',
            'company' => 'company2',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number9',
            'email' => 'number9@gmail.com',
            'company' => 'company2',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number10',
            'email' => 'number10@gmail.com',
            'company' => 'company2',
            'password' => bcrypt('password'),
            'admin' => '0',
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number11',
            'email' => 'number11@gmail.com',
            'company' => 'company3',
            'password' => bcrypt('password'),
            'admin' => 1,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number12',
            'email' => 'number12@gmail.com',
            'company' => 'company3',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);

        App\User::create([
            'name' => 'number13',
            'email' => 'number13@gmail.com',
            'company' => 'company3',
            'password' => bcrypt('password'),
            'admin' => 0,
            'avatar' => 'user.jpg'
        ]);
    }
}
