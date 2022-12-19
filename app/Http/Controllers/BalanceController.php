<?php

namespace App\Http\Controllers;

use App\Http\Requests\BalanceRequest;
use App\Models\User;
use App\Queries\QueryBuilderBalance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class BalanceController extends Controller
{
    /**
     *
     * Выводит баланс только У авторизованного пользователя!
     * ...api/balance - Ручка REST API
     *
     * @param QueryBuilderBalance $balance
     * @return Collection
     */
    public function index(QueryBuilderBalance $balance): Collection
    {
        return $balance->getBalance(Auth::user()->getAuthIdentifier());
    }

    public function store(
        BalanceRequest      $request,
        QueryBuilderBalance $builder
    ): JsonResponse
    {
        $builder->update(Auth::user(), $request->validated());

        return response()->json($builder->getBalance(Auth::user()->getAuthIdentifier()));
    }
}
