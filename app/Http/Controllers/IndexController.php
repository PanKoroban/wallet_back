<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderSpendings;
use App\Queries\QueryBuilderCategory;

class IndexController extends Controller
{
    public function index(QueryBuilderCategory $categories, QueryBuilderSpendings $spending)
    {
        return view('welcome', [
                'categories' => $categories->getCategories(),
                'spending' => $spending->getSpending()
            ]
        );
    }

}
