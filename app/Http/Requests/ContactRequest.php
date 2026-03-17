<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['nullable', 'string', 'min:10', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'comment' => ['nullable', 'string', 'max:2000'],
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
            'name.required' => 'Введите ваше имя',
            'name.min' => 'Имя должно содержать минимум :min символа',
            'phone.min' => 'Неверный формат телефона',
            'phone.max' => 'Неверный формат телефона',
            'email.required' => 'Введите email',
            'email.email' => 'Введите корректный email',
        ];
    }

    public function getFilters(): array
    {
        return [
            'name' => $this->validated('name'),
            'phone' => $this->validated('phone'),
            'email' => $this->validated('email'),
            'comment' => $this->validated('comment'),
        ];
    }
}
