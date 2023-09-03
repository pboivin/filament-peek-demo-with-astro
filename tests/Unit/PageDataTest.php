<?php

namespace Tests\Unit;

use App\Data\PageData;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_transform_page(): void
    {
        $dto = PageData::from(
            Page::factory()->create()
        );

        $this->assertNotEmpty($dto->id);
        $this->assertNotEmpty($dto->title);
        $this->assertNotEmpty($dto->slug);
        $this->assertNotEmpty($dto->content);
    }
}
