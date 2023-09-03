<?php

namespace App\Data\Blocks;

use Spatie\LaravelData\Data;

class TitleData extends Data
{
    public function __construct(
        public string $text,
        public string $level,
    ) {
    }

    public static function block(array $block): static
    {
        return new static(
            text: (string) ($block['data']['text'] ?? ''),
            level: (string) ($block['data']['level'] ?? 'h2'),
        );
    }
}
