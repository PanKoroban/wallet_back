<?php

namespace App\Http\Controllers;

use App\Models\Spending;
use App\Queries\QueryBuilderSpendings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SpendingController extends Controller
{
    /**
     * @param QueryBuilderSpendings $spending
     * @return array|Collection
     */
    public function index(QueryBuilderSpendings $spending): array|Collection
    {
        return $spending->getSpendingWithCategoryName();
    }

    /**
     * @return void
     */
    public function create()
    {
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['category_id', 'sum']);
        }
        $spending = new Spending($validated);
        if ($spending->save()) {
            return response()->json($validated);
        } else {
            return response()->json('error', 400);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id)
    {
    }

    /**
     * @param Request $request
     * @param Spending $spending
     * @return JsonResponse
     */
    public function update(Request $request, Spending $spending): JsonResponse
    {
        if ($request->accepts(['text/html', 'application/json'])) {
            $validated = $request->only(['category_id', 'sum']);
        }
        $spending = $spending->fill($validated);
        if ($spending->save()) {
            return response()->json($validated);
        } else {
            return response()->json('error', 400);
        }
    }

    /**
     * @param Spending $spending
     * @return JsonResponse
     */
    public function destroy(Spending $spending): JsonResponse
    {
        try {
            $spending->delete();
            return response()->json('success');
        } catch(\Exception){
            return response()->json('error', 400);
        }
    }
}
