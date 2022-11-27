<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function create(array $date): Spending|bool
    {
        return Spending::create($date);
    }

    public function update(Spending $spending, array $date): Spending|bool
    {
        $spending->fill($date)->save();
        return $spending->fill($date);
    }

    /**
     * Можем подключить если понадобиться в Контроллере вместо -> getSpending
     */
    public function getSpendingWithCategoryName(): Collection|array
    {
        return Spending::query()->join('categories', 'categories.id', '=', 'spending.category_id')
            ->select([
                'spending.name',
                'spending.sum',
                'categories.id as CategoryId',
                'categories.name as CategoryName',
                'categories.img_name as CategoryImgName',
                'spending.created_at'])
            ->get();
    }

}
