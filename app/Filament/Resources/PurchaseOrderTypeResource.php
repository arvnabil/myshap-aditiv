<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseOrderTypeResource\Pages;
use App\Filament\Resources\PurchaseOrderTypeResource\RelationManagers;
use App\Models\PurchaseOrderType;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PurchaseOrderTypeResource extends Resource
{
    protected static ?string $model = PurchaseOrderType::class;

    protected static ?string $navigationIcon = 'heroicon-m-tag';
    protected static ?string $navigationGroup = 'Features';
    protected static ?int $navigationSort = 6;

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
                Card::make([
                    TextInput::make('company_alias')
                        ->label(__('Alias'))
                        ->required(),
                    TextInput::make('company_name')
                        ->label(__('Company'))
                        ->required(),
                    FileUpload::make('logo')
                        ->label(__('Logo'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->required()
                        ->directory('company_po'),
                    Textarea::make('company_address')
                        ->label(__('Company Address'))
                        ->required(),
                    TextInput::make('npwp_number')
                        ->label(__('NPWP Number'))
                        ->required(),
                    TextInput::make('company_phone')
                        ->label(__('Company Phone'))
                        ->live()
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            return $set("company_phone", ltrim($state, "0"));
                        })
                        ->prefix('+62')
                        ->nullable(),
                    TextInput::make('company_email')
                        ->nullable()
                        ->email()
                        ->label(__('Email Address')),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')->circular()->extraImgAttributes(['img_preview']),
                TextColumn::make('company_alias')
                    ->label('Alias')
                    ->searchable(),
                TextColumn::make('company_name')
                    ->label('Company')
                    ->searchable(),
                TextColumn::make('company_address')
                    ->label('Alamat')
                    ->words(5),
                TextColumn::make('company_phone')
                    ->label('Phone')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('npwp_number')
                    ->label('NPWP')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('company_email')
                    ->label('Email')
                    ->default('-')
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
            'index' => Pages\ListPurchaseOrderTypes::route('/'),
            'create' => Pages\CreatePurchaseOrderType::route('/create'),
            'edit' => Pages\EditPurchaseOrderType::route('/{record}/edit'),
        ];
    }
}
