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
     * @return JsonResponse
     */
    public function store(
        BalanceRequest      $request,
        QueryBuilderBalance $builder
    ): JsonResponse
    {
        $builder->addBalance(Auth::user(), $request->validated());
        return response()->json($builder->getBalance(Auth::user()->getAuthIdentifier()));
    }

}
