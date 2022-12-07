<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesImgSeeder extends Seeder
{
    /**
     * Сидор: Отправляет Название изображений категории в БД
     * @return void
     */
    public function run()
    {
        DB::table('categories_img')->insert($this->getDate());
    }

    /**
     * Сидор: Faker по созданию Категории: (10-шт)
     * @return array
     */
    private function getDate(): array
    {
        return $date[] = [
            ['img_name' => 'exp-1.png'],
            ['img_name' => 'exp-2.png'],
            ['img_name' => 'exp-3.png'],
            ['img_name' => 'exp-4.png'],
            ['img_name' => 'exp-5.png'],
            ['img_name' => 'animal.svg'],
            ['img_name' => 'bedroom.svg'],
            ['img_name' => 'book.svg'],
            ['img_name' => 'bulb.svg'],
            ['img_name' => 'car.svg'],
            ['img_name' => 'childhood.svg'],
            ['img_name' => 'cocktail.svg'],
            ['img_name' => 'diamonds.svg'],
            ['img_name' => 'electric.svg'],
            ['img_name' => 'flower.svg'],
            ['img_name' => 'paint-roller.svg'],
            ['img_name' => 'present.svg'],
            ['img_name' => 'repair.svg'],
            ['img_name' => 'restaurant.svg'],
            ['img_name' => 'scissors.svg'],
            ['img_name' => 'shoes.svg'],
            ['img_name' => 'shopping-cart-supermarket.svg'],
            ['img_name' => 'television.svg'],
            ['img_name' => 'tennis-racket-ball.svg'],
            ['img_name' => 'transport.svg'],
            ['img_name' => 'wifi.svg'],
        ];
    }
}
