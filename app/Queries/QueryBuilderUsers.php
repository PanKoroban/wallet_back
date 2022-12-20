<?php

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class QueryBuilderUsers implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getUser($user): Collection|array
    {
        return $this->model
            ->where('id', '=', $user)
            ->get();
    }

    public function update($user, array $date)
    {
        $user->fill($date)->save();
        return $user->fill($date);
    }

}
