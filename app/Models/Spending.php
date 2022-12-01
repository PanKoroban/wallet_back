<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Spending extends Model
{
    use HasFactory;

    /**
     * Название Таблицы и Столбцов
     */
    protected $table = 'spending';
    protected $fillable = [
        'name',
        'category_id',
        'sum',
        'created_at',
        'updated_at'
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
