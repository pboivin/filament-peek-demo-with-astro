<?php

namespace App\Data;

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
