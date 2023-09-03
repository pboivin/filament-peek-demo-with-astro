<?php

namespace App\Data\Blocks;

use App\Helpers\Image;
use Spatie\LaravelData\Data;

class ImageData extends Data
{
    public function __construct(
        public string $image,
        public string $ratio,
        public string $alt = '',
        public string $caption = '',
    ) {
    }

    public static function fromArray(array $block): static
    {
        return new static(
            image: Image::imageOrUrl($block['data']['image'] ?? '', $block['data']['url'] ?? ''),
            ratio: $block['data']['ratio'] ?? '4-3',
            alt: $block['data']['alt'] ?? '',
            caption: $block['data']['caption'] ?? '',
        );
    }
}
