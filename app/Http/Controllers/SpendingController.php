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
     * @return Collection
     */
    public function index(QueryBuilderSpendings $spending): Collection
    {
        return $spending->getSpending();
    }

    /**
     * @return void
     */
    public function create()
    {
    }

    /**
     * @param Request $request
     * @param QueryBuilderSpendings $builder
     * @return JsonResponse
     */
    public function store(
        Request               $request,
        QueryBuilderSpendings $builder
    ): JsonResponse
    {
        /*
                if ($request->accepts(['text/html', 'application/json'])) {
                    $validated = $request->only(['name', 'category_id', 'sum', 'created_at']);
                }
                $spending = new Spending($validated);
                if ($spending->save()) {
                    return response()->json($validated);
                } else {
                    return response()->json('error', 400);
                }
        */

        if ($request->accepts(['text/html', 'application/json'])) {
            $spending = $builder->create(
                $request->only(['name', 'category_id', 'sum', 'created_at'])
            );

            if ($spending) {
                return response()->json($spending);
            }
        }
        return response()->json('Error', 404);
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
     * @param QueryBuilderSpendings $builder
     * @return JsonResponse
     */
    public function update(
        Request               $request,
        Spending              $spending,
        QueryBuilderSpendings $builder
    ): JsonResponse
    {
        /*
                if ($request->accepts(['text/html', 'application/json'])) {
                    $validated = $request->only(['name', 'category_id', 'sum', 'updated_at']);
                }
                $spending = $spending->fill($validated);
                if ($spending->save()) {
                    return response()->json($validated);
                } else {
                    return response()->json('error', 400);
                }
        */
        if ($request->accepts(['text/html', 'application/json'])) {
            $spend = $builder->update(
                $spending,
                $request->only(['name', 'category_id', 'sum', 'created_at'])
            );
            return response()->json($spend);
        }
        return response()->json('Error', 404);
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
        } catch (\Exception) {
            return response()->json('error', 400);
        }
    }
}
