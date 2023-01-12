<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UsersUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255', 'min:3'],
            'surname' => ['nullable', 'string', 'max:255', 'min:3'],
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::user()->getAuthIdentifier())],
            'password' => ['nullable', 'string', 'min:3'],
        ];

    }
}
