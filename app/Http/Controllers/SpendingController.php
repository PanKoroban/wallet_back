<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpendingStoreRequest;
use App\Http\Requests\SpendingUpdateRequest;
use App\Models\Spending;
use App\Queries\QueryBuilderSpendings;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SpendingController extends Controller
{
    /**
     * @param QueryBuilderSpendings $spending
     * @return Collection
     */
    public function index(QueryBuilderSpendings $spending): Collection
    {
        return $spending->getSpending(Auth::user()->getAuthIdentifier());
    }

    /**
     * @param SpendingStoreRequest $request
     * @param QueryBuilderSpendings $builder
     * @return JsonResponse
     */
    public function store(
        SpendingStoreRequest  $request,
        QueryBuilderSpendings $builder
    ): JsonResponse
    {
        $builder->create($request->validated());
        return response()->json($builder->getSpending());

    }

    /**
     * @param QueryBuilderSpendings $builder
     * @param $id
     * @return Collection
     */
    public function show(QueryBuilderSpendings $builder, $id): Collection
    {
        return $builder->getSpendingByCategory($id);
    }

    /**
     * @param SpendingUpdateRequest $request
     * @param Spending $spending
     * @param QueryBuilderSpendings $builder
     * @return JsonResponse
     */
    public function update(
        SpendingUpdateRequest $request,
        Spending              $spending,
        QueryBuilderSpendings $builder
    ): JsonResponse
    {
        $builder->update($spending, $request->validated());

        return response()->json($builder->getSpending());
    }

    /**
     * @param QueryBuilderSpendings $spending
     * @param $id
     * @return JsonResponse
     */
    public function destroy(QueryBuilderSpendings $spending, $id): JsonResponse
    {
        return $spending->destroySpending($id);
    }
}
