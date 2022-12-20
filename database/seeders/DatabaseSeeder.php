<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->call([
            CategoriesImgSeeder::class,
            CategoriesSeeder::class,
            SpendingSeeder::class
        ]);
    }
}
