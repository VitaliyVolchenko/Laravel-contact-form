<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles_users')->delete();
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'userman',
                    'login' => 'ulogin',
                    'email' => 'user@user.com',
                    'password' => '$2y$10$MxSdmQMGuoq3gIitjgb8YO8JkFrC7RB4E5vpfNIbtyQCpJ9lTEhSy',
                    'remember_token' => '3n06Grk85e4N9zQu4WBLSqwA2nKVS9pSLMLvvzxy4jKp4cLMC0zCNpWYFMgX',
                    'created_at' => '2018-02-11 18:18:24',
                    'updated_at' => '2018-02-11 18:18:24',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'user1',
                    'login' => 'u1login',
                    'email' => 'user1@exuser.com',
                    'password' => '$2y$10$2Btn0fAfonZRobYNZfUEw.FySInL1vmMtKVV4QowYIXuO887jn0Zq',
                    'remember_token' => NULL,
                    'created_at' => '2018-02-11 18:18:42',
                    'updated_at' => '2018-02-11 18:18:42',
                ),
        ));

    }
}
