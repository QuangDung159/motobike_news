<?php

use Illuminate\Database\Seeder;

class ActivityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('activity')->delete();
        
        \DB::table('activity')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Add',
                'created_at' => '2019-01-11 20:31:18',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Update',
                'created_at' => '2018-12-27 19:40:35',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'List',
                'created_at' => '2019-01-11 20:31:12',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Delete',
                'created_at' => '2018-12-27 19:40:35',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}