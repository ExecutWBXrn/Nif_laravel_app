<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EstateRequest extends FormRequest
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
        $rules = [
            "builder" => ["nullable", "string"],
            "complex" => ["nullable", "string"],
            "description" => ["nullable", "string"],
            "is_sell" => ["nullable", "boolean"],
            "city" => ["required", "string"],
            "street" => ["required", "string"],
            "price" => ["required", "numeric"],
            "amount_of_room" => ["nullable", "numeric"],
            "floor" => ["nullable", "numeric"],
            "floor_estate" => ["nullable", "numeric"],
            "square" => ["nullable", "numeric"],
            "square_of_kitchen" => ["nullable", "numeric"],
            "building_date" => ["nullable", "date"],
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        if ($this->isMethod('post')) {
            $rules['photos'] = 'required|array';
        } elseif ($this->isMethod('patch')) {
            $rules['photos'] = 'nullable|array';
        }

        return $rules;
    }

    public function messages(): array{
        return array(
            'city.required' => 'Поле з містом повинне бути заповнене',
            'city.string' => 'Поле з містом може містити тільки букви',
            'street.required' => 'Поле з вулицею повинне бути заповнене',
            'street.string' => 'Поле з вулицею може містити тільки букви',
            'price.required' => 'Поле з ціною повинне бути заповнене',
            'price.numeric' => 'Поле з ціною може містити тільки цифри',
            'amount_of_room.numeric' => 'Поле з кількістю кімнат може містити тільки цифри',
            'floor.numeric' => 'Поле з кількістю поверхів може містити тільки цифри',
            'floor_estate.numeric' => 'Поле з поверховістю може містити тільки цифри',
            'square.numeric' => 'Поле з площею може містити тільки цифри',
            'square_of_kitchen.numeric' => 'Поле з площею кухні може містити тільки цифри',
            'photos.*.image' => 'Кожен файл повинен бути зображенням формату jpeg, png або jpg',
            'photos.*.mimes' => 'Кожне фото має бути формату jpeg, png або jpg',
            'photos.*.max' => 'Кожне фото повинно бути меншим за 2 МБ',
            'photos.required' => 'Повинно бути додано що найменше одне фото з квартирою'
        );
    }
}
