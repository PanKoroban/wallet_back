<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Сидор: Отправляет Категории в БД
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getDate());
    }

    /**
     * Сидор: Faker по созданию Категории: (10-шт)
     * @return array
     */
    private function getDate(): array
    {
        $faker = Factory::create('ru_RU');
        $date = [];

        for ($i = 0; $i < 10; $i++) {
            $date[] = [
                'name' => $faker->jobTitle(),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $date;
    }
}
