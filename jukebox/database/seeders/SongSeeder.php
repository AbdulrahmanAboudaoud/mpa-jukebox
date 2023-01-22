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
        \DB::table('songs')->insert(['category_id' => 1,'name' => 'in da club','artist' => '50 cent','duration' => '00:03:40']);
        \DB::table('songs')->insert(['category_id' => 1,'name' => 'Dear mama','artist' => 'tupac','duration' => '00:03:35']);

        \DB::table('songs')->insert(['category_id' => 2,'name' => 'at last','artist' => 'Etta James','duration' => '00:04:40']);
        \DB::table('songs')->insert(['category_id' => 2,'name' => 'lets stay together','artist' => 'Al green','duration' => '00:03:20']);
        \DB::table('songs')->insert(['category_id' => 2,'name' => 'waterfalls','artist' => 'TLC','duration' => '00:04:20']);
        
        \DB::table('songs')->insert(['category_id' => 3,'name' => 'in D minor','artist' => 'J.S. Bach','duration' => '00:05:30']);
        \DB::table('songs')->insert(['category_id' => 3,'name' => 'Für Elise','artist' => 'beethoven','duration' => '00:07:30']);
        \DB::table('songs')->insert(['category_id' => 3,'name' => 'Ave Maria','artist' => 'Charles Gounod','duration' => '00:04:30']);
 
        \DB::table('songs')->insert(['category_id' => 4,'name' => 'helef alamar','artist' => 'gorge wassouf','duration' => '00:05:10']);
        \DB::table('songs')->insert(['category_id' => 4,'name' => 'tamale mak','artist' => 'amr diap','duration' => '00:03:10']);
        \DB::table('songs')->insert(['category_id' => 4,'name' => 'ma baaref','artist' => 'yara','duration' => '00:04:10']);



        \DB::table('songs')->insert(['category_id' => 5,'name' => 'evil','artist' => 'Mercyful Fate','duration' => '00:03:40']);
        \DB::table('songs')->insert(['category_id' => 5,'name' => 'the Trooper','artist' => 'Iron Maiden','duration' => '00:03:30']);
        \DB::table('songs')->insert(['category_id' => 5,'name' => 'The Moor','artist' => 'Opeth','duration' => '00:03:20']);
        
    }
}

