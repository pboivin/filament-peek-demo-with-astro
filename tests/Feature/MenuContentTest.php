<?php

namespace Tests\Feature;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_pages(): void
    {
        Menu::factory(2)->create();

        $response = $this
            ->get('/content/menus')
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }
}
