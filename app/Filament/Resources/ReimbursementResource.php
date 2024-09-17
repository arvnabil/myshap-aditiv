<?php

namespace App\Filament\Resources;

use App\Enums\StatusReimbursement;
use App\Enums\StatusReimbursementItem;
use App\Filament\Resources\ReimbursementResource\Pages;
use App\Models\Company;
use App\Models\ReimbursementRequest;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReimbursementResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ReimbursementRequest::class;

    protected static ?string $navigationIcon = 'heroicon-m-banknotes';
    protected static ?string $navigationGroup = 'Features';
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
                    Section::make('Form Pengajuan Rembes')
                        ->description('Information about Personal')
                        ->schema([
                    TextInput::make('title')
                        ->label("Nama Pengajuan")
                        ->placeholder('ex: Pengajuan Juli')
                        ->autocapitalize('words')
                        ->required(),
                    DatePicker::make('request_date')
                        ->label('Tanggal Pengajuan')
                        ->readOnly()
                        ->default(now()),
                    TableRepeater::make('reimbursement_items')
                        ->label("Item")
                        ->relationship()
                        ->defaultItems(1)
                        ->live()
                        ->afterStateUpdated(function (Set $set, Get $get) {
                            $items = $get('reimbursement_items');
                            $sum = array_sum(array_column($items, 'amount'));
                            // calculate sum
                            $set('total_amount', $sum);
                        })
                        // ->renderHeader(false)
                        ->headers([
                            Header::make('Tanggal')->width('220px'),
                            Header::make('Deskripsi')->width('200px'),
                            Header::make('Tag PO')->width('200px'),
                            Header::make('Jumlah')->width('250px'),
                            Header::make('Receipt')->width('200px'),
                            Header::make('Company')->width('250px'),
                            Header::make('Status')->width('160px'),
                            Header::make('')->width('0px'),
                        ])
                        ->schema([
                            DatePicker::make('reimbursement_date')
                                ->label('Tanggal')
                                ->required(),
                            TextInput::make('description')
                                ->placeholder('Keterangan')
                                ->autocapitalize('words')
                                ->required(),
                            TextInput::make('tag_po')
                                ->placeholder('ex: Danamon')
                                ->autocapitalize('words')
                                ->required(),
                            TextInput::make('amount')
                                ->prefix("Rp")
                                ->placeholder('0')
                                ->integer()
                                ->required(),
                            FileUpload::make('receipt')
                                ->image()
                                ->resize(50)
                                ->optimize('webp')
                                ->directory('receipt_reimbursement'),
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
                                    ])
                                    ->createOptionUsing(function (array $data, Get $get) {
                                            $cekCompany =  Company::where('name', $data['name'])->first();

                                            if ($cekCompany) {
                                                return $cekCompany->id;
                                            }
                                            $record = \App\Models\Company::create([
                                                'name' => $data['name'],
                                                'logo' => $data['logo'],
                                                'description' => $data['description'],
                                                'address' => $data['address'],
                                                'phone' => $data['phone'],
                                                'email' => $data['email'],
                                                'user_id' => $data['user_id'],
                                            ]);
                                            return $record->getKey(); //like this
                                        }),
                            Select::make('status')
                                ->required()
                                ->default('Pending')
                                ->live()
                                ->label('Status')
                                ->options(StatusReimbursementItem::class)
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        if ($get('status') === "Approved") {
                                            $set('checked_by', auth()->user()->id);
                                        }
                                    }
                                ),
                            Hidden::make('checked_by')
                                ->default(auth()->user()->id)
                        ])
                ->columnSpan('full'),
                    TextInput::make('total_amount')
                            ->prefix('Rp')
                            ->readOnly()
                            ->integer()
                            ->required(),
                    Select::make('reimbursement_status')
                        ->label('Status')
                        ->default('Process')
                        ->live()
                        ->options(StatusReimbursement::class)
                        ->afterStateUpdated(
                            function ($state, callable $get, callable $set) {
                                if ($get('reimbursement_status') === "Done") {
                                    $set('checked_by', auth()->user()->id);
                                }
                            }
                        ),
                    Group::make()
                        ->schema([
                            Hidden::make('user_id')
                                ->default(auth()->user()->id),
                        ])->hidden(fn (string $operation): bool => $operation === 'edit'),
                    Group::make()
                        ->schema([
                            Hidden::make('checked_by')
                                ->default(auth()->user()->id),
                        ])->hidden(fn (string $operation): bool => $operation === 'create'),
                ])->columns(2)->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->wrap()
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('request_date')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Request by')
                    ->searchable(),
                TextColumn::make('user_checked_by.name')
                    ->default('-')
                    ->label('Check by')
                    ->searchable(),
                TextColumn::make('total_amount')
                    ->money('idr')
                    ->searchable(),
                IconColumn::make('reimbursement_status')
                    ->label('Status')
                    ->icon(fn (string $state): string => match ($state) {
                        'Process' => 'heroicon-m-clock',
                        'Done' => 'heroicon-m-check-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'Process' => 'warning',
                        'Done' => 'info',
                        default => 'gray',
                    })
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
            'index' => Pages\ListReimbursements::route('/'),
            'create' => Pages\CreateReimbursement::route('/create'),
            'edit' => Pages\EditReimbursement::route('/{record}/edit'),
        ];
    }
}
