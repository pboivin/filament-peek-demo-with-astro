<?php

namespace App\Policies;

use Spatie\LaravelData\Data;

class PostData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $published_at,
        public string $main_image,
        public bool $is_featured,

        // wip
        public array $content_blocks,
        public array $footer_blocks,

        public CategoryData $category,
    ) {
    }
}
