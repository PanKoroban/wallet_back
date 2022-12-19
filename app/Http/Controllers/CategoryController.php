<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use App\Queries\QueryBuilderCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
    /**
     * @param QueryBuilderCategory $categories
     * @return Collection
     */
    public function index(QueryBuilderCategory $categories): Collection
    {
        return $categories->getCategories(Auth::user()->getAuthIdentifier());
    }

    /**
     * @param CategoryStoreRequest $request
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function store(
        CategoryStoreRequest $request,
        QueryBuilderCategory $builder
    ): JsonResponse
    {
        $builder->create($request->validated());
        return response()->json($builder->getCategories());
    }

    /**
     * @param CategoryUpdateRequest $request
     * @param Category $category
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function update(
        CategoryUpdateRequest $request,
        Category              $category,
        QueryBuilderCategory  $builder
    ): JsonResponse
    {
        $builder->update($category, $request->validated());
        return response()->json($builder->getCategories());
    }

    /**
     * @param QueryBuilderCategory $categories
     * @param $id
     * @return JsonResponse
     */
    public function destroy(QueryBuilderCategory $categories, $id): JsonResponse
    {
        return $categories->destroyCategory($id);
    }
}
