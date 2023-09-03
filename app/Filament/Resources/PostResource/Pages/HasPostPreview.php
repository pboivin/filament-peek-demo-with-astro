<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Data\PostData;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Pboivin\FilamentPeek\Pages\Concerns\HasPreviewModal;

trait HasPostPreview
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
        return 'post';
    }

    protected function mutatePreviewModalData(array $data): array
    {
        if ($data['post']->category_id) {
            $data['post']->loadMissing('category');
        }

        $data['post'] = PostData::from($data['post']);

        return $data;
    }

    protected function getPreviewModalUrl(): ?string
    {
        $postId = $this->previewModalData['post']->id ?: uniqid();
        $userId = auth()->user()->id;
        $token = md5("post-{$postId}-{$userId}");

        cache()->put("preview-{$token}", $this->previewModalData, 5 * 60);

        return config('app.front_url') . "/preview/post/?token={$token}";
    }
}
