<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoForNewsResource\Pages;
use App\Filament\Resources\PhotoForNewsResource\RelationManagers;
use App\Models\News;
use App\Models\PhotoForNews;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoForNewsResource extends Resource
{
    protected static ?string $model = PhotoForNews::class;

    protected static ?string $label = 'Фотографии для новостей';

    protected static ?string $pluralModelLabel = 'Фотографии для новостей';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Select::make('news_id')
                        ->label('Новость')
                        ->required()
                        ->options(News::all()->pluck('title', 'id'))
                        ->searchable()
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Загрузите фотографию')->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Главное фото')
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
                Tables\Columns\TextColumn::make('news.title')
                    ->label('Запись')
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
            'index' => Pages\ListPhotoForNews::route('/'),
            'create' => Pages\CreatePhotoForNews::route('/create'),
            'edit' => Pages\EditPhotoForNews::route('/{record}/edit'),
        ];
    }
}
