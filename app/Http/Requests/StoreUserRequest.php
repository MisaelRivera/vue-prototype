<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ingrese el nombre',
            'name.min' => 'El nombre debe de contener al menos :min caracteres',
            'email.required' => 'Ingrese el correo',
            'email.email' => 'Ingrese un correo valido',
            'password.required' => 'Ingrese el password',
            'password.min' => 'El password debe ser de al menos :min caracteres',
            'password.confirmed' => 'El password no concuerda con el password de confirmacion'
        ];
    }
}
