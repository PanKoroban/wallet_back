<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

final class QueryBuilderBalance implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getBalance($user): Collection|array
    {
        return $this->model
            ->where('id', '=', $user)
            ->get();
    }

    public function addBalance($user, array $date)
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
