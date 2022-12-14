<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpendingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:30'],
            'category_id' => ['required', 'int', 'exists:categories,id'],
            'sum' => ['required', 'numeric'],
            'created_at' => ['date'],
//            'user_id' => ['required', 'int', 'exists:users,id'],
        ];
    }
}
