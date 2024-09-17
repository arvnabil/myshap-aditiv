<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ZoomSubAccountResource\Pages;
use App\Models\Company;
use App\Models\Customer;
use App\Models\User;
use App\Models\ZoomProductType;
use App\Models\ZoomSubAccount;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ZoomSubAccountResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ZoomSubAccount::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $activeNavigationIcon = 'heroicon-m-rectangle-group';
    protected static ?string $navigationGroup = 'Zoom Account Customer';
    protected static ?int $navigationSort = 1;

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
                    Select::make('product_type_id')
                    ->live()
                        ->label('Product')
                        ->options(ZoomProductType::all()->pluck('name', 'id'))
                        ->required()
                        ->relationship(name: 'zoom_product_type', titleAttribute: 'name'),
                    TextInput::make('account_name')
                    ->autocapitalize('words')
                        ->label('Nama PO/Perusahaan')
                        ->required(),
                    TextInput::make('account_owner')
                    ->label('Email Owner')
                    ->email()
                        ->required(),
                    TextInput::make('account_number')
                    ->label('Account Number')
                    ->nullable(),
                    TextInput::make('total_license')
                    ->label('Seat/License')
                    ->nullable(),
                    TextInput::make('activ_email')
                    ->label('ACTiV Email')
                    ->nullable(),
                    DatePicker::make('start_date')
                    ->label('Start Effective')
                    ->nullable(),
                    DatePicker::make('end_date')
                    ->label('End date')
                    ->nullable(),
                    TextInput::make('dealreg_id')
                    ->label('ID Dealreg')
                    ->nullable(),
                    TextInput::make('dealreg_info')
                    ->label('Dealreg Info')
                    ->nullable(),
                    Toggle::make('is_active')
                    ->label('Active'),

                    TableRepeater::make('zoom_item_sub_account_items')
                    ->label("")
                        ->relationship()
                        ->defaultItems(0)
                        ->nullable()
                        ->live()
                        ->headers([
                            // Header::make('Tipe')->width('220px'),
                            Header::make('Account Type')->width('255px'),
                            Header::make('Customer')->width('285px'),
                            Header::make('Mulai')->width('200px'),
                            Header::make('Sampai')->width('200px'),
                            Header::make('Role')->width('160px'),
                            Header::make('Status License')->width('160px'),
                            Header::make('Keterangan')->width('250px'),
                            Header::make('Status')->width('160px'),
                            Header::make('Backup?')->width('160px'),
                            Header::make('')->width('0px'),
                        ])
                        ->schema([
                            Select::make('account_type')
                            ->searchable()
                                ->options(ZoomProductType::all()->pluck('alias', 'alias')),
                            Select::make('customer_id')
                            ->options(Customer::all()->pluck('name', 'id'))
                            ->searchable()
                                // ->nullable()
                                ->createOptionForm([
                                    Card::make([
                                        TextInput::make('name')
                                            ->autocapitalize('words')
                                            ->required(),
                                        TextInput::make('email')
                                            ->email()
                                            ->unique(ignoreRecord: true)
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
                                            ->required(),
                                        Select::make('company_id')
                                        ->label('Perusahaan')
                                        ->options(Company::all()->pluck('name', 'id'))
                                        ->searchable()
                                            ->required()
                                            ->createOptionForm([
                                                Card::make([
                                                    TextInput::make('name')
                                                        ->label('Nama Company')
                                                        ->required(),
                                                    Select::make('user_id')
                                                    ->label('PIC')
                                                        ->options(User::all()->pluck('name', 'id'))
                                                        ->searchable()
                                                        ->required(),
                                                    // Hidden::make('user_id')
                                                    //     ->default(auth()->user()->id),
                                                ])->columns(2)
                                            ])
                                            ->createOptionUsing(function (array $data, Get $get) {
                                                $cekCompany =  Company::where('name', $data['name'])->first();

                                                if ($cekCompany) {
                                                    return $cekCompany->id;
                                                }
                                                $record = \App\Models\Company::create([
                                                    'name' => $data['name'],
                                                    'user_id' => $data['user_id'],
                                                ]);
                                                return $record->getKey(); //like this
                                            })
                                    ])
                                ])->createOptionUsing(function (array $data, Get $get) {
                                    $cekEmail = Customer::where('email', $data['email'])->first();
                                    if ($cekEmail) {
                                        return $cekEmail->id;
                                    }
                                    $record = \App\Models\Customer::create([
                                        'name' => $data['name'],
                                        'email' => $data['email'],
                                        'phone' => $data['phone'],
                                        'email' => $data['email'],
                                        'address' => $data['address'],
                                        'user_id' => $data['user_id'],
                                        'company_id' => $data['company_id'],
                                    ]);
                                    return (string) $record->getKey(); //like this
                                })
                                ->afterStateUpdated(function ($state, Set $set, Get $get) {
                                    $customer = Customer::where('id', $state)->first();
                                    $set('email', $customer->email ?? null);
                                }),
                            DatePicker::make('start_date')
                            ->nullable(),
                            DatePicker::make('end_date')
                            ->nullable(),
                            Select::make('role')
                                ->required()
                                ->default('Member')
                                ->options([
                                    'Member' => 'Member',
                                    'Admin' => 'Admin',
                                    'Owner' => 'Owner',
                                ]),
                            Select::make('type')
                                ->required()
                                ->default('Basic')
                                ->options([
                                    'Basic' => 'Basic',
                                    'Licensed' => 'Licensed',
                                ]),
                            Hidden::make('email')
                                ->nullable(),
                            Textarea::make('notes')
                                ->placeholder('Note')
                                ->nullable(),
                            Select::make('status')
                                ->required()
                                ->default('Available')
                                ->live()
                                ->label('Status')
                                ->options([
                                    'Active' => 'Active',
                                    'Pending' => 'Pending',
                                    'Available' => 'Available',
                                ])
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        if ($get('status') === "Approved") {
                                            $set('checked_by', auth()->user()->id);
                                        }
                                    }
                                ),
                            Toggle::make('is_backup'),
                        ])
                        ->columnSpan('full'),
                ])->columns(2)->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable(),
                TextColumn::make('account_name')
                    ->searchable(),
                TextColumn::make('account_owner')
                    ->searchable(),
                TextColumn::make('account_number')
                    ->searchable(),
                TextColumn::make('total_license')
                    ->label('Seat/License')
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label('Start')
                    ->searchable(),
                TextColumn::make('end_date')
                    ->label('End')
                    ->searchable(),
                TextColumn::make('zoom_product_type.alias')
                ->label('Product Type')
                    ->searchable(),
                TextColumn::make('activ_email')
                    ->label('ACTiV Email')
                    ->searchable(),
                TextColumn::make('dealreg_id')
                    ->label('ID Dealreg')
                    ->searchable(),
                TextColumn::make('dealreg_info')
                    ->label('Dealreg Info')
                    ->searchable(),
                ToggleColumn::make('is_active')
                    ->label('Active')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListZoomSubAccounts::route('/'),
            // 'create' => Pages\CreateZoomSubAccount::route('/create'),
            // 'edit' => Pages\EditZoomSubAccount::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('start_date', 'DESC');
    }
}
