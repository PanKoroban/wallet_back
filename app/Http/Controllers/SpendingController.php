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
        $data = $request->validated();
        $data['user_id'] = Auth::user()->getAuthIdentifier();

        if ($builder->create($data) === false) {
            return response()->json($builder->getSpending(Auth::user()->getAuthIdentifier()), '400');
        }
        return response()->json($builder->getSpending(Auth::user()->getAuthIdentifier()));

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
        $data = $request->validated();
        $data['user_id'] = Auth::user()->getAuthIdentifier();

        $builder->update($spending, $data);
        return response()->json($builder->getSpending(Auth::user()->getAuthIdentifier()));
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
