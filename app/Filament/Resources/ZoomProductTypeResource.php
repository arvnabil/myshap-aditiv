<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ZoomProductTypeResource\Pages;
use App\Models\ZoomProductType;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ZoomProductTypeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ZoomProductType::class;

    protected static ?string $navigationIcon = 'heroicon-m-tag';
    protected static ?string $navigationGroup = 'Zoom Account Customer';
    protected static ?int $navigationSort = 3;

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                 Section::make(__('menu.leaves.section_form'))
                ->description(__('menu.leaves.sub_section_form'))
                ->schema([
                    TextInput::make('name')
                        ->autocapitalize('words')
                        ->required(),
                    Textarea::make('alias'),
                    Textarea::make('description'),
                    TextInput::make('code'),
                    FileUpload::make('logo')
                        ->label(__('menu.companies.field.logo'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->directory('zoom_product_type'),
                ])->columns(2)->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->circular()->extraImgAttributes(['img_preview']),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('alias')
                    ->searchable(),
                TextColumn::make('description')
                    ->searchable(),
                TextColumn::make('code')
                    ->searchable(),
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
            'index' => Pages\ListZoomProductTypes::route('/'),
            'create' => Pages\CreateZoomProductType::route('/create'),
            'edit' => Pages\EditZoomProductType::route('/{record}/edit'),
        ];
    }
}
