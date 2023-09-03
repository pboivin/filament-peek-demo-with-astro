<?php

namespace App\Data;

use App\Helpers\Image;
use App\Models\Post;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\DataCollection;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public bool $is_featured,
        public string $main_image,
        public CategoryData $category,

        #[DataCollectionOf(BlockData::class)]
        public DataCollection $content_blocks,

        #[DataCollectionOf(BlockData::class)]
        public DataCollection $footer_blocks,

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
            'content_blocks' => $post->content_blocks,
            'footer_blocks' => $post->footer_blocks,
            'category' => $post->category,
            'published_at' => $post->published_at?->format('M jS, Y'),
        ]);
    }
}
