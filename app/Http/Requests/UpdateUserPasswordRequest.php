<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPasswordRequest extends FormRequest
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
            'old_password' => 'required',
            'new_password' => 'required|min:7|confirmed',
        ];
    }

    public function messages ()
    {
        return [
            'old_password.required' => 'Ingrese el password actual',
            'new_password.required' => 'Ingrese el nuevo password',
            'new_password.min' => 'El nuevo password debe contener al menos :min caracteres',
            'new_password.confirmed' => 'El nuevo password no concuerda con el password de confirmacion',
        ];
    }
}
