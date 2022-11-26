<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Queries\QueryBuilderCategory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function store(
        Request              $request,
        QueryBuilderCategory $builder
    ): JsonResponse
    {
/*
        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['name', 'img_name']);
        }
        $category = new Category($validated);
        if ($category->save()) {
            return response()->json($validated);
        } else {
            return response()->json('error', 400);
        }
*/
        if ($request->accepts(['text/html', 'application/json'])) {
            $category = $builder->create(
                $request->only(['name', 'img_name'])
            );

            if ($category) {
                return response()->json($category);
            }
        }
        return response()->json('Error', 404);

    }

    /**
     * @param Request $request
     * @param Category $category
     * @param QueryBuilderCategory $builder
     * @return JsonResponse
     */
    public function update(
        Request $request,
        Category $category,
        QueryBuilderCategory $builder
    ): JsonResponse
    {
/*
        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['name', 'img_name']);
        }

        $category = $category->fill($validated);
        if ($category->save()) {
            return response()->json($validated);;
        }

        return response()->json('error', 400);
*/
        if ($request->accepts(['text/html', 'application/json'])) {
            $spend = $builder->update(
                $category,
                $request->only(['name', 'img_name'])
            );
            return response()->json($spend);
        }
        return response()->json('Error', 404);
    }

    /**
     * @param Category $category
     * @return JsonResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json('ok');
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('error', 400);
        }
    }
}
