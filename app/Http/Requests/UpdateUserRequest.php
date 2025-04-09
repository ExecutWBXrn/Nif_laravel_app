<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'min:2'],
            'surname' => ['required', 'min:2'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user()->id)],
            'phone' => ['required', Rule::unique('users')->ignore($this->user()->id), 'regex:/^\+?[0-9]{7,15}$/'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Поле з ім\'ям повинне бути заповнене',
            'name.min' => 'Ім\'я занадто коротке',
            'surname.required' => 'Поле з прізвищем повинне бути заповнене',
            'surname.min' => 'Прізвище занадто коротке',
            'email.required' => 'Поле з електронною поштою повинне бути заповнене',
            'email.email' => 'Некоректний адрес електронної пошти',
            'email.unique' => 'Користувач з такою електронною поштою уже зареєстрований',
            'phone.required' => 'Поле з номером телефону обов\'язкове',
            'phone.unique' => 'Користувач з таким номером телефону уже зареєстрований',
            'avatar.image' => 'Потрібно передати фото формату jpeg, png, jpg, gif',
            'avatar.mimes' => 'Потрібно передати фото формату jpeg, png, jpg, gif',
            'avatar.max' => 'Максимальний розмір аватарки повинен бути меншим за 2 мб',
        ];
    }
}
