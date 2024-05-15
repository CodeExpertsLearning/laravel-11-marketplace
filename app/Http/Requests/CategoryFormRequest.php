<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryFormRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable|min:20',
        ];
    }

    public function messages()
    {
        return [
            //'name.required' => 'Mensagem exclusiva pro campo :attribute e o validador required!'
            'required' => 'Este campo é requirido!',
            'min' => 'Este campo deve ter pelo menos :min caracteres'
        ];
    }
}
