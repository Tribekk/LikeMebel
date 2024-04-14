<?php

namespace App\Filament\Resources\PhotoForNewsResource\Pages;

use App\Filament\Resources\PhotoForNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPhotoForNews extends EditRecord
{
    protected static string $resource = PhotoForNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
