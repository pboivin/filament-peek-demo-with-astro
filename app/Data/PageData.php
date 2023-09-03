<?php

namespace App\Policies;

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
}
