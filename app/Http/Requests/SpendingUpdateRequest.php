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
            'name' => ['required', 'string', 'max:20'],
            'category_id' => ['required', 'string', 'max:20'],
            'sum' => ['required', 'string', 'max:20'],
            'created_at' => ['required', 'string', 'max:20']
        ];
    }
}
