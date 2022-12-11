<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(User $user)
    {
        return $user::query()->get();
    }


    public function store()
    {

    }
}
