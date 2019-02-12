<?php

use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('manufacturer')->delete();
        
        \DB::table('manufacturer')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Yamaha',
                'created_at' => '2018-12-27 19:33:03',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Honda',
                'created_at' => '2018-12-27 19:33:03',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Kawasaki',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Suzuki',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'KTM',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Ducati',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'BWM',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Aprilia',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'MV Agusta',
                'created_at' => '2018-12-27 19:36:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
        ));
        
        
    }
}