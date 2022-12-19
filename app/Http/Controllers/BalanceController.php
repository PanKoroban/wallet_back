<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Queries\QueryBuilderBalance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     *
     * Выводит баланс только У авторизованного пользователя!
     * GET ...api/balance
     *
     * @param QueryBuilderBalance $balance
     * @return Collection
     */
    public function index(QueryBuilderBalance $balance): Collection
    {
        return $balance->getBalance(Auth::user()->getAuthIdentifier());
    }

    /**
     *
     * Увеличить сумму баланса!
     * POST ...api/balance
     *            --header 'Content-Type: application/json'
     *             {
     *                "balance": 2000
     *              }
     *
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

    /**
     *
     * Обновляет поле баланса у пользователя полностью!
     * PUT ...api/balance/1
     *            --header 'Content-Type: application/json'
     *             {
     *                "balance": 2000
     *              }
     *
     * @param BalanceRequest $request
     * @param QueryBuilderBalance $builder
     * @return JsonResponse
     */
    public function update(
        BalanceRequest      $request,
        QueryBuilderBalance $builder
    ): JsonResponse
    {
        $builder->updateBalance(Auth::user(), $request->validated());
        return response()->json($builder->getBalance(Auth::user()->getAuthIdentifier()));
    }


}
