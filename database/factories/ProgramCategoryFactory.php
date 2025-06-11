<?php

namespace Database\Factories;

use App\Models\ProgramCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\ProgramCategory>
 */
class ProgramCategoryFactory extends Factory
{
    protected $model = ProgramCategory::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
        ];
    }
}
