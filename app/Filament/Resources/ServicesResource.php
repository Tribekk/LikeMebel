<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServicesResource\Pages;
use App\Filament\Resources\ServicesResource\RelationManagers;
use App\Models\Service;
use App\Models\Services;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicesResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static ?string $pluralModelLabel = 'Продукция';

    protected static ?string $label = 'продукта';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Данные продукта')->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Заголовок')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->label('Название в списке'),
                        Forms\Components\MarkdownEditor::make('description')
                            ->label('Описание')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->Live(true),
                        Forms\Components\TextInput::make('price')
                            ->type('number')
                            ->required()
                            ->label('Цена'),
                    ]),
                ]),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Загрузите фотографию')->schema([
                        Forms\Components\FileUpload::make('photo')
                            ->label('Главное фото')
                            ->required()
                            ->preserveFilenames()
                            ->image()
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
                Tables\Columns\TextColumn::make('title')
                    ->label('Заголовок'),
                Tables\Columns\TextColumn::make('name')
                    ->label('Название в списке'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Описание')
                    ->words(5),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена Р.')
                    ->words(5),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Созданно')
                    ->date()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Обновленно')
                    ->date()
                    ->sortable()
                    ->toggleable()
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateServices::route('/create'),
            'edit' => Pages\EditServices::route('/{record}/edit'),
        ];
    }
}
