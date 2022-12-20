<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Spending;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

final class QueryBuilderSpendings implements QueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Spending::query();
    }

    /**
     * ВСЕ ТРАТЫ
     */
    public function getSpending($user): Collection
    {
        return Spending::query()
            ->join('categories', 'categories.id', '=', 'spending.category_id')
            ->join('categories_img', 'categories_img.id', '=', 'categories.img_id')
            ->where('spending.user_id', '=', $user)
            ->select([
                'spending.id',
                'spending.user_id',
                'spending.name',
                'spending.category_id',
                'spending.sum',
                'spending.created_at',
                'spending.updated_at',

                'categories.name as categoryName',
                'categories_img.img_name as categoryImg',
            ])
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * Фильтр трат по ID Категорий!
     */
    public function getSpendingByCategory($id): Collection|string
    {
        return Spending::query()
            ->join('categories', 'categories.id', '=', 'spending.category_id')
            ->join('categories_img', 'categories_img.id', '=', 'categories.img_id')
            ->select([
                'spending.id',
                'spending.user_id',
                'spending.name',
                'spending.category_id',
                'spending.sum',
                'spending.created_at',
                'spending.updated_at',

                'categories.name as categoryName',
                'categories_img.img_name as categoryImg',
            ])
            ->orderBy('created_at', 'desc')
            ->where('category_id', '=', $id)
            ->get();
    }

    public function create(array $date): Spending
    {
        return Spending::create($date);
    }

    public function update(Spending $spending, array $date): Spending
    {
        $spending->fill($date)->save();
        return $spending->fill($date);
    }


    //вернет true если пытаемся удалить данные другого юзера
    public function checkSpending($id){
        $data = Spending::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->get();
        return $data->isEmpty();
    }

    public function destroySpending($id): JsonResponse
    {

        if(self::checkSpending($id)){
            return response()->json('Не существует такой траты!', 400);
        }

/* На будущее разобраться: если удалить этот if то удаляются все категории а не одна :) */
        if ($this->model->find($id) == NULL) {
            return response()->json('Не существует такой траты!', 400);
        }

        try {
            $this->model->delete();
            return response()->json(self::getSpending(Auth::user()->getAuthIdentifier()));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return response()->json('Ошибка при удалении!', 400);
        }
    }



}
