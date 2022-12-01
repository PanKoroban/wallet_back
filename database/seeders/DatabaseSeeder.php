<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Для легкого вызова Сидора  --->  php artisan db:seed
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriesImgSeeder::class,
            CategoriesSeeder::class,
            SpendingSeeder::class
        ]);
        /*
                \App\Models\User::factory(10)->create();

                 \App\Models\User::factory()->create([
                     'name' => 'Test User',
                     'email' => 'test@example.com',
                 ]);
         */
    }
}
