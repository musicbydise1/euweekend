<?php

namespace Tests\Unit;

use App\Models\Program;
use App\Models\ProgramCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgramFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_filter_by_category_slug(): void
    {
        $category = ProgramCategory::factory()->create(['slug' => 'sports']);
        $otherCategory = ProgramCategory::factory()->create(['slug' => 'music']);

        $matchingProgram = Program::factory()->create(['program_category_id' => $category->id]);
        Program::factory()->create(['program_category_id' => $otherCategory->id]);

        $result = Program::filter(['category' => 'sports'])->get();

        $this->assertTrue($result->contains($matchingProgram));
        $this->assertCount(1, $result);
    }

    public function test_filter_by_date_range(): void
    {
        $now = now();
        $programInRange = Program::factory()->create([
            'start_time' => $now->copy()->addDay(),
            'end_time' => $now->copy()->addDays(2),
        ]);

        Program::factory()->create([
            'start_time' => $now->copy()->subDays(4),
            'end_time' => $now->copy()->subDays(2),
        ]);

        $result = Program::filter([
            'start_date' => $now->toDateTimeString(),
            'end_date' => $now->copy()->addDays(3)->toDateTimeString(),
        ])->get();

        $this->assertTrue($result->contains($programInRange));
        $this->assertCount(1, $result);
    }
}
