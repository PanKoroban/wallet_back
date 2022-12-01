<?php

use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция создает таблицу Категорий
     * @return void
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('img_id')->constrained('categories_img');
            $table->timestamps();
        });
        (new CategoriesSeeder())->run();
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
