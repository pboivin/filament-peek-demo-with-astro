<?php

namespace App\Data;

use Illuminate\Support\Str;

class BlockList
{
    public static function transform(array $data): array
    {
        return collect($data)
            ->map(function ($block) {
                $dataClass = '\\App\\Data\\Blocks\\' . Str::studly($block['type']) . 'Data';

                $block['data'] = $dataClass::block($block);

                return $block;
            })
            ->toArray();
    }
}
