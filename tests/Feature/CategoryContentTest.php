<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_categories(): void
    {
        Category::factory(2)->create();

        $response = $this
            ->get('/content/categories')
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }
}
