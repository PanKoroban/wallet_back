<?php

use Database\Seeders\SpendingSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Миграция создает таблицу Трат
     * @return void
     */
    public function up()
    {
        Schema::create('spending', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->foreignId('category_id')->constrained('categories');
            $table->double('sum', 8, 2);
            $table->timestamps();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
        });
        (new SpendingSeeder())->run();
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spending');
    }
};
