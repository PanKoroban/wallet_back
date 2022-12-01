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
        return $date[] = [
            [
                'name' => 'Одежда',
                'img_id' => '1',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'ЖКХ, связь, интернет',
                'img_id' => '2',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Пополнение',
                'img_id' => '3',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Образование',
                'img_id' => '4',
                'created_at' => now('Europe/Moscow'),
            ],
            [
                'name' => 'Медицина',
                'img_id' => '5',
                'created_at' => now('Europe/Moscow'),
            ],
        ];
    }
}
