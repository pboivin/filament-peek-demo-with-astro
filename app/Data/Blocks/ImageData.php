<?php

namespace App\Data\Blocks;

use App\Helpers\Image;

class ImageData
{
    public function __construct(
        public string $image,
        public string $ratio,
        public string $alt = '',
        public string $caption = '',
    ) {
    }

    public static function block(array $block): static
    {
        return new static(
            image: Image::imageOrUrl($block['data']['image'] ?? '', $block['data']['url'] ?? ''),
            ratio: $block['data']['ratio'] ?? '4-3',
            alt: $block['data']['alt'] ?? '',
            caption: $block['data']['caption'] ?? '',
        );
    }
}
