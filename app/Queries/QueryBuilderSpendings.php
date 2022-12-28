<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Spending;
use App\Models\User;
use http\Env\Response;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use function Symfony\Component\Translation\t;

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

    /**
     * Возвращает баланс авторизованного пользователя! PRIVATE
     * @return float
     */
    private function getBalanceUser(): float
    {
        $userBalance = User::query()
            ->where('id', '=', Auth::user()->getAuthIdentifier())
            ->get('balance')
            ->toArray();
        return $userBalance[0]['balance'];
    }

    /**
     * Обновляет баланс авторизованного пользователя! PRIVATE
     * @param $array
     * @return void
     */
    private function updateBalanceBackend($array)
    {
        User::query()->select('balance')
            ->where('id', '=', Auth::user()->getAuthIdentifier())
            ->update($array);
    }

    public function create(array $date): Spending|bool
    {
        $balance = $this->getBalanceUser();
        $minus = $date['sum'];
        $equation = $balance - $minus;
        $total['balance'] = $equation;

        if ($balance < $minus) {
            return false;
        }

        $this->updateBalanceBackend($total);

        return Spending::create($date);
    }

    public function update(Spending $spending, array $date): Spending|bool
    {
        $findIdInFill = $spending->fill($date);
        $id = $findIdInFill['id'];
        $selected = $this->model                    // <- Это все, чтобы взять струю сумму траты!
            ->select('sum')
            ->where('id', '=', $id)
            ->get()
            ->toArray();

        $old = $selected[0]['sum'];                 // Сумма который была в БД
        $new = $date['sum'];                        // Новая сумма

        if ($this->getBalanceUser() < $new) {       // Ошибка если введенная сумма больше чем баланс!
            return false;
        }

        if ($old < $new) {                          // Проверка. Если старая сумма меньше
            $result1 = $new - $old;                 // Находим разницу
            $total['balance'] = $this->getBalanceUser() - $result1;
            $this->updateBalanceBackend($total);    // Минусуем разницу и сохраняем в БД
        }

        if ($old > $new) {                          // Проверка. Если старая сумма больше
            $result2 = $old - $new;                 // Находим разницу
            $total['balance'] = $this->getBalanceUser() + $result2;
            $this->updateBalanceBackend($total);    // Плюсуем разницу и сохраняем в БД
        }

        $spending->fill($date)->save();
        return $spending->fill($date);
    }


    //вернет true если пытаемся удалить данные другого юзера
    public function checkSpending($id)
    {
        $data = Spending::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->get();
        return $data->isEmpty();
    }

    public function destroySpending($id): JsonResponse
    {

        if (self::checkSpending($id)) {
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
