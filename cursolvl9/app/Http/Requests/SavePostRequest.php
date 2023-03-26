<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        // las validaciones pueden variar, una forma de resolver es con una condicion
        // por ejemplo al actualizar cambia una regla: el minimo para el titulo ahora son 8 caracteres
        if($this->isMethod('PATCH')) {
            return [
                'title' => ['required', 'min:8'],
                'body' => ['required'],
            ];
        }
        return [
            'title' => ['required', 'min:4'],
            'body' => ['required'],
        ];
    }
}
