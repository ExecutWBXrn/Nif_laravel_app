<?php

namespace Database\Factories;

use App\Models\Estate;
use App\Models\EstatePhotos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EstatePhotos>
 */
class EstatePhotosFactory extends Factory
{
    protected $model = EstatePhotos::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'estate_id' => Estate::factory(),
            'photo' => 1,
        ];
    }
}
