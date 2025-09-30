<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\TemplatesnkResource\Pages;
use App\Filament\App\Resources\TemplatesnkResource\RelationManagers;
use App\Models\Templatesnk;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TemplatesnkResource extends Resource
{
    protected static ?string $model = Templatesnk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Data Master';
    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return __('Template SNK');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->required()
                ->maxLength(255),
                TableRepeater::make('description')
                    ->label("Deskripsi")
                        ->defaultItems(1)
                        // ->renderHeader(false)
                        ->headers([
                            Header::make('point')->width('220px')->markAsRequired(),
                        ])
                        ->schema([
                            TextInput::make('point')
                            ->placeholder('Point')
                            ->autocapitalize('words')
                            ->required()
                        ])
                        ->columnSpan('full'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListTemplatesnks::route('/'),
            'create' => Pages\CreateTemplatesnk::route('/create'),
            'edit' => Pages\EditTemplatesnk::route('/{record}/edit'),
        ];
    }
}
