<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\ReimbursementResource\Pages;
use App\Models\Company;
use App\Models\ReimbursementRequest;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ReimbursementResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = ReimbursementRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';
    protected static ?string $activeNavigationIcon = 'heroicon-m-banknotes';
    protected static ?string $navigationGroup = 'Menu';
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

    public static function getNavigationBadgeTooltip(): ?string
    {
        return __('menu.counting_badge_request');
    }

    public static function getNavigationLabel(): string
    {
        return __('menu.reimbursements.manage_reimbursement');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('reimbursement_status', 'Process')->where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('reimbursement_status', 'Process')->where('user_id', auth()->user()->id)->count() > 0 ? 'warning' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.reimbursements.section_form'))
                ->description(__('menu.reimbursements.sub_section_form'))
                ->schema([
                    TextInput::make('title')
                        ->label(__('menu.reimbursements.field.title'))
                        ->placeholder('ex: Pengajuan Juli')
                        ->autocapitalize('words')
                        ->readOnly(fn (callable $get): bool => $get('reimbursement_status') === "Done")
                        ->required(),
                    DatePicker::make('request_date')
                        ->label(__('menu.reimbursements.field.request_date'))
                        ->readOnly()
                        ->default(now()),
                    TableRepeater::make('reimbursement_items')
                        ->label(__('menu.reimbursements.field.reimbursement_items'))
                        ->relationship()
                        ->required()
                        ->defaultItems(1)
                        ->live()
                        ->deletable(fn (callable $get): bool => $get('reimbursement_status') === "Done"? false:true)
                        ->afterStateUpdated(function (Set $set, Get $get) {
                            $items = $get('reimbursement_items');
                            $sum = array_sum(array_column($items, 'amount'));
                            // calculate sum
                            $set('total_amount', $sum);
                        })
                        // ->renderHeader(false)
                        ->headers([
                            Header::make(__('menu.reimbursements.field.date'))->width('220px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.reimbursements.field.description'))->width('200px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.reimbursements.field.tag'))->width('200px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.reimbursements.field.amount'))->width('250px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.reimbursements.field.receipt'))->width('200px')->align(Alignment::Center),
                            Header::make(__('menu.reimbursements.field.company'))->width('250px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__(''))->width('0')->align(Alignment::Center),
                            Header::make('')->width('0px'),
                        ])
                        ->schema([
                            DatePicker::make('reimbursement_date')
                                ->readOnly(fn (callable $get): bool => $get('reimbursement_status') === "Done")
                                ->required(),
                            TextInput::make('description')
                                ->autocapitalize('words')
                                ->readOnly(fn (callable $get): bool => $get('reimbursement_status') === "Done")
                                ->required(),
                            TextInput::make('tag_po')
                                ->placeholder('ex: Danamon')
                                ->autocapitalize('words')
                                ->readOnly(fn (callable $get): bool => $get('reimbursement_status') === "Done")
                                ->required(),
                            TextInput::make('amount')
                                ->prefix("Rp")
                                ->placeholder('0')
                                ->integer()
                                ->readOnly(fn (callable $get): bool => $get('reimbursement_status') === "Done")
                                ->required(),
                            FileUpload::make('receipt')
                                ->image()
                                ->resize(50)
                                ->optimize('webp')
                                ->directory('receipt_reimbursement'),
                            Select::make('company_id')
                                ->options(Company::all()->pluck('name', 'id'))
                                ->searchable()
                                ->required()
                                ->relationship(name: 'company', titleAttribute: 'name')
                                ->createOptionForm([
                                    Card::make([
                                        TextInput::make('name')
                                            ->label(__('menu.companies.field.name'))
                                            ->required(),
                                        // FileUpload::make('logo')
                                        //     ->label(__('menu.companies.field.logo'))
                                        //     ->image()
                                        //     ->resize(50)
                                        //     ->optimize('webp')
                                        //     ->directory('company_logo'),
                                        // Textarea::make('description')
                                        // ->label(__('menu.companies.field.description'))
                                        // ->required(),
                                        // Textarea::make('address')
                                        // ->label(__('menu.companies.field.address'))
                                        // ->required(),
                                        // TextInput::make('phone')
                                        //     ->label(__('menu.companies.field.phone'))
                                        //     ->live()
                                        //     ->reactive()
                                        //     ->afterStateUpdated(function (Set $set, ?string $state) {
                                        //         return $set("phone", ltrim($state, "0"));
                                        //     })
                                        //     ->prefix('+62')
                                        //     ->nullable(),
                                        // TextInput::make('email')
                                        //     ->nullable()
                                        //     ->email()
                                        //     ->label(__('menu.companies.field.email')),
                                        Hidden::make('user_id')
                                            ->default(auth()->user()->id),
                                    ])->columns(2)
                                ]),
                            Hidden::make('status')
                                ->default('Pending')

                        ])
                        ->columnSpan('full'),
                    TextInput::make('total_amount')
                        ->label(__('menu.reimbursements.field.total_amount'))
                        ->prefix('Rp')
                        ->readOnly()
                        ->integer()
                        ->required(),
                    Hidden::make('reimbursement_status')
                        ->label(__('menu.reimbursements.field.status_process'))
                        ->default('Process'),
                    Hidden::make('user_id')
                        ->default(auth()->user()->id),
                ])->columns(2)->collapsible(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('menu.reimbursements.field.reimbursement_id'))
                    ->searchable()
                    ->wrap(),
                TextColumn::make('title')
                    ->label(__('menu.reimbursements.field.title'))
                    ->searchable(),
                TextColumn::make('request_date')
                    ->label(__('menu.reimbursements.field.request_date'))
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label(__('menu.reimbursements.field.request_by')),
                TextColumn::make('user_checked_by  .name')
                    ->default('-')
                    ->label(__('menu.reimbursements.field.checked_by')),
                TextColumn::make('total_amount')
                    ->label(__('menu.reimbursements.field.total_amount'))
                    ->money('idr'),
                TextColumn::make('reimbursement_status')
                    ->label(__('menu.reimbursements.field.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Process' => 'warning',
                        'Done' => 'info',
                        default => 'gray',
                    })
                    ->searchable(),
                    TextColumn::make('created_at')
                        ->date()
                        ->label(__('menu.reimbursements.field.created_at'))
                        ->toggleable(isToggledHiddenByDefault: true),
                    TextColumn::make('updated_at')
                        ->date()
                        ->label(__('menu.reimbursements.field.updated_at'))
                        ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('reimbursement_status')
                ->options([
                    'Process' => 'Process',
                    'Done' => 'Done',
                ]),
            ])
            ->actions([
                // Action::make('reportReimbursementRequest')
                // ->label('Download Pdf')
                //     ->color('warning')
                //     ->icon('heroicon-m-arrow-top-right-on-square')
                //     ->url(fn (ReimbursementRequest $record): string => route('reports.reimbursement.download', $record))
                //     ->openUrlInNewTab(),
                Tables\Actions\ViewAction::make()
                    ->label(__('default.view_detail'))
                    ->url(fn (ReimbursementRequest $record): string => route('reports.reimbursement.view', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
                    ->hidden(fn (ReimbursementRequest $record): string => $record->reimbursement_status === 'Done' ?? true)
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

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->orderBy('created_at', 'DESC');
    }
}
