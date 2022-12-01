<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

final class QueryBuilderCategory implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection|array
    {
        return $this->model
            ->with('img')
            ->get();
         /* ->with('spending') Будем использовать при фильтрации по Категориям */
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

    public function destroyCategory($id): JsonResponse
    {
        if ($this->model->find($id) == NULL) {
            return response()->json('Категория не существует!', 400);
        }

        try {
            $this->model->delete();
            return response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('Категория не может быть удалена!', 400);
        }

    }


}
