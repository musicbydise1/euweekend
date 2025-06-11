<?php

namespace Database\Factories;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->unique()->slug,
            'program_category_id' => ProgramCategory::factory(),
            'start_time' => now(),
            'end_time' => now()->addDay(),
        ];
    }
}
