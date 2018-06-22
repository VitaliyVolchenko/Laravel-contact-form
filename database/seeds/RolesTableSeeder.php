<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles_users')->delete();
        \DB::table('roles')->delete();

        \DB::table('roles')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'manager',
                ),
            1 =>
                array (
                    'id' => 2,
                    'name' => 'client',
                )

        ));

    }
}
