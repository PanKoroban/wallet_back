<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spending extends Model
{
    use HasFactory;

    /**
     * Название Таблицы и Столбцов
     */
    protected $table = 'spending';
    protected $fillable = [
        'category_id',
        'sum',
        'created_at',
        'updated_at'
    ];

}
