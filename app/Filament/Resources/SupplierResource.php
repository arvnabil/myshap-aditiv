<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
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

class SupplierResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Supplier::class;

    protected static ?string $navigationIcon = 'heroicon-m-building-storefront';
    protected static ?string $navigationGroup = 'Features';
    protected static ?int $navigationSort = 5;

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
                    TextInput::make('name')
                        ->label(__('Nama Supplier'))
                        ->required(),
                    FileUpload::make('logo')
                        ->label(__('Logo'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->directory('supplier_logo'),
                    Textarea::make('address')
                        ->label(__('Alamat Supplier'))
                        ->required(),
                    TextInput::make('phone')
                        ->label(__('Phone'))
                        ->live()
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            return $set("phone", ltrim($state, "0"));
                        })
                        ->prefix('+62')
                        ->nullable(),
                    TextInput::make('email')
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
                TextColumn::make('name')
                    ->label('Supplier')
                    ->searchable(),
                TextColumn::make('address')
                    ->label('Alamat')
                    ->words(5),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('email')
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}
