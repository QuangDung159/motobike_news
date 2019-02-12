<?php

use Illuminate\Database\Seeder;

class MotorbikeTypeTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('motorbike_type')->delete();
        
        \DB::table('motorbike_type')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Sport Bike',
                'created_at' => '2018-12-27 19:30:07',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Naked Bike',
                'created_at' => '2018-12-27 19:30:07',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Sport Touring',
                'created_at' => '2018-12-27 19:31:23',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Adventure',
                'created_at' => '2018-12-27 19:31:23',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Off Road',
                'created_at' => '2018-12-27 19:32:41',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}