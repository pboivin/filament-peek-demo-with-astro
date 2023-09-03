<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Image
{
    public static function imageOrUrl(?string $image, ?string $url): string
    {
        if ($image) {
            return Storage::disk('public')->url($image);
        }

        return $url ?: '';
    }
}
