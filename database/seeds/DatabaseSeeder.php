<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(MotorbikeTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(EntityTableSeeder::class);
        $this->call(ManufacturerTableSeeder::class);
        $this->call(MotorbikeTypeTableSeeder::class);
        $this->call(PolicyTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SlideTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
