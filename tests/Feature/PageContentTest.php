<?php

namespace Tests\Feature;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_pages(): void
    {
        Page::factory(2)->create();

        $response = $this
            ->get('/content/pages')
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }

    public function test_can_get_page(): void
    {
        $page = Page::factory()->create([
            'title' => 'Lorem ipsum',
        ]);

        $response = $this
            ->get('/content/page/' . $page->slug)
            ->assertStatus(200);

        $this->assertEquals('Lorem ipsum', $response->json('title'));
    }
}
