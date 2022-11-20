<?php

namespace App\Queries;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;

class QueryBuilderCategory implements QueryBuilder
{

    public function getBilder(): Builder
    {
        return Category::query(); // возвращает модель Категорий
    }

    public function getCategories(){
        return Category::select('id', 'name', 'updated_at')->get();
    }


}
