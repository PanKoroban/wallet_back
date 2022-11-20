<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Spending;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $categories = app(Category::class)->getCategories();
        $spending = app(Spending::class)->getSpending();
        return view('welcome', [
                'categories' => $categories,
                'spending' => $spending,
            ]
        );
    }
}
