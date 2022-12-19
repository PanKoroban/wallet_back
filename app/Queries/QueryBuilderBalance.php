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

//            self::getBalance(Auth::user()->getAuthIdentifier());
    public function update($user, array $date)
    {
        // БЕЗ ВОТ ЭТОГО ВСЕГО ОБНОВЛЯЕТ ПОЛЕ
//        $balance = DB::table('users')
//            ->select('balance')
//            ->where('id', '=', $user)
//            ->get();
//
//$a = array($balance);
//
//
//        // $a = $b[0] + $date;
//        dd($a[0]['balance']);

        $user->fill($date)->save();
        return $user->fill($date);
    }
}
