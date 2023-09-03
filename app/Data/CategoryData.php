<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public string $name,
        public string $slug,
        public ?int $id = null,
    ) {
    }
}
