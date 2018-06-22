<?php

use Illuminate\Database\Seeder;

class RolesUsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles_users')->delete();

        \DB::table('roles_users')->insert(array (
            0 =>
                array (
                    'user_id' => 1,
                    'role_id' => 1,
                ),
            1 =>
                array (
                    'user_id' => 2,
                    'role_id' => 2,
                ),
        ));

    }
}
