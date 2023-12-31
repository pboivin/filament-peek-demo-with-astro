<?php

namespace App\Data;

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
}
