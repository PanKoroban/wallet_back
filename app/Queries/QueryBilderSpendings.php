<?php

namespace App\Queries;

use App\Models\Spending;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBilderSpendings implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return Spending::query(); //Возвращает модель расходов
    }

    public function getSpendings(){
        return Spending::select('id', 'category_id', 'sum', 'created_at')->get();
    }

    public function getSpendingsWithCategoryName(){
//        return Spending::select('id', 'category_id', 'sum', 'created_at')->get();
          return Spending::join('categories', 'categories.id', '=' , 'spending.category_id')
              ->select(['spending.sum', 'categories.name', 'spending.created_at', 'categories.img_name'])
              ->get();

    }

}
