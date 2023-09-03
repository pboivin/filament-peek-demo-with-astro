<?php

namespace App\Data\Blocks;

use Spatie\LaravelData\Data;

class ParagraphData extends Data
{
    public function __construct(
        public string $text,
    ) {
    }

    public static function fromArray(array $block): static
    {
        return new static(
            text: (string) ($block['data']['text'] ?? ''),
        );
    }
}
