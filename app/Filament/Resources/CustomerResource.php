<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomerResource\Pages;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class CustomerResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Customer::class;

    protected static ?string $navigationIcon = 'heroicon-m-user';
    protected static ?string $navigationGroup = 'Quotation Features';
    protected static ?int $navigationSort = 4;

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
                    TextInput::make('email')
                        ->email()
                        ->required(),
                    TextInput::make('phone')
                        ->label('Phone Number')
                        ->live()
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            return $set("phone", ltrim($state, "0"));
                        })
                        ->prefix('+62'),
                    Textarea::make('address'),
                    Select::make('user_id')
                        ->label('PIC')
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->relationship(name: 'pic', titleAttribute: 'name'),
                    Select::make('company_id')
                        ->label('Perusahaan')
                        ->options(Company::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->relationship(name: 'company', titleAttribute: 'name')
                        ->createOptionForm([
                            Card::make([
                                TextInput::make('name')
                                    ->label('Nama Company')
                                    ->required(),
                                FileUpload::make('logo')
                                    ->image()
                                    ->resize(50)
                                    ->optimize('webp')
                                    ->directory('company_logo'),
                                Textarea::make('description')
                                    ->label('Description')
                                    ->required(),
                                Textarea::make('address')
                                    ->label('Address')
                                    ->required(),
                                TextInput::make('phone')
                                    ->label('Phone Number')
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
                                    ->label('Email Address'),
                                Hidden::make('user_id')
                                    ->default(auth()->user()->id),
                            ])->columns(2)
                        ]),
                ])->columns(2)->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('phone')
                    ->searchable(),
                TextColumn::make('address')
                    ->searchable(),
                TextColumn::make('company.name')
                    ->label('Perusahaan')
                    ->searchable(),
                TextColumn::make('pic.name')
                    ->label('PIC')
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
            'index' => Pages\ListCustomers::route('/'),
            'create' => Pages\CreateCustomer::route('/create'),
            'edit' => Pages\EditCustomer::route('/{record}/edit'),
        ];
    }
}
