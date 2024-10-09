<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaveTypeResource\Pages;
use App\Models\LeaveType;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use stdClass;
use Filament\Tables\Contracts\HasTable as ContractsHasTable;

class LeaveTypeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = LeaveType::class;

    protected static ?string $navigationIcon = 'heroicon-m-tag';
    protected static ?string $navigationGroup = 'Employee Features';
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

    public static function getNavigationLabel(): string
    {
        return __('menu.leave_types.manage_leave_type');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.leave_types.section_form'))
                ->description(__('menu.leave_types.sub_section_form'))
                ->schema([
                    TextInput::make('name')
                        ->label(__('menu.leave_types.field.name'))
                        ->autocapitalize('words')
                        ->required(),
                    Textarea::make('description')
                        ->label(__('menu.leave_types.field.description')),
                    TextInput::make('max_days_allowed')
                        ->label(__('menu.leave_types.field.max_days_allowed'))
                        ->integer()
                        ->required(),
                    Toggle::make('strict')
                        ->label(__('menu.leave_types.field.strict'))
                        ->onIcon('heroicon-m-check-badge')
                        ->offIcon('heroicon-m-x-circle')
                        ->onColor('success')
                        ->offColor('danger')
                ])->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make(__('default.index'))->state(
                    static function (ContractsHasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                TextColumn::make('name')
                    ->label(__('menu.leave_types.field.name'))
                    ->searchable(),
                TextColumn::make('description')
                    ->label(__('menu.leave_types.field.description'))
                    ->searchable(),
                TextColumn::make('max_days_allowed')
                    ->label(__('menu.leave_types.field.max_days_allowed')),
                ToggleColumn::make('strict')
                    ->label(__('menu.leave_types.field.strict'))
                    ->onIcon('heroicon-m-check-badge')
                    ->offIcon('heroicon-m-x-circle')
                    ->onColor('success')
                    ->offColor('danger')
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
            'index' => Pages\ListLeaveTypes::route('/'),
            'create' => Pages\CreateLeaveType::route('/create'),
            'edit' => Pages\EditLeaveType::route('/{record}/edit'),
        ];
    }
}
