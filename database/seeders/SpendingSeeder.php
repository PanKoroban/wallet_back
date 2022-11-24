<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingSeeder extends Seeder
{
    /**
     * Сидор: Отправляет Траты в БД
     * @return void
     */
    public function run()
    {
        DB::table('spending')->insert($this->getDate());
    }

    /**
     * Сидор: Faker по созданию Трат: (20-трат)
     * @return array
     */
    private function getDate(): array
    {
        $faker = Factory::create('ru_RU');
        $date = [];

        for ($i = 0; $i < 20; $i++) {
            $date[] = [
                'category_id' => rand(1, 5),
                'sum'=> $faker->biasedNumberBetween(100, 5000),
                'created_at' => now('Europe/Moscow')
            ];
        }
        return $date;
    }
}
