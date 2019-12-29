<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$RWNMZ6vL7tmUg0pXy3nlqOlIT80fK5hWcFnY0rznKwBrnsDnQqKCK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
