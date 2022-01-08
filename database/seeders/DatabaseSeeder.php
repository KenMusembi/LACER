<?php

namespace Database\Seeders;

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
        //uncomment to create 10 users for testing
        // \App\Models\User::factory(10)->create();
         \App\Models\ExcelContent::factory(10)->create();
    }
}
