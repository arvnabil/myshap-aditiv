<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\CompanyResource\Pages;
use App\Models\Company;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
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
use stdClass;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Model;

class CompanyResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Company::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $activeNavigationIcon = 'heroicon-m-building-office-2';
    protected static ?string $navigationGroup = 'Menu';
    protected static ?int $navigationSort = 4;

    // public static function getNavigationBadgeTooltip(): ?string
    // {
    //     return __('menu.counting_badge_request');
    // }

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

    public static function getNavigationLabel(): string
    {
        return __('menu.companies.manage_company');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count() > 0 ? 'primary' : 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('name')
                        ->label(__('menu.companies.field.name'))
                        ->required(),
                    FileUpload::make('logo')
                        ->label(__('menu.companies.field.logo'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->directory('company_logo'),
                    Textarea::make('description')
                        ->label(__('menu.companies.field.description'))
                        ->required(),
                    Textarea::make('address')
                        ->label(__('menu.companies.field.address'))
                        ->required(),
                    TextInput::make('phone')
                        ->label(__('menu.companies.field.phone'))
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
                        ->label(__('menu.companies.field.email')),
                    Hidden::make('user_id')
                        ->default(auth()->user()->id),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->state(
                    static function (HasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                ImageColumn::make('logo')->circular()->extraImgAttributes(['img_preview']),
                TextColumn::make('name')
                    ->label('Company')
                    ->searchable(),
                TextColumn::make('description')
                    ->label('Deskripsi'),
                TextColumn::make('address')
                    ->label('Alamat')
                    ->words(5),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('PIC')
                    ->default('-')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make()
            ->label("")
            ->icon(""),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ])
            ->recordUrl(
                fn (Model $record) => null,
            );
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
            'index' => Pages\ListCompanies::route('/'),
            // 'create' => Pages\CreateCompany::route('/create'),
            // 'edit' => Pages\EditCompany::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->orderBy('created_at', 'DESC');
    }
}
