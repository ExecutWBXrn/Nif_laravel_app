<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistryRequest extends FormRequest
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
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'unique:users,phone', 'regex:/^\+?[0-9]{7,15}$/'],
            'password' => ['required', 'min:4', 'confirmed'],
            'avatar' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048']
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
            'password.required' => 'Поле з паролем повинне бути заповненим',
            'password.min' => 'Пароль повинен містити принаймні 4-и символи',
            'password.confirmed' => 'Поля з паролями не співпадають',
            'avatar.image' => 'Потрібно передати фото формату jpeg, png, jpg, gif',
            'avatar.mimes' => 'Потрібно передати фото формату jpeg, png, jpg, gif',
            'avatar.max' => 'Максимальний розмір аватарки повинен бути меншим за 2 мб',
        ];
    }
}
