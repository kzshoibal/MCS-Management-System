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
                'password'       => '$2y$10$6UekwNv5dBRKpuxqA4rw9.anjz.ruAV4/HyuJJS7KCIufbB0ojcl2',
                'remember_token' => null,
                'created_at'     => '2019-10-03 05:31:53',
                'updated_at'     => '2019-10-03 05:31:53',
            ],
        ];

        User::insert($users);
    }
}
