<?php

namespace App\Filament\Resources;

use App\Filament\Exports\UserExporter;
use App\Filament\Resources\UserResource\Pages;
use App\Models\LeaveType;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Actions\ExportBulkAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable as ContractsHasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Hash;
use stdClass;

class UserResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-m-users';
    protected static ?string $navigationGroup = 'User Management';
    protected static ?int $navigationSort = null;

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
                    FileUpload::make('avatar') //this is the avatar picker
                        ->label(__('menu.user_update.field.avatar'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->directory('profile'),
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('username')
                        ->nullable(),
                    TextInput::make('email')
                        ->email()
                        ->required(),
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state))
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord),
                    Select::make('leave_type')
                        ->label('Tipe Cuti')
                        ->multiple()
                        ->options(LeaveType::all()->pluck('full_name', 'id')),
                    Select::make('roles')
                        ->multiple('roles')
                        ->relationship('roles', 'name')
                        ->noSearchResultsMessage('No roles found.'),
                    FileUpload::make('signature') //this is the avatar picker
                        ->label(__('Signature'))
                        ->image()
                        ->resize(50)
                        ->optimize('webp')
                        ->directory('signature'),
                    TextInput::make('quotation_number')
                        ->placeholder(__('Ex: Q01'))
                        ->required(),

                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')->state(
                    static function (ContractsHasTable $livewire, stdClass $rowLoop): string {
                        return (string) (
                            $rowLoop->iteration +
                            ($livewire->getTableRecordsPerPage() * (
                                $livewire->getTablePage() - 1
                            ))
                        );
                    }
                ),
                ImageColumn::make('avatar')->label('Avatar')->circular()->extraImgAttributes(['img_preview']),
                TextColumn::make('name')
                    ->searchable()
                    ->label('Name'),
                TextColumn::make('email')
                    ->searchable()
                    ->label('Email'),
                TextColumn::make('leave_type')
                    ->label('Tipe Cuti'),
                TextColumn::make('roles.name')
                    ->label('Roles'),
            ])
            ->filters([
                SelectFilter::make('roles')
                    ->label('Roles')
                    ->relationship('roles', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                ExportAction::make()->exporter(UserExporter::class)
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ExportBulkAction::make()->exporter(UserExporter::class),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
