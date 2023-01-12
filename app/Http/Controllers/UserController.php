<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Queries\QueryBuilderUsers;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @param QueryBuilderUsers $builder
     * @return Collection|array
     */
    public function index(QueryBuilderUsers $builder): Collection|array
    {
        return $builder->getUser(Auth::user()->getAuthIdentifier());
    }

    /**
     *
     * Можно PUT запрос будет выглядеть так api/user/1 {...}
     *
     * @param QueryBuilderUsers $builder
     * @param UsersUpdateRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(
        QueryBuilderUsers  $builder,
        UsersUpdateRequest $request,
        User               $user
    ): JsonResponse
    {
        $user = $user->fill($request->validated());
        $user->fill(['password' => Hash::make($request['password'])])->save();
        return response()->json($builder->getUser(Auth::user()->getAuthIdentifier()));
    }

    /**
     * @param $id
     * @return void
     */
    public function destroy($id)
    {
    }
}
