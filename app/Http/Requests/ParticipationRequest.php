<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipationRequest extends FormRequest
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
            'firstname' => 'required|max:20|min:2',
            'lastname' => 'required|max:20|min:2',
            'number' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'montant' => 'nullable',
            'commentaire' => 'nullable|bail|max:255',
        ];
    }
}
