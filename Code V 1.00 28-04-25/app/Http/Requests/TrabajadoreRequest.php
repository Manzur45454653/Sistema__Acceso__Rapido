<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadoreRequest extends FormRequest
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
			'nombre' => 'required|string',
			'apellido_materno' => 'required|string',
			'apellido_paterno' => 'required|string',
			'genero' => 'required|string',
			'id_plantel' => 'required',
			'id_puesto' => 'required',
			'estado' => 'required|string',
			'fotografia' => 'required|string',
			'code_qr' => 'required|string',
        ];
    }
}
