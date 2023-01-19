<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('songs')->insert(['category_id' => 1,'name' => '8 miles','artist' => 'Eminem','duration' => '00:03:10']);
        \DB::table('songs')->insert(['category_id' => 2,'name' => 'any time any place','artist' => 'patrick','duration' => '00:04:20']);
        \DB::table('songs')->insert(['category_id' => 3,'name' => 'stayin alive','artist' => 'joey','duration' => '00:05:30']);
        \DB::table('songs')->insert(['category_id' => 4,'name' => 'helef alamar','artist' => 'gianni','duration' => '00:02:10']);
        \DB::table('songs')->insert(['category_id' => 5,'name' => 'metalica','artist' => 'abdul','duration' => '00:03:40']);
    }
}

