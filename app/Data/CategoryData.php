<?php

namespace App\Policies;

use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        public int $id,
        public string $name,
        public string $slug,
    ) {
    }
}
