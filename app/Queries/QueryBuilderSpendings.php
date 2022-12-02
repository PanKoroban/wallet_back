<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

final class QueryBuilderSpendings implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Spending::query();
    }

    public function getSpending(): Collection
    {
        return $this->model
            ->with('category')
            ->with('img')
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $date): Spending
    {
        return Spending::create($date);
    }

    public function update(Spending $spending, array $date): Spending
    {
        $spending->fill($date)->save();
        return $spending->fill($date);
    }

    /**
     * Можем подключить если понадобиться в Контроллере вместо -> getSpending
     */
    public function getSpendingsWithCategoryNameAndNameImg(): Collection|array
    {
        return Spending::query()
            ->join('categories', 'categories.id', '=', 'spending.category_id')
            ->join('categories_img', 'categories_img.id', '=', 'categories.img_id')
            ->select([
                'spending.id',
                'spending.name',
                'spending.category_id',
                'categories.name as categoryName',
                'categories_img.img_name as categoryImgName',
                'spending.sum',
                'spending.created_at',
                'spending.updated_at',
                ])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function destroySpending($id): JsonResponse
    {
        if($this->model->find($id) == NULL ){
            return response()->json('Spending does not exist', 400);
        }
        try {
        $this->model->delete();
        return response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('Error while deleting', 400);
        }
    }

}
