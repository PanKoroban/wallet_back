<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        DB::table('categories')->insert($this->getDate());
    }

    /**
     * @return array
     */
    private function getDate(): array
    {
        return $date[] = [
            [
                'name' => 'Одежда',
                'img_id' => 1,
                'created_at' => now(),
                'user_id' => 1,
            ],
            [
                'name' => 'ЖКХ, связь, интернет',
                'img_id' => 2,
                'created_at' => now(),
                'user_id' => 1,
            ],
            [
                'name' => 'Пополнение',
                'img_id' => 3,
                'created_at' => now(),
                'user_id' => 1,
            ],
            [
                'name' => 'Образование',
                'img_id' => 4,
                'created_at' => now(),
                'user_id' => 1,
            ],
            [
                'name' => 'Медицина',
                'img_id' => 5,
                'created_at' => now(),
                'user_id' => 1,
            ],
        ];
    }
}
