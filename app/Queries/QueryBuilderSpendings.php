<?php

namespace App\Queries;

use App\Models\Spending;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class QueryBuilderSpendings implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Spending::query(); //Возвращает модель расходов
    }

    public function getSpending(): Collection|array
    {
        return Spending::query()->select('id', 'category_id', 'sum', 'created_at')->get();
    }

    public function getSpendingWithCategoryName(): Collection|array
    {
        return Spending::query()->join('categories', 'categories.id', '=', 'spending.category_id')
            ->select([
                'spending.sum',
                'categories.id as CategoryId',
                'categories.name as CategoryName',
                'categories.img_name as CategoryImgName',
                'spending.created_at'])
            ->get();

    }

}
