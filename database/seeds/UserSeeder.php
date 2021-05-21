<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'test1', 'email' =>'test1@gmail.com', 'password' =>"1", 'icon' =>"path1", 'remember_token' =>"token1"]);
        DB::table('users')->insert(['name' => 'test2', 'email' =>'test2@gmail.com', 'password' =>"2", 'icon' =>"path2", 'remember_token' =>"token2"]);
        DB::table('users')->insert(['name' => 'test3', 'email' =>'test3@gmail.com', 'password' =>"3", 'icon' =>"path3", 'remember_token' =>"token3"]);
    }
}
