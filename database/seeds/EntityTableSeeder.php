<?php

use Illuminate\Database\Seeder;

class EntityTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('entity')->delete();
        
        \DB::table('entity')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'User',
                'alias' => 'user',
                'created_at' => '2018-12-28 14:07:41',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Comment',
                'alias' => 'comment',
                'created_at' => '2018-12-28 14:07:49',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Manufacturer',
                'alias' => 'manufacturer',
                'created_at' => '2018-12-28 14:08:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Motorbike',
                'alias' => 'motorbike',
                'created_at' => '2018-12-28 14:08:12',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Role',
                'alias' => 'role',
                'created_at' => '2018-12-28 14:08:22',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Slide',
                'alias' => 'slide',
                'created_at' => '2018-12-28 14:08:28',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Motorbike Type',
                'alias' => 'motorbike_type',
                'created_at' => '2018-12-28 14:08:40',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}