<?php

namespace App\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class PageData extends Data
{
    public function __construct(
        public int $id,
        public string $title,
        public string $slug,
        public string $content,
    ) {
    }

    public function toListItem(): array
    {
        return Arr::except($this->toArray(), ['content']);
    }
}
