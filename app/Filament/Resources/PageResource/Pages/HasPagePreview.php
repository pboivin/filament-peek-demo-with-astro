<?php

namespace App\Filament\Resources\PageResource\Pages;

use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPagePreview
{
    use HasPreviewModal;

    protected function getActions(): array
    {
        return [
            PreviewAction::make()->label('Preview Changes'),
        ];
    }

    protected function getPreviewModalDataRecordKey(): ?string
    {
        return 'page';
    }

    protected function getPreviewModalUrl(): ?string
    {
        $pageId = $this->previewModalData['page']->id ?: uniqid();
        $userId = auth()->user()->id;
        $token = md5("page-{$pageId}-{$userId}");

        cache()->put("preview-{$token}", $this->previewModalData, 5 * 60);

        // return config('app.url') . "/preview/?token={$token}";

        return config('app.front_url') . "/page-preview/?token={$token}";
    }
}
