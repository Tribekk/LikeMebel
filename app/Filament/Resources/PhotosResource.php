<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotosResource\Pages;
use App\Filament\Resources\PhotosResource\RelationManagers;
use App\Models\Photo;
use App\Models\Photos;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotosResource extends Resource
{
    protected static ?string $model = Photo::class;

    protected static ?string $label = 'Фотографии главной страницы';

    protected static ?string $pluralModelLabel = 'Фотографии главной страницы';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\TextInput::make('description')
                        ->label('Описание')
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Загрузите фотографию')->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Фото')
                            ->required()
                            ->preserveFilenames()
                            ->imageEditor()
                    ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Фотография'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание')
                    ->sortable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPhotos::route('/'),
            'create' => Pages\CreatePhotos::route('/create'),
            'edit' => Pages\EditPhotos::route('/{record}/edit'),
        ];
    }
}
