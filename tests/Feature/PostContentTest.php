<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Category;

class PostContentTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_published_posts(): void
    {
        Post::factory(2)->for(Category::factory())->published()->create();
        Post::factory(2)->for(Category::factory())->create();

        $response = $this
            ->get('/content/posts')
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }

    public function test_can_get_published_posts_for_category(): void
    {
        $category1 = Category::factory()->create();
        Post::factory(2)->published()->create(['category_id' => $category1->id]);
        Post::factory(2)->create(['category_id' => $category1->id]);

        $category2 = Category::factory()->create();
        Post::factory(2)->published()->create(['category_id' => $category2->id]);
        Post::factory(2)->create(['category_id' => $category2->id]);

        $response = $this
            ->get('/content/posts/category/' . $category2->slug)
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }

    public function test_can_get_published_featured_posts(): void
    {
        Post::factory(2)->for(Category::factory())->featured()->published()->create();
        Post::factory(2)->for(Category::factory())->featured()->create();

        $response = $this
            ->get('/content/posts/featured')
            ->assertStatus(200);

        $this->assertCount(2, $response->json());
    }

    public function test_can_get_published_post(): void
    {
        $post = Post::factory()->for(Category::factory())->published()->create([
            'title' => 'Lorem ipsum',
        ]);

        $response = $this
            ->get('/content/post/' . $post->slug)
            ->assertStatus(200);

        $this->assertEquals('Lorem ipsum', $response->json('title'));
    }

    public function test_cannot_get_unpublished_post(): void
    {
        $post = Post::factory()->for(Category::factory())->create([
            'title' => 'Lorem ipsum',
        ]);

        $response = $this
            ->get('/content/post/' . $post->id)
            ->assertStatus(404);
    }
}
