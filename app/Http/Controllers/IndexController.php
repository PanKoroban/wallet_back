<?php

namespace App\Http\Controllers;

use App\Queries\QueryBilderSpendings;
use App\Queries\QueryBuilderCategory;

class IndexController extends Controller
{
    public function index(QueryBuilderCategory $categories, QueryBilderSpendings $spending)
    {
        return view('welcome', [
                'categories' => $categories->getCategories(),
                'spending' => $spending->getSpendings()
            ]
        );
    }
}
