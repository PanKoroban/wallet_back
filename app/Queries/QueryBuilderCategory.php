<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderCategory implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection|array
    {
        return $this->model
/*            ->with('spending')   Будем использовать при фильтрации по Категориям   */
            ->get();
    }

    public function create(array $date): Category
    {
        return Category::create($date);
    }

    public function update(Category $category, array $date): Category
    {
        $category->fill($date)->save();
        return $category->fill($date);
    }

}
