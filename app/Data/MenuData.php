<?php

namespace App\Policies;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class MenuData extends Data
{
    public function __construct(
        public string $name,

        #[DataCollectionOf(MenuItemData::class)]
        public DataCollection $items,
    ) {
    }
}
