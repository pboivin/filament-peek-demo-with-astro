<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Data\PageData;
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

    protected function mutatePreviewModalData(array $data): array
    {
        $data['page'] = PageData::from($data['page']);

        return $data;
    }

    protected function getPreviewModalUrl(): ?string
    {
        $pageId = $this->previewModalData['page']->id ?: uniqid();
        $userId = auth()->user()->id;
        $token = md5("page-{$pageId}-{$userId}");

        cache()->put("preview-{$token}", $this->previewModalData, 5 * 60);

        return config('app.front_url') . "/preview/page/?token={$token}";
    }
}
