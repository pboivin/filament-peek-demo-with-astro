<?php

namespace Tests\Unit;

use App\Data\CategoryData;
use App\Data\PostData;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PostDataTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_transform_post(): void
    {
        $dto = PostData::from(
            Post::factory()
                ->for(Category::factory())
                ->create()
        );

        $this->assertNotEmpty($dto->id);
        $this->assertNotEmpty($dto->title);
        $this->assertNotEmpty($dto->slug);
        $this->assertNotEmpty($dto->main_image);
        $this->assertNotEmpty($dto->content_blocks);
        $this->assertNotEmpty($dto->footer_blocks);
        $this->assertNotEmpty($dto->category);

        $this->assertFalse($dto->is_featured);
        $this->assertNull($dto->published_at);
    }

    public function test_can_transform_post_category(): void
    {
        $dto = PostData::from(
            Post::factory()
                ->for(Category::factory())
                ->create()
        );

        $this->assertTrue($dto->category instanceof CategoryData);
        $this->assertNotEmpty($dto->category->id);
        $this->assertNotEmpty($dto->category->name);
        $this->assertNotEmpty($dto->category->slug);
    }

    public function test_can_transform_post_published_at(): void
    {
        $dto = PostData::from(
            Post::factory()
                ->for(Category::factory())
                ->create([
                    'published_at' => '2001-01-01 01:01:01',
                ])
        );

        $this->assertEquals('Jan 1st, 2001', $dto->published_at);
    }

    public function test_can_transform_post_main_image_url(): void
    {
        $dto = PostData::from(
            Post::factory()
                ->for(Category::factory())
                ->create([
                    'main_image_upload' => null,
                    'main_image_url' => $url = 'http://example.com/image.jpg',
                ])
        );

        $this->assertEquals($url, $dto->main_image);
    }

    public function test_can_transform_post_main_image_upload(): void
    {
        $dto = PostData::from(
            Post::factory()
                ->for(Category::factory())
                ->create([
                    'main_image_upload' => $file = 'image.jpg',
                    'main_image_url' => null,
                ])
        );

        $this->assertEquals(Storage::disk('public')->url($file), $dto->main_image);
    }
}
