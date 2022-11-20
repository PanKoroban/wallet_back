<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Spending;
use App\Queries\QueryBilderSpendings;
use App\Queries\QueryBuilderCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(QueryBuilderCategory $categories, QueryBilderSpendings $spanding)
    {
        return view('welcome', [
                'categories' => $categories->getCategories(),
                'spending' => $spanding->getSpendings()
            ]
        );
    }

}
