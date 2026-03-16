<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'price_min' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'price_max' => ['nullable', 'numeric', 'min:0', 'max:999999.99'],
            'sort' => ['nullable', 'string', 'in:price,popularity,created_at,name'],
            'order' => ['nullable', 'string', 'in:asc,desc'],
            'search' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable', 'boolean'],
            'per_page' => ['nullable', 'integer', 'min:1', 'max:100'],
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator): void
    {
        $validator->sometimes('price_max', 'gte:price_min', function ($input) {
            return !empty($input->price_min) && !empty($input->price_max);
        });
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'category_id.exists' => 'Выбранная категория не существует.',
            'price_min.numeric' => 'Минимальная цена должна быть числом.',
            'price_max.numeric' => 'Максимальная цена должна быть числом.',
            'price_max.gte' => 'Максимальная цена должна быть больше минимальной.',
            'sort.in' => 'Неверный параметр сортировки.',
            'order.in' => 'Неверный порядок сортировки.',
            'search.max' => 'Поисковый запрос слишком длинный.',
            'per_page.max' => 'Максимум 100 товаров на страницу.',
        ];
    }

    /**
     * Get validated filters with defaults
     *
     * @return array
     */
    public function getFilters(): array
    {
        return [
            'category_id' => $this->validated('category_id'),
            'price_min' => $this->validated('price_min'),
            'price_max' => $this->validated('price_max'),
            'sort' => $this->validated('sort', 'created_at'),
            'order' => $this->validated('order', 'desc'),
            'search' => $this->validated('search'),
            'is_active' => $this->validated('is_active', true),
            'per_page' => $this->validated('per_page', 12),
        ];
    }
}

