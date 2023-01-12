<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;

class CategoryImg extends Model
{
    use HasFactory;

    /**
     * Название Таблицы
     */
    protected $table = 'categories_img';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'img_id', 'id');
    }

    public function getCategoryImg(): Collection|array
    {
        return CategoryImg::query()->get();
    }

    public function getCategoryImgById(int $id): Model|Collection|Builder|array|null
    {
        return CategoryImg::query()->findOrFail($id);
    }

}
