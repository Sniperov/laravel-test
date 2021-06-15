<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CharacterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return backpack_auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'birthday' => 'required|date',
            'occupations' => 'required|json',
            'img' => 'required|string',
            'nickname' => 'required|string|min:2',
            'portrayed' => 'required|string|min:2',
        ];
    }
}
