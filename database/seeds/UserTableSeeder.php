<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user')->delete();
        
        \DB::table('user')->insert(array (
            0 => 
            array (
                'id' => '1',
                'id_role' => '1',
                'name' => 'sysadmin',
                'email' => 'sysadmin@gmail.com',
                'password' => '123',
                'dob' => '2018-07-10 00:00:00',
                'remember_token' => '0',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            1 => 
            array (
                'id' => '2',
                'id_role' => '2',
                'name' => 'collaborator',
                'email' => 'collaborator@gmail.com',
                'password' => '123',
                'dob' => '2018-07-17 00:00:00',
                'remember_token' => '0',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            2 => 
            array (
                'id' => '3',
                'id_role' => '1',
                'name' => 'dulu',
                'email' => 'dulu@etcc.com',
                'password' => '123',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => '0',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
            ),
            3 => 
            array (
                'id' => '3qXlC',
                'id_role' => '4',
                'name' => 'dulu21',
                'email' => 'dulu21@etcc.com',
                'password' => '$2y$10$LyE.aQ3bCL41.3dzjTv79efbgXzHidH3rgwcbCuGcrXu042M4lN5q',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => 'SUOvJKfMkDK7bVBDpftYW7ArdX8DkGfit8RfnluP8qVgqqH2NBciO0PlpDqz',
                'created_at' => '2019-01-15 12:45:38',
                'updated_at' => '2019-01-15 12:45:38',
            ),
            4 => 
            array (
                'id' => '5LWmg',
                'id_role' => '4',
                'name' => 'dulu5',
                'email' => 'dulu5@etcc.com',
                'password' => '$2y$10$Fs8hvDQhJsQWur4c8DwZRuDIS8hgkxDr47HOVhjmtrLhpQ8QtORWa',
                'dob' => '1999-12-12 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:19:58',
                'updated_at' => '2019-01-14 14:19:58',
            ),
            5 => 
            array (
                'id' => '7jkEc',
                'id_role' => '4',
                'name' => 'dulu8',
                'email' => 'dulu8@etcc.com',
                'password' => '$2y$10$48WoP0OF820eReRSm6BnBejxdSlxUN6L3aHgXusq0TidRgBxbvHrG',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:27:20',
                'updated_at' => '2019-01-14 14:27:20',
            ),
            6 => 
            array (
                'id' => 'BadSg',
                'id_role' => '4',
                'name' => 'dulu9',
                'email' => 'dulu9@etc.com',
                'password' => '$2y$10$sqzh.r4aIAeJQFD4QUr33OsDj3BQp19fDpgu1VEtZlCQdbgCgPbLK',
                'dob' => '2015-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:28:27',
                'updated_at' => '2019-01-14 14:28:27',
            ),
            7 => 
            array (
                'id' => 'CAs1K',
                'id_role' => '4',
                'name' => 'dulu11',
                'email' => 'dulu11@etcc.com',
                'password' => '$2y$10$FfW3OMNyKb28sdQQte0f/OvUiu.cMfHZQQFXvCdEcfFQfuxKofp7a',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:33:48',
                'updated_at' => '2019-01-14 14:33:48',
            ),
            8 => 
            array (
                'id' => 'd1wVF',
                'id_role' => '4',
                'name' => 'dulu13',
                'email' => 'dulu13@etcc.com',
                'password' => '$2y$10$GGxfMbZw8T/mCW2KzZR6juzU/7e3kGjesXrqvhKqgepDlIhZXckyK',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:37:41',
                'updated_at' => '2019-01-14 14:37:41',
            ),
            9 => 
            array (
                'id' => 'GRYZl',
                'id_role' => '4',
                'name' => 'dulu67',
                'email' => 'dulu7@etcc.com',
                'password' => '$2y$10$UZoGRCwqZHGZ6MGzLio5TeirYbM2JSdL15cvJp7lJ9MRlFZhDuI3.',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:24:57',
                'updated_at' => '2019-01-14 14:24:57',
            ),
            10 => 
            array (
                'id' => 'hFujx',
                'id_role' => '4',
                'name' => 'dulu10',
                'email' => 'dulu10@etcc.com',
                'password' => '$2y$10$88q0JabDP03mujIbx7nq5uz26hs5RLZqEdzkKNo.c6z1WGMybdcgS',
                'dob' => '2018-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:31:30',
                'updated_at' => '2019-01-14 14:31:30',
            ),
            11 => 
            array (
                'id' => 'HRd3c',
                'id_role' => '4',
                'name' => 'dulu25',
                'email' => 'dulu25@etcc.com',
                'password' => '$2y$10$g6erYyJz8mrw72fr2h.t3OS9e0H9/VEku5A7K.Ygl2m7R4XK3BzMu',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-15 14:23:08',
                'updated_at' => '2019-01-15 14:23:08',
            ),
            12 => 
            array (
                'id' => 'Jll6c',
                'id_role' => '2',
                'name' => 'collaborator1',
                'email' => 'colla1@gmail.com',
                'password' => '$2y$10$R2tVX1sglej9tWhqeIj7Terf6WMVz564xuxCxVcgP/TB1/nhJFptm',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => 'JOhxDgg3m34FfEpdkZUlKBOafL5Ik16E3wlcTaAsWoZO6jnPDzS6p1Si2SM4',
                'created_at' => '2019-01-09 13:38:55',
                'updated_at' => '2019-01-09 13:38:55',
            ),
            13 => 
            array (
                'id' => 'NevOt',
                'id_role' => '4',
                'name' => 'dulu23',
                'email' => 'dulu23@etcc.com',
                'password' => '$2y$10$wwRhsDSgdAIzvKr7lQ4QJO.s6aG6eonx36fm9jZR1F8pFzNGmO0Ny',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => 'B9xEHBama3WseHWZ797xomt3t49pvj1CpTW3y0go0E3k7FeUZcy3njfja2cs',
                'created_at' => '2019-01-15 12:49:54',
                'updated_at' => '2019-01-15 12:49:54',
            ),
            14 => 
            array (
                'id' => 'nhiKa',
                'id_role' => '1',
                'name' => 'dulu1',
                'email' => 'dulu1',
                'password' => '$2y$10$JqhDeVy5fVdTkjzuJ1d9WOrchBX6ZfsNoudHIPZHWOVrAS3OHzN2K',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => '0',
                'created_at' => '2019-01-08 13:17:00',
                'updated_at' => '2019-01-08 13:17:00',
            ),
            15 => 
            array (
                'id' => 'NKkXF',
                'id_role' => '4',
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => '$2y$10$6iqLo.qeBdEsaksQn9dVHOcWd.G8Kk8FhhOqogShJJXixWd71POa2',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-09 13:39:17',
                'updated_at' => '2019-01-09 13:39:17',
            ),
            16 => 
            array (
                'id' => 'QmYmk',
                'id_role' => '4',
                'name' => 'dulu16',
                'email' => 'dulu16@etcc.com',
                'password' => '$2y$10$o.iRRuvSOEH5wGO6MSM2/uZPB5cXFUvUQ74ec.83LVAjFdk1HR0ta',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => '6FSoZKZ7syionjeuXpi3gLA8U2UDMI3QehWMkMy2tLfpvHfh0wd7eugpQK2e',
                'created_at' => '2019-01-15 12:28:52',
                'updated_at' => '2019-01-15 12:28:52',
            ),
            17 => 
            array (
                'id' => 'QQjwx',
                'id_role' => '4',
                'name' => 'dulu12',
                'email' => 'dulu12@etcc.com',
                'password' => '$2y$10$ibqe4/yoFR2gBDpQrIEwmOB.CehJdT/xQnxw0gu8ASWd4Bpz0Z2YC',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:36:26',
                'updated_at' => '2019-01-14 14:36:26',
            ),
            18 => 
            array (
                'id' => 'qR8Xv',
                'id_role' => '4',
                'name' => 'dulu6',
                'email' => 'dulu6@etcc.com',
                'password' => '$2y$10$lg2FLU8bxilQYGqDNMi/9.WkgH/Coy6ycw/Wsl2V/VmCLg2LEpXTa',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:23:46',
                'updated_at' => '2019-01-14 14:23:46',
            ),
            19 => 
            array (
                'id' => 'QykuW',
                'id_role' => '1',
                'name' => 'sysadmin',
                'email' => 'sysadmin@etcc.com',
                'password' => '$2y$10$WBowwLx/xfnVWdF3bPSLEe0SHOSsCROAcsTcdTspOogc5s2FSBc3y',
                'dob' => '2019-01-08 00:00:00',
                'remember_token' => 'qkvhaxx7EH6NidD0ZwAEuElTpCnIgCM1pWnF1p1sBvdwwKhc9d5JECCsl0Mo',
                'created_at' => '2019-01-12 09:22:06',
                'updated_at' => '2019-01-12 09:34:08',
            ),
            20 => 
            array (
                'id' => 'tUvrU',
                'id_role' => '4',
                'name' => 'dulu15',
                'email' => 'dulu15@etcc.com',
                'password' => '$2y$10$1q.FMhU5V0Om5hmcgIlOW.q5eaqpuEjO7W8PgZiIh5ojjGD2HlMym',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-15 12:27:46',
                'updated_at' => '2019-01-15 12:27:46',
            ),
            21 => 
            array (
                'id' => 'UKBRN',
                'id_role' => '3',
                'name' => 'admin1',
                'email' => 'admin1@gmail.com',
                'password' => '$2y$10$FF0XmTFUQJD1YstdppT26.7ruMXsbB.0eJ8upEJK65PFVZNpytyEq',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => 'efWXSz9Hk4Q5U7hYCHRgPqT4DDRzfB5qjjt1bB5V0CH6FxEegdm3HySUbkik',
                'created_at' => '2019-01-09 13:37:28',
                'updated_at' => '2019-01-09 13:37:28',
            ),
            22 => 
            array (
                'id' => 'VV8PU',
                'id_role' => '4',
                'name' => 'dulu20',
                'email' => 'dulu20@etcc.com',
                'password' => '$2y$10$AHGBzhl4SAeSOunXUjacleQtE4soivab5S0MK1jROyBxrKGfy7MH2',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => 'j7qcmpWC1rIszP3tLxQltpPaZI4VO7Kwvf1DqGliXhWm5MgfJ9DnhoOcNYRS',
                'created_at' => '2019-01-15 12:44:38',
                'updated_at' => '2019-01-15 12:44:38',
            ),
            23 => 
            array (
                'id' => 'W1hs2',
                'id_role' => '4',
                'name' => 'dulu3',
                'email' => 'dulu3@etcc.com',
                'password' => '$2y$10$/5SitHlxTZ4H1xPIg6iYFOlPe3AjX6CT.TFUxXCR4nvpbbQcj01M.',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:15:40',
                'updated_at' => '2019-01-14 14:15:40',
            ),
            24 => 
            array (
                'id' => 'wbAGV',
                'id_role' => '4',
                'name' => 'dulu14',
                'email' => 'dulu14@etcc.com',
                'password' => '$2y$10$kYiZuDAoTHTI0r6nvB7Dlutfnp36xFe.qabAweS6ge5iu/qk6cuiu',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-15 12:27:06',
                'updated_at' => '2019-01-15 12:27:06',
            ),
            25 => 
            array (
                'id' => 'yYYfl',
                'id_role' => '4',
                'name' => 'dulu22',
                'email' => 'dulu22@etcc.com',
                'password' => '$2y$10$TGyMrexhGt8JjTV5MtTGIOnTRwFgpi.qg5H9bEOf4C/KfeLq6e2bq',
                'dob' => '2019-12-31 00:00:00',
                'remember_token' => '6RldQtSuV4DmGNuJ2mnth4yUiA1rUKNzUklrLq0NIEPF4dx1Z2t73MH4Z7QP',
                'created_at' => '2019-01-15 12:47:28',
                'updated_at' => '2019-01-15 12:47:28',
            ),
            26 => 
            array (
                'id' => 'Z0o75',
                'id_role' => '1',
                'name' => 'dulu2',
                'email' => 'dulu2@etcc.com',
                'password' => '123',
                'dob' => '2019-01-01 00:00:00',
                'remember_token' => 'tJrZ1wrLGAah0VLJvrrGWfUmBHrMBYVPq7N7YPNVZp9A5UtktJo5SzKLzpdk',
                'created_at' => '2019-01-08 13:17:34',
                'updated_at' => '2019-01-12 09:13:49',
            ),
            27 => 
            array (
                'id' => 'zk9me',
                'id_role' => '4',
                'name' => 'dulu4',
                'email' => 'dulu4@etcc.com',
                'password' => '$2y$10$PMGV8SYlgbL1GUQBqhjaDeKr.BiO2Rm2aZZLCR9Pu7ZP29U2ZAyNW',
                'dob' => '2019-01-16 00:00:00',
                'remember_token' => NULL,
                'created_at' => '2019-01-14 14:17:43',
                'updated_at' => '2019-01-14 14:17:43',
            ),
        ));
        
        
    }
}