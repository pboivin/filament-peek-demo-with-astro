<?php

namespace App\Data;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class BlockData extends Data
{
    public function __construct(
        public string $type,
        public array $data,
    ) {
    }

    public static function fromArray(array $block): static
    {
        $dataClass = '\\App\\Data\\Blocks\\' . Str::studly($block['type']) . 'Data';

        return new static(
            type: $block['type'],
            data: $dataClass::from($block)->toArray(),
        );
    }
}
