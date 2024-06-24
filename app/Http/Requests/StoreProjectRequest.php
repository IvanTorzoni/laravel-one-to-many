<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' =>  [ 'required', 'unique:projects' ],
            'description' => ['min:5', 'max:300']
        ];
    }

        /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Il campo del titolo non può essere vuoto',
            'title.unique' => 'Non ci possono essere due progetti con lo stesso titolo',
            'description.min' => 'Inserire almeno 5 caratteri',
            'description.max' => 'Limite di caratteri inseribili raggiunto (300 caratteri)',
        ];
    }
}
