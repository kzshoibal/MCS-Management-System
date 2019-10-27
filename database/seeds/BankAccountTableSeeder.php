<?php

use Illuminate\Database\Seeder;
use App\BankAccount;


class BankAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankAccount = [
            [
                'id'             => 1,
                'account_title'           => 'IBBL Bank Account',
                'bank_name'           => 'Islami Bank Bangladesh Ltd.',
                'branch_name'           => 'Head Office Complex',
                'account_opening_date'           => '2019-10-23',
                'balance'           => 100,
                'account_number'           => '20203939488221',
                'account_type_id'           => 1,

            ],
        ];

        BankAccount::insert($bankAccount);

        DB::table('bank_account_user')->insert([
            'bank_account_id' => 1,
            'user_id' => 1,
        ]);
    }
}
