<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


final class QueryBuilderCategory implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories($user): Collection|array
    {
        return $this->model
            ->with('img')
            ->where('categories.user_id', '=', $user)
            ->orWhere('categories.is_default', '=',true)
            ->orderBy('categories.id', 'desc')
            ->get();
    }

    public function create(array $date): Category
    {
        return Category::create($date);
    }

    public function update(Category $category, array $date): Category
    {
        $category->fill($date)->save();
        return $category->fill($date);
    }


    //вернет true если пытаемся удалить/изменить данные другого юзера
    public function checkCategory($id){
        $data = Category::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->get();
        return $data->isEmpty();
    }


    public function destroyCategory($id): JsonResponse
    {

        if(self::checkCategory($id)){
            return response()->json('Категория не существует!', 400);
        }


/* На будущее разобраться: если удалить этот if то удаляются все категории а не одна :) */
        if ($this->model->find($id) == NULL) {
            return response()->json('Категория не существует!', 400);
        }

        try {
            $this->model->delete();
            $category = new Category;
            return response()->json($category
                ->with('img')
                ->where('categories.user_id', '=', Auth::user()->getAuthIdentifier())
                ->orderBy('categories.id', 'desc')
                ->get());
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('Категория используется и не может быть удалена!', 400);
        }

    }


}
