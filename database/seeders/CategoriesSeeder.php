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


        return $date[] = [
            [
                'name' => 'Одежда',
                'img_name' => 'exp-1.png',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'ЖКХ, связь, интернет',
                'img_name' => 'exp-2.png',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Пополнение',
                'img_name' => 'exp-3.png',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Образование',
                'img_name' => 'exp-4.png',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Медицина',
                'img_name' => 'exp-5.png',
                'created_at' => now('Europe/Moscow'),
            ],
        ];
    }
}
