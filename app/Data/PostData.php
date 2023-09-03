<?php

namespace App\Data;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public bool $is_featured,
        public string $main_image,

        // @todo: add block DTOs
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
            'main_image' => static::getMainImage($post),
            'content_blocks' => $post->content_blocks,
            'footer_blocks' => $post->footer_blocks,
            'category' => $post->category,
            'published_at' => $post->published_at?->format('M jS, Y'),
        ]);
    }

    public static function getMainImage(Post $post): string
    {
        if ($post->main_image_upload) {
            return Storage::disk('public')->url($post->main_image_upload);
        }

        return $post->main_image_url ?: '';
    }

    public function toListItem(): array
    {
        return Arr::except($this->toArray(), [
            'content_blocks',
            'footer_blocks',
        ]);
    }
}
