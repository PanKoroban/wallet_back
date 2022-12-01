<?php

namespace App\Http\Controllers;

use App\Queries\QueryBuilderSpendings;
use App\Queries\QueryBuilderCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    public function index(QueryBuilderCategory $categories, QueryBuilderSpendings $spending): Factory|View|Application
    {
        return view('welcome', [
                'categories' => $categories->getCategories(),
                'spending' => $spending->getSpending()
            ]
        );
    }

}
