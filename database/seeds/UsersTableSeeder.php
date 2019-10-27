<?php

use App\User;
use App\Profile;
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
                'status' => 1,
                'created_at'     => '2019-10-03 05:31:53',
                'updated_at'     => '2019-10-03 05:31:53',
            ],
        ];

        User::insert($users);

        $profiles = [
            [
                'user_id' => 1,
                'education' => 'B.Sc. in Computer Science from the University of Tennessee at Knoxville ',
                'designation' => 'Software Engineer',
                'profile_image' => '/bower_components/AdminLTE/dist/img/user2-160x160.jpg',
                'present_address' => 'Flat-104, Plot-35-37, Road-4b, Monsurabad Housing, Adabor.',
                'permanent_address' => 'Flat-104, Plot-35-37, Road-4b, Monsurabad Housing, Adabor.',
                'office_address' => 'SBN, Dhaka',
                'current_location' => 'Dhaka Bangladesh',
                'nid_number' => '19912548878965874',
                'profile_summary' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.',
                'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.',
                'phone_number' => '01912929932',
                'created_at'     => '2019-10-03 05:31:53',
                'updated_at'     => '2019-10-03 05:31:53',

            ],
        ];

        Profile::insert($profiles);
    }
}
