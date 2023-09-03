<?php

namespace App\Data;

use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

class PageData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public string $content,
        public ?int $id = null,
    ) {
    }

    public function toListItem(): array
    {
        return Arr::except($this->toArray(), ['content']);
    }
}
