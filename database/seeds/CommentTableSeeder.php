<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comment')->delete();
        
        \DB::table('comment')->insert(array (
            0 => 
            array (
                'id' => '',
                'id_user' => '1',
                'id_motorbike' => 'CSzMo',
                'content' => 'Đù, bén',
                'created_at' => '2019-01-13 13:02:51',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '1',
                'id_user' => '1',
                'id_motorbike' => '1',
                'content' => 'Best cmnr',
                'created_at' => '2018-12-27 20:24:31',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '2',
                'id_user' => '2',
                'id_motorbike' => '2',
                'content' => 'Hơi best',
                'created_at' => '2018-12-27 20:24:31',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => 'dg8VD',
                'id_user' => 'QykuW',
                'id_motorbike' => 'qEuEg',
                'content' => 'Đù, bán không',
                'created_at' => '2019-01-13 13:22:05',
                'updated_at' => '2019-01-13 13:22:05',
            ),
            4 => 
            array (
                'id' => 'EOjIc',
                'id_user' => 'QykuW',
                'id_motorbike' => 'qEuEg',
                'content' => 'Bán không thằng chó choooooooo',
                'created_at' => '2019-01-13 13:23:38',
                'updated_at' => '2019-01-13 13:23:38',
            ),
            5 => 
            array (
                'id' => 'FTtTA',
                'id_user' => 'QykuW',
                'id_motorbike' => 'WFiK0',
                'content' => 'Đù, khá bảnh',
                'created_at' => '2019-01-13 08:08:11',
                'updated_at' => '2019-01-13 08:08:11',
            ),
            6 => 
            array (
                'id' => 'I0vKr',
                'id_user' => 'QykuW',
                'id_motorbike' => 'qEuEg',
                'content' => 'Bán không thằng chó',
                'created_at' => '2019-01-13 13:22:28',
                'updated_at' => '2019-01-13 13:22:28',
            ),
            7 => 
            array (
                'id' => 'ne6ln',
                'id_user' => 'QykuW',
                'id_motorbike' => 'qEuEg',
                'content' => 'Đù, bén vcl',
                'created_at' => '2019-01-13 08:13:51',
                'updated_at' => '2019-01-13 08:13:51',
            ),
            8 => 
            array (
                'id' => 'sfSZo',
                'id_user' => 'QykuW',
                'id_motorbike' => 'WFiK0',
                'content' => 'Đù, khánh bả',
                'created_at' => '2019-01-13 08:09:05',
                'updated_at' => '2019-01-13 08:09:05',
            ),
            9 => 
            array (
                'id' => 'VvONn',
                'id_user' => 'QykuW',
                'id_motorbike' => 'WFiK0',
                'content' => 'đù, gắt',
                'created_at' => '2019-01-13 11:29:59',
                'updated_at' => '2019-01-13 11:29:59',
            ),
        ));
        
        
    }
}