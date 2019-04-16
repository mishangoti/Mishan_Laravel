<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DumyDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dumydatas')->insert([
            'ziro' => str_random(10),
            'one' => str_random(10).'@gmail.com',
            'two' => str_random(5),
            'three' => str_random(15),
            'four' => str_random(20),
            'five' => 'http://www.'.str_random(10).'.com',
        ]);
        // this is how we can seed data to our data base
    }
}
