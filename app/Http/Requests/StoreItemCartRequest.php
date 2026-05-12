<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemCartRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id' => 'required|integer|exists:products,id',
            'specification_id' => 'required|integer|exists:specifications,id',
            'quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'product_id.required' => 'Не указан товар',
            'product_id.integer' => 'Некорректный идентификатор товара',
            'product_id.exists' => 'Товар не найден',
            'specification_id.required' => 'Не указана спецификация товара',
            'specification_id.integer' => 'Некорректный идентификатор спецификации',
            'specification_id.exists' => 'Спецификация не найдена',
            'quantity.required' => 'Не указано количество',
            'quantity.integer' => 'Количество должно быть целым числом',
            'quantity.min' => 'Минимальное количество товара — 1',
        ];
    }
}
