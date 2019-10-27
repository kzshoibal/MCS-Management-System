<?php

use Illuminate\Database\Seeder;
use App\ProjectStatus;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'id'             => 1,
                'title'           => 'Initialized',
            ],
            [
                'id'             => 2,
                'title'           => 'Running',
            ],
            [
                'id'             => 3,
                'title'           => 'End',
            ],
        ];

        ProjectStatus::insert($status);
    }
}
