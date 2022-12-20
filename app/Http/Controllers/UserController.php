<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Queries\QueryBuilderUsers;
use Illuminate\Database\Eloquent\Collection;

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
     * Можно POST запрос будет выглядеть так api/user {...}
     *
     * @param QueryBuilderUsers $builder
     * @param UsersUpdateRequest $request
     * @return JsonResponse
     */
    public function store(
        QueryBuilderUsers  $builder,
        UsersUpdateRequest $request
    ): JsonResponse
    {
        $builder->update(Auth::user(), $request->validated());
        return response()->json($builder->getUser(Auth::user()->getAuthIdentifier()));
    }

    /**
     *
     * Можно PUT запрос будет выглядеть так api/user/1 {...}
     *
     * @param QueryBuilderUsers $builder
     * @param UsersUpdateRequest $request
     * @return JsonResponse
     */
    public function update(
        QueryBuilderUsers  $builder,
        UsersUpdateRequest $request
    ): JsonResponse
    {
        $builder->update(Auth::user(), $request->validated());
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
