<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * Название Таблицы и Столбцов
     */
    protected $table = 'categories';
    protected $fillable =[
        'name',
        'img_id',
        'user_id',
    ];

    /**
     * @return HasMany
     */
    public function spending(): HasMany
    {
        return $this->hasMany(Spending::class, 'category_id', 'id');
    }

    public function img(): BelongsTo
    {
        return $this->belongsTo(CategoryImg::class, 'img_id', 'id');
    }
}
