<?php

namespace App\Policies;

use Spatie\LaravelData\Data;

class MenuItemData extends Data
{
    public function __construct(
        public string $title,
        public string $url,
        public string $type,
    ) {
    }
}
