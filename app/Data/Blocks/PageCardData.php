<?php

namespace App\Data\Blocks;

use App\Data\PageReferenceData;
use App\Models\Page;
use Spatie\LaravelData\Data;

class PageCardData extends Data
{
    public function __construct(
        public string $text,
        public ?array $page = null,
    ) {
    }

    public static function fromArray(array $block): static
    {
        $page = Page::find($block['data']['page_id'] ?? 0);

        $pageData = $page ? PageReferenceData::from($page)->toArray() : null;

        return new static(
            text: (string) ($block['data']['text'] ?? ''),
            page: $pageData,
        );
    }
}
