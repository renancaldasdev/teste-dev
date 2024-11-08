<?php

namespace App\Contacts\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'age' => 'required|integer|min:0|max:120',
            'zip_code' => 'required|string|max:10',
            'address' => 'required|string|max:255',
            'address_number' => 'required|string|max:20',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'O campo de usuário é obrigatório.',
            'user_id.exists' => 'O usuário selecionado não existe.',
            'name.required' => 'O campo nome é obrigatório.',
            'telephone.required' => 'O campo telefone é obrigatório.',
            'age.required' => 'O campo idade é obrigatório.',
            'age.integer' => 'A idade deve ser um número.',
            'age.min' => 'A idade deve ser pelo menos 0.',
            'age.max' => 'A idade não deve ser maior que 120.',
            'zip_code.required' => 'O campo CEP é obrigatório.',
            'address.required' => 'O campo endereço é obrigatório.',
            'address_number.required' => 'O campo número do endereço é obrigatório.',
            'city.required' => 'O campo cidade é obrigatório.',
            'state.required' => 'O campo estado é obrigatório.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Falha na validação.',
            'errors' => $validator->errors()
        ], 422));
    }
}
