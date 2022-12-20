<?php

namespace App\Http\Controllers;

use App\Models\CategoryImg;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

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

//    public function show($id): Model|Builder
//    {
//        $img = new CategoryImg();
//        return $img->getCategoryImgById($id);
//    }

}
