<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert(['name' => 'RAP']);
        \DB::table('categories')->insert(['name' => 'R&B']);
        \DB::table('categories')->insert(['name' => 'CLASSIC']);
        \DB::table('categories')->insert(['name' => 'ARABIC']);
        \DB::table('categories')->insert(['name' => 'METAL']);
    }
}
