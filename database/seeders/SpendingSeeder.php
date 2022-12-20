<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        DB::table('spending')->insert($this->getDate());
    }

    /**
     * @return array
     */
    private function getDate(): array
    {
        $faker = Factory::create('ru_RU');
        $date = [];

        for ($i = 0; $i < 10; $i++) {
            $date[] = [
                'name' => $faker->jobTitle(),
                'category_id' => rand(1, 5),
                'sum'=> $faker->biasedNumberBetween(100, 5000),
                'created_at' => now(),
                'user_id' => 1,

            ];
        }
        return $date;
    }
}
