<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DumyDataTableSeeder::class);
        $this->call(MultyDumyDataTableSeeder::class);

        // factory(App\DumyData::class, 50)->create();
    
    }
}
