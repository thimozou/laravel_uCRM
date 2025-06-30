<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
{
    /**
     * Datermine if the user is authorized to make this request
     * 
     * @return bool
     */
    public function authorized()
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
            'name' => ['required', 'string', 'max:50'],
            'memo' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'is_selling' => ['required', 'boolean']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '商品名は必須です。',
            'name.string' => '商品名は文字列で入力してください。',
            'name.max' => '商品名は50文字以内で入力してください。',
            'memo.required' => 'メモは必須です。',
            'memo.string' => 'メモは文字列で入力してください。',
            'memo.max' => 'メモは255文字以内で入力してください。',
            'price.required' => '価格は必須です。',
            'price.numeric' => '価格は数値で入力してください。',
        ];
    }
}