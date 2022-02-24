<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'bail|required|min:5|max:100',
            'content' => 'required|min:10',
            'images[]' => 'image|mimes:jpeg,jpg,png,gif,svg',
            'images.*' => 'image|mimes:jpeg,jpg,png,gif,svg',
            // 'categorie' => 'min:2|max:60',
        ];
    }
}
