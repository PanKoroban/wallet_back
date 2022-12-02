<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

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

    public function img(): HasOneThrough
    {
        return $this->hasOneThrough(
            CategoryImg::class,
            Category::class,
            'img_id',
            'id',
            'category_id',
            'img_id',
        );
    }
}
