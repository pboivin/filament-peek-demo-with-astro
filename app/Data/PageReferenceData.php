<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class PageReferenceData extends Data
{
    public function __construct(
        public string $title,
        public string $slug,
        public ?int $id = null,
    ) {
    }
}
