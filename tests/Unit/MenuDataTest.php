<?php

namespace Tests\Unit;

use App\Data\MenuData;
use App\Data\MenuItemData;
use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MenuDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_transform_menu(): void
    {
        $dto = MenuData::from(
            Menu::factory()->create()
        );

        $this->assertNotEmpty($dto->name);
        $this->assertNotEmpty($dto->items);

        $this->assertTrue($dto->items[0] instanceof MenuItemData);
        $this->assertNotEmpty($dto->items[0]->title);
        $this->assertNotEmpty($dto->items[0]->url);
        $this->assertNotEmpty($dto->items[0]->type);
    }
}
