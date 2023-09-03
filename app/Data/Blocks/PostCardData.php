<?php

namespace App\Data\Blocks;

use App\Data\PostReferenceData;
use App\Models\Post;
use Spatie\LaravelData\Data;

class PostCardData extends Data
{
    public function __construct(
        public string $text,
        public ?array $post = null,
    ) {
    }

    public static function block(array $block): static
    {
        $post = Post::find($block['data']['post_id'] ?? 0);

        $postData = $post ? PostReferenceData::from($post)->toArray() : null;

        return new static(
            text: (string) ($block['data']['text'] ?? ''),
            post: $postData,
        );
    }
}
