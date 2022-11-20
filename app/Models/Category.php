<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    /**
     * Название Таблицы и Столбцов
     */
    protected $table = 'categories';
    protected static array $selectedFiled = ['id', 'name', 'created_at', 'updated_at'];

    /**
     * Метод для получения всех Категории
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFiled);
    }

    /**
     * Метод для получения конкретной Категории по ID
     * @param int $id
     * @return object|null
     */
    public function getCategoryById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFiled);
    }
}
