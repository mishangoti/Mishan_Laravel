<?php

use Illuminate\Database\Seeder;

class MultyDumyDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\DumyData::class, 10)->create();        
    }
}
