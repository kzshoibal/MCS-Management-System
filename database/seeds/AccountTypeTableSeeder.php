<?php

use Illuminate\Database\Seeder;
use App\AccountType;

class AccountTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accounType = [
            [
                'id'             => 1,
                'title'           => 'Saving',
            ],
        ];

        AccountType::insert($accounType);
    }
}
