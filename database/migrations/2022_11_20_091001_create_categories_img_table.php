<?php

use Database\Seeders\CategoriesImgSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция создает таблицу Изображений Категорий
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories_img', function (Blueprint $table) {
            $table->id();
            $table->string('img_name')->nullable();
        });
        (new CategoriesImgSeeder())->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down():void
    {
        Schema::dropIfExists('categories_img');
    }
};
