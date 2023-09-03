<?php

namespace App\Data;

use App\Helpers\Image;
use App\Models\Post;
use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public bool $is_featured,
        public string $main_image,
        public array $content_blocks,
        public array $footer_blocks,
        public CategoryData $category,
        public ?int $id = null,
        public ?string $published_at = null,
    ) {
    }

    public static function fromModel(Post $post): static
    {
        return static::from([
            'id' => $post->id,
            'title' => $post->title,
            'slug' => $post->slug,
            'is_featured' => (bool) $post->is_featured,
            'main_image' => Image::imageOrUrl($post->main_image_upload, $post->main_image_url),
            'content_blocks' => BlockList::transform($post->content_blocks),
            'footer_blocks' => BlockList::transform($post->footer_blocks),
            'category' => $post->category,
            'published_at' => $post->published_at?->format('M jS, Y'),
        ]);
    }
}
