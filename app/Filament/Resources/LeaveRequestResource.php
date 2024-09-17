<?php

namespace App\Filament\Resources;

use App\Enums\StatusLeave;
use App\Filament\Resources\LeaveRequestResource\Pages;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use DateTime;
use DateTimeZone;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Model;

class LeaveRequestResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = LeaveRequest::class;

    protected static ?string $navigationIcon = 'heroicon-m-rocket-launch';
    protected static ?string $navigationGroup = 'Features';
    protected static ?int $navigationSort = 2;

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
        return __('menu.leaves.manage_leave');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.leaves.section_form'))
                ->description(__('menu.leaves.sub_section_form'))
                ->schema([
                    Group::make()
                        ->schema([
                            Hidden::make('year'),
                            Hidden::make('status')->default('Pending'),
                            Hidden::make('user_id')
                            ->default(auth()->user()->id),
                            Select::make('leave_type_id')
                            ->label(__('menu.leaves.field.leave_type'))
                            ->options(function (): array {
                                return LeaveType::all()->pluck('full_name', 'id')->all();
                            })
                            ->default('Pending')
                            // ->visible(fn (): bool => auth()->user()->name == "Super Root")
                            ->required(),
                    ])->hidden(fn (string $operation): bool => $operation === 'edit'),
                    Group::make()
                        ->schema([
                            Select::make('leave_type_id')
                                ->label(__('menu.leaves.field.leave_type'))
                                ->options(function (): array {
                                    return LeaveType::all()->pluck('full_name', 'id')->all();
                                })
                                ->live()
                                ->default('Pending')
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                // ->visible(fn (): bool => auth()->user()->name == "Super Root")
                                ->required()
                                ->afterStateUpdated(fn ($state, callable $set): bool => $set('leave_type_id', $state)),
                            Select::make('status')
                                ->label('Status')
                                ->live()
                                ->options(StatusLeave::class)
                                ->default('Pending')
                                // ->visible(fn (): bool => auth()->user()->name == "Super Root")
                                ->required()
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        if ($get('status') === "Approved" || $get('status') === "Rejected") {
                                            $now = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                                            // dd($now->format('d/m/Y'));
                                            $set('approved_at', $now->format('Y-m-d'));
                                            $set('checked_by', auth()->user()->id);
                                            $set('status', $state);
                                        }
                                    }
                                ),
                            Hidden::make('leave_type_id'),
                            Hidden::make('status'),
                            Hidden::make('approved_at')
                                ->nullable(),
                            Hidden::make('checked_by')
                    ])->hidden(fn (string $operation): bool => $operation === 'create')->columns(2),
                    DatePicker::make('start_date')
                        ->label(__('menu.leaves.field.start_date'))
                        ->live()
                        ->readOnly(fn (callable $get): bool => $get('status') === "Approved")
                        ->required(),
                    DatePicker::make('end_date')
                        ->label(__('menu.leaves.field.end_date'))
                        ->live()
                        ->required()
                        ->readOnly(fn (callable $get): bool => $get('status') === "Approved")
                        ->disabled(fn (callable $get): bool => $get('start_date') ? false : true)
                        ->afterStateUpdated(
                            function ($state, callable $get, callable $set) {
                                // Set value year
                                $set('year', date('Y', strtotime( $state)));
                                // Calculate Total Days
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $get('start_date'));
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $state)->addDays();
                                $diff_in_days = $to->diffInDays($from);
                                $set('total_leave', $diff_in_days);

                            }
                        ),
                    TextInput::make('total_leave')
                        ->label(__('menu.leaves.field.total_leave'))
                        ->readOnly()
                        ->suffix(__('menu.leaves.field.day')),
                    Textarea::make('description')
                        ->label(__('menu.leaves.field.description'))
                        ->readOnly(fn (callable $get): bool => $get('status') === "Approved")
                        ->required(),
                    FileUpload::make('attachment')
                        ->label(__('menu.leaves.field.attachment'))
                        ->directory('attachments_leaves')
                        ->acceptedFileTypes(['application/pdf'])
                        ->maxSize(2048)
                        ->openable()
                        ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                        ->preserveFilenames(),

                    Hidden::make('year'),

                ])->columns(2)->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('menu.leaves.field.leave_id'))
                    ->wrap()
                    ->searchable(),
                TextColumn::make('leave_type.full_name')
                    ->label(__('menu.leaves.field.leave_type')),
                TextColumn::make('description')
                    ->label(__('menu.leaves.field.description'))
                    ->searchable(),
                TextColumn::make('start_date')
                    ->label(__('menu.leaves.field.start_date'))
                    ->date()
                    ->searchable(),
                TextColumn::make('end_date')
                    ->label(__('menu.leaves.field.end_date'))
                    ->date()
                    ->searchable(),
                TextColumn::make('year')
                    ->label(__('menu.leaves.field.year')),
                TextColumn::make('user.name')
                    ->searchable()
                    ->label(__('menu.leaves.field.request_by')),
                TextColumn::make('user_checked_by.name')
                    ->label(__('menu.leaves.field.checked_by'))
                    ->searchable(),
                TextColumn::make('total_leave')
                    ->label(__('menu.leaves.field.total_leave'))
                    ->searchable(),
                IconColumn::make('status')
                    ->label(__('menu.leaves.field.status'))
                    ->icon(fn (string $state): string => match ($state) {
                        'Rejected' => 'heroicon-m-x-circle',
                        'Pending' => 'heroicon-m-clock',
                        'Approved' => 'heroicon-m-check-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'Rejected' => 'danger',
                        'Pending' => 'warning',
                        'Approved' => 'success',
                        default => 'gray',
                    })
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'Approved' => 'Approved',
                        'Pending' => 'Pending',
                        'Rejected' => 'Rejected',
                        'Charge' => 'Charge',
                    ]),

            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label("")
                    ->hidden(fn ($record) => $record->status === "Approved"),
                Tables\Actions\ViewAction::make()
                    ->label("")
                    ->icon(""),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListLeaveRequests::route('/'),
            'create' => Pages\CreateLeaveRequest::route('/create'),
            'edit' => Pages\EditLeaveRequest::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->orderBy('created_at', 'DESC');
    }
}
