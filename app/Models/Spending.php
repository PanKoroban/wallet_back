<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Spending extends Model
{
    use HasFactory;

    /**
     * Название Таблицы и Столбцов
     */
    protected $table = 'spending';
    protected static array $selectedFiled = ['id', 'category_id', 'sum', 'created_at'];

    /**
     * Метод для получения всех Трат
     * @return Collection
     */
    public function getSpending(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFiled);
    }

    /**
     * Метод для получения конкретной Траты по ID
     * @param int $id
     * @return object|null
     */
    public function getSpendById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFiled);
    }
}
