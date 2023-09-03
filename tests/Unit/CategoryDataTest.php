<?php

namespace Tests\Unit;

use App\Data\CategoryData;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_transform_category(): void
    {
        $dto = CategoryData::from(
            Category::factory()->create()
        );

        $this->assertNotEmpty($dto->id);
        $this->assertNotEmpty($dto->name);
        $this->assertNotEmpty($dto->slug);
    }
}
