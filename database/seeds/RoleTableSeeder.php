<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role')->delete();
        
        \DB::table('role')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'SysAdmin',
                'created_at' => '2018-12-27 19:38:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Colaborator',
                'created_at' => '2018-12-27 19:38:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Admin',
                'created_at' => '2018-12-27 19:38:54',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'User',
                'created_at' => '2019-01-09 20:34:30',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}