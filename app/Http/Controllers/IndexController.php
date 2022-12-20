<?php

namespace App\Http\Controllers;

use App\Models\CategoryImg;
use App\Queries\QueryBuilderSpendings;
use App\Queries\QueryBuilderCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index(
        QueryBuilderCategory  $categories,
        QueryBuilderSpendings $spending,
        CategoryImg           $categoryImg,
        UserController        $user
    ): Factory|View|Application
    {
        return view('welcome', [
                'categories' => $categories->getCategories(Auth::user()->getAuthIdentifier()),
                'spending' => $spending->getSpending(Auth::user()->getAuthIdentifier()),
                'categoryImg' => $categoryImg->getCategoryImg(),
                'users' => $user->index()
            ]
        );
    }

}
