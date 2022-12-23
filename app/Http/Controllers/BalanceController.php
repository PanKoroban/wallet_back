<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Queries\QueryBuilderBalance;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * @param BalanceRequest $request
     * @param QueryBuilderBalance $builder
     * @return JsonResponse|string
     */
    public function store(
        BalanceRequest      $request,
        QueryBuilderBalance $builder
    ): JsonResponse|string
    {
        if ($builder->addBalance(Auth::user(), $request->validated()) === false) {
            return response()->json(["Сумма баланса не должно превышать 999 999",
                $builder->getBalance(Auth::user()->getAuthIdentifier())
            ]);
        }
        return response()->json($builder->getBalance(Auth::user()->getAuthIdentifier()));
    }

}
