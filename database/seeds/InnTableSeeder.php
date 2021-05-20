<?php

use Illuminate\Database\Seeder;

class InnTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inns')->insert(['name' => 'testinn1', 'address' =>'test', 'rooms' =>1, 'checkin' =>1, 'checkout' =>2]);
        DB::table('inns')->insert(['name' => 'testinn2', 'address' =>'test', 'rooms' =>1, 'checkin' =>1, 'checkout' =>2]);
        DB::table('inns')->insert(['name' => 'testinn3', 'address' =>'test', 'rooms' =>1, 'checkin' =>1, 'checkout' =>2]);
    }
}
