<?php

namespace App\Filament\Resources\PhotoForNewsResource\Pages;

use App\Filament\Resources\PhotoForNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhotoForNews extends ListRecords
{
    protected static string $resource = PhotoForNewsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
