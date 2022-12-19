<?php

namespace App\Queries;

use App\Http\Requests\BalanceRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QueryBuilderBalance
{
    private Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getBalance($user): Collection|array
    {
        return $this->model
            ->select('balance')
            ->where('id', '=', $user)
            ->get();
    }


    public function update($user, array $date)
    {
        $balance = $this->model
            ->where('id', '=', Auth::user()->getAuthIdentifier())
            ->get('balance')
            ->toArray();

        $ourBalance = $balance[0]['balance'];

        $sum = $ourBalance + $date['balance'];

        $ourSum['balance'] = $sum;

        $user->fill($ourSum)->save();
        return $user->fill($ourSum);
    }
}
