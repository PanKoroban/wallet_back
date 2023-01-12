<?php

namespace App\Http\Controllers;

use App\Models\CategoryImg;
use Illuminate\Database\Eloquent\Collection;

class CategoryImgController extends Controller
{
    /**
     * @param CategoryImg $categoryImg
     * @return Collection|array
     */
    public function index(CategoryImg $categoryImg): Collection|array
    {
        return $categoryImg->getCategoryImg();
    }

}
