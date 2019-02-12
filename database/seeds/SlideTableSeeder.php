<?php

use Illuminate\Database\Seeder;

class SlideTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('slide')->delete();
        
        \DB::table('slide')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'r1 1',
                'path' => 'WeVfCWvY81img.jpg',
                'link' => 'google.com',
                'created_at' => '2019-01-06 14:34:37',
                'updated_at' => '2019-01-06 07:34:37',
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'r1 2',
            'path' => 'yD0q83jmbaimg (1).jpg',
                'link' => 'google.com',
                'created_at' => '2019-01-06 14:40:43',
                'updated_at' => '2019-01-06 07:40:43',
            ),
            2 => 
            array (
                'id' => 'gxeHD',
                'name' => 'Ducati 1',
                'path' => '9DSz01CyqdPanigale-959Corse-MY18-Red-40-Slider-Gallery-906x510.jpg',
                'link' => 'https://www.ducati.com/us/en/bikes/panigale/959-panigale',
                'created_at' => '2019-01-06 06:59:23',
                'updated_at' => '2019-01-06 06:59:23',
            ),
            3 => 
            array (
                'id' => 'hDQal',
                'name' => 'gsx r1000 1',
                'path' => 'Qb7BvaFHA5gimg17.jpg',
                'link' => 'https://www.ducati.com/us/en/bikes/panigale/959-panigale',
                'created_at' => '2019-01-06 06:59:07',
                'updated_at' => '2019-01-06 06:59:07',
            ),
            4 => 
            array (
                'id' => 'RHLpF',
                'name' => 'Ducati 2',
                'path' => 'W1Aw5X2aUA123123.jpg',
                'link' => 'https://www.ducati.com/us/en/bikes/panigale/959-panigale',
                'created_at' => '2019-01-06 07:00:46',
                'updated_at' => '2019-01-06 07:00:46',
            ),
        ));
        
        
    }
}