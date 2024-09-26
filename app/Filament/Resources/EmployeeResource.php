<?php

namespace App\Filament\Resources;

use App\Enums\BloodGroup;
use App\Enums\Gender;
use App\Filament\Resources\EmployeeResource\Pages;
use App\Models\Country;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Position;
use App\Models\User;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Contracts\HasTable as ContractsHasTable;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Hash;
use stdClass;

class EmployeeResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = Employee::class;
    protected static ?string $navigationBadgeTooltip = 'The number of employees';

    protected static ?string $navigationIcon = 'heroicon-m-user-group';
    protected static ?string $navigationGroup = 'Employee Management';
    protected static ?int $navigationSort = 7;

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
        function checkIdEmployee()
        {
            $employee = Employee::orderBy('created_at','desc')->first();
            if($employee->account_number == null){
                return 'ACT-000';
            }
            if($employee->account_number != null) {
                $str = explode('-', $employee->account_number);
                $str[1] = str_pad((int)$str[1] + 1, 3, '0', STR_PAD_LEFT);
                $result = implode('-', $str);
                return  $result;
            }
        }
        return $form
            ->schema([
                Section::make('Personal Info')
                ->description('Information about Personal')
                ->schema([
                    TextInput::make('firstname')
                        ->label('First Name')
                        ->autocapitalize('words')
                        ->required(),
                    TextInput::make('lastname')
                        ->label('Last Name')
                        ->autocapitalize('words')
                        ->nullable(),
                    TextInput::make('phone_number')
                        ->label('Phone Number')
                        ->live()
                        ->reactive()
                        ->afterStateUpdated(function (Set $set, ?string $state) {
                            return $set("phone_number", ltrim($state, "0"));
                        })
                        ->prefix('+62')
                        ->required(),
                    Select::make('gender')
                        ->label('Gender')
                        ->options(Gender::class)
                        ->required(),
                    Select::make('blood_group')
                        ->label('Golongan Darah')
                        ->options(BloodGroup::class)
                        ->searchable()
                        ->required(),
                    DatePicker::make('date_of_birth')
                        ->label('Date of Birth')
                        ->nullable(),
                    TextInput::make('pincode')
                        ->label('PIN Web(Optional)')
                        ->nullable(),
                    TextInput::make('city')
                        ->label('Your city')
                        ->nullable(),
                    TextInput::make('zip_code')
                        ->label('Zip Code')
                        ->nullable(),
                    Select::make('matrial_status')
                    ->label('Matrial Status')
                    ->options([
                        'Belum Menikah' => "Belum Menikah",
                        'Menikah' => 'Menikah',
                        'Duda/Janda' => 'Duda/Janda',
                    ]),
                    Textarea::make('address')
                        ->label('Your Address')
                        ->nullable(),

                ])->columns(2)->collapsible(),
                Section::make('Employee Information')
                ->description('Information about Employee')
                ->schema([
                    TextInput::make('account_number')
                        ->label('ID Employee')
                        ->default(checkIdEmployee())
                        ->readOnly(),
                    DatePicker::make('date_of_joining')
                        ->label('Date of Joining')
                        ->nullable(),
                    DatePicker::make('date_of_leaving')
                        ->label('Date of Leaving')
                        ->nullable(),
                    Select::make('user_id')
                        ->label('User Login')
                        ->options(User::all()->pluck('name', 'id'))
                        ->searchable()
                        ->relationship(name:'user', titleAttribute:'name')
                        ->createOptionForm([
                            Card::make([
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
                            ])->columns(2)
                        ]),
                    Select::make('position_id')
                        ->label('Your Position')
                        ->options(Position::all()->pluck('name', 'id'))
                        ->searchable(),
                    Select::make('nationality_id')
                        ->label('Your Nationality')
                        ->options(Country::all()->pluck('nationality', 'id'))
                        ->searchable(),
                ])->columns(2)->collapsible(),
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
                ImageColumn::make('user.avatar')->label('Avatar')->circular()->extraImgAttributes(['img_preview']),
                TextColumn::make('account_number')
                    ->label('ID Karyawan')
                    ->searchable(),
                TextColumn::make('firstname')
                    ->label('Name')
                    ->searchable(),
                TextColumn::make('position.departement.name')
                    ->label('Departement')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                TextColumn::make('position.name')
                    ->label('Position')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                TextColumn::make('country.nationality')
                    ->label('Nationality')
                    ->badge()
                    ->color('warning')
                    ->searchable(),
                SelectColumn::make('gender')
                    ->options(Gender::class)
                    ->label('Gender')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('position_id')
                    ->label('Position')
                    ->options(Position::pluck('name', 'id')),
                SelectFilter::make('gender')
                    ->label('Gender')
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ])
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
