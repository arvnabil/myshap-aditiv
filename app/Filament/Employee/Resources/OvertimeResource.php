<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\OvertimeResource\Pages;
use App\Models\OvertimeRequest;
use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class OvertimeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = OvertimeRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    protected static ?string $activeNavigationIcon = 'heroicon-m-clock';
    protected static ?string $navigationGroup = 'Menu';
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

    public static function getNavigationBadgeTooltip(): ?string
    {
        return __('menu.counting_badge_request');
    }

    public static function getNavigationLabel(): string
    {
        return __('menu.overtimes.manage_overtime');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('overtime_status', 'Process')->where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('overtime_status', 'Process')->where('user_id', auth()->user()->id)->count() > 0 ? 'warning' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.overtimes.section_form'))
                ->description(__('menu.overtimes.sub_section_form'))
                ->schema([
                    TextInput::make('title')
                        ->label(__('menu.overtimes.field.title'))
                        ->autocapitalize('words')
                        ->required(),
                    Group::make()
                        ->schema([
                        DatePicker::make('request_date')
                        ->label(__('menu.overtimes.field.request_date'))
                        ->disabled()
                    ])->hidden(fn (string $operation): bool => $operation === 'create'),
                    Group::make()
                        ->schema([
                            DatePicker::make('request_date')
                            ->label(__('menu.overtimes.field.request_date'))
                            ->readOnly()
                            ->default(now())
                    ])->hidden(fn (string $operation): bool => $operation === 'edit'),
                    TableRepeater::make('overtime_items')
                        ->label(__('menu.overtimes.field.overtime_items'))
                        ->required()
                        ->relationship()
                        ->defaultItems(1)
                        ->deletable(fn (callable $get): bool => $get('status') === "Approved" ? false : true)
                        ->headers([
                            Header::make(__('menu.overtimes.field.acitvity'))->width('150px')->align(Alignment::Center)->markAsRequired(),
                            Header::make(__('menu.overtimes.field.overtime_date'))->width('150px')->align(Alignment::Center)->markAsRequired(),
                            Header::make(__('menu.overtimes.field.from'))->width('150px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.overtimes.field.to'))->width('150px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.overtimes.field.total_hour'))->width('150px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.overtimes.field.note'))->width('150px')->align(Alignment::Center)
                                ->markAsRequired(),
                            Header::make(__('menu.overtimes.field.status'))->width('150px'),
                        ])
                        ->schema([
                            TextInput::make('activity_name')
                                ->autocapitalize('words')
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required(),
                            DatePicker::make('overtime_date')
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required(),
                            TimePicker::make('time_in')
                                ->live()
                                ->default('19.00.00')
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required(),
                            TimePicker::make('time_out')
                                ->default("00.00.00")
                                ->live()
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required()
                                // ->readOnly(fn (callable $get): bool => $get('status') === "Approved")
                                // ->disabled(fn (callable $get): bool => $get('start_date') ? false : true)
                                ->afterStateUpdated(
                                    function ($state, callable $get, callable $set) {
                                        $explodeTimeOut = explode(':', $state);
                                        $timeIn = $get('time_in');
                                        $explodeTimeIn = explode(':', $timeIn);
                                        if ((int) $explodeTimeIn[0] !== 19) {
                                            $total_hour = (int) $explodeTimeOut[0] - (int) $explodeTimeIn[0];
                                            $set('total_hours', $total_hour);
                                        } else {
                                            if ((int) $explodeTimeOut[0] < 19) {
                                                // Ini kalo lebih dari 23:00
                                                $total24 = 24 - (int) $explodeTimeIn[0];
                                                $total_hour = $total24 + (int) $explodeTimeOut[0];
                                                $set('total_hours', $total_hour);
                                            } else {
                                                // ini klo lebih alias sampe 23
                                                $total_hour = $explodeTimeOut[0] - (int) $explodeTimeIn[0];
                                                $set('total_hours', $total_hour);
                                            }
                                        }
                                    }
                                ),
                            TextInput::make('total_hours')
                                ->suffix("Jam")
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required(),
                            TextInput::make('reason')
                                ->disabled(fn (callable $get): bool => $get('status') === "Approved")
                                ->required(),
                            TextInput::make('status')
                                ->readOnly()
                                ->default('Pending'),
                        ])
                        ->columnSpan('full'),
                    Hidden::make('overtime_status')
                        ->default('Process'),
                    Group::make()
                        ->schema([
                            Hidden::make('user_id')
                                ->default(auth()->user()->id),
                        ])->hidden(fn (string $operation): bool => $operation === 'edit'),

                ])->columns(2)->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label(__('menu.overtimes.field.overtime_id'))
                    ->wrap()
                    ->searchable(),
                TextColumn::make('title')
                    ->label(__('menu.overtimes.field.title'))
                    ->searchable(),
                TextColumn::make('request_date')
                    ->label(__('menu.overtimes.field.request_date')),
                TextColumn::make('user.name')
                    ->label(__('menu.overtimes.field.request_by')),
                TextColumn::make('user_checked_by.name')
                    ->label(__('menu.overtimes.field.checked_by'))
                    ->default('Menunggu persetujuan'),
                TextColumn::make('overtime_status')
                ->label(__('menu.overtimes.field.status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Process' => 'warning',
                        'Done' => 'info',
                        default => 'gray',
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->date()
                    ->label(__('menu.overtimes.field.created_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->date()
                    ->label(__('menu.overtimes.field.updated_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
                ])
            ->filters([
                SelectFilter::make('overtime_status')
                    ->options([
                        'Process' => 'Process',
                        'Done' => 'Done',
                    ]),
            ])
            ->actions([
                // Action::make('reportOvertimeRequest')
                // ->label('Download Pdf')
                //     ->color('warning')
                //     ->icon('heroicon-m-arrow-top-right-on-square')
                //     ->url(fn (OvertimeRequest $record): string => route('reports.overtime.download', $record))
                //     ->openUrlInNewTab(),
                Tables\Actions\ViewAction::make()
                    ->label(__('default.view_detail'))
                    ->url(fn (OvertimeRequest $record): string => route('reports.overtime.view', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
                    ->hidden(fn ($record) => $record->overtime_status === "Done"),
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
            'index' => Pages\ListOvertimes::route('/'),
            'create' => Pages\CreateOvertime::route('/create'),
            'edit' => Pages\EditOvertime::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->orderBy('created_at', 'DESC');
    }
}
