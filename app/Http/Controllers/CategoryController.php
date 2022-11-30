<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Queries\QueryBuilderCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * @param QueryBuilderCategory $categories
     * @return Collection
     */
    public function index(QueryBuilderCategory $categories): Collection
    {
        return $categories->getCategories();
    }

    /**
     * @param CategoryStoreRequest $request
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function store(
        CategoryStoreRequest $request,
        QueryBuilderCategory $builder
    )
    {
            $category = $builder->create($request->validated());
            return response()->json($category);
    }



    /**
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function update(
        CategoryUpdateRequest $request,
        Category $category,
        QueryBuilderCategory $builder
    ): JsonResponse
    {
            $spend = $builder->update($category, $request->validated());
            return response()->json($spend);
    }


    public function destroy(QueryBuilderCategory $categories, $id)
    {
        return $categories->destroyCategory($id);
    }
}
