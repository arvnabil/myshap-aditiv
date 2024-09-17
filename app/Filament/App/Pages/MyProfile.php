<?php

namespace App\Filament\App\Pages;

use App\Enums\BloodGroup;
use App\Enums\Gender;
use App\Models\Country;
use App\Models\LeaveType;
use Exception;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class MyProfile extends Page implements HasForms
{
    use InteractsWithForms;
    protected static bool $shouldRegisterNavigation = false;
    protected static ?string $navigationIcon = 'heroicon-m-users';
    protected static ?string $navigationGroup = 'Menu';
    protected static string $view = 'filament.pages.my-profile';
    protected static ?string $slug = 'myprofile';

    public ?array $profileData = [];
    public ?array $passwordData = [];

    public function mount(): void
    {
        $this->fillForms();
    }

    protected function getForms(): array
    {
        return [
            'editProfileForm',
            'editPasswordForm',
        ];
    }

    public function editProfileForm(Form $form): Form
    {
        return
            $form->schema([
                Section::make(__('menu.user_update.section_form'))
                    ->description(__('menu.user_update.sub_section_form'))
                    ->schema([
                        FileUpload::make('avatar') //this is the avatar picker
                        ->label(__('menu.user_update.field.avatar'))
                            ->image()
                            ->resize(50)
                            ->optimize('webp')
                            ->directory('profile'),
                        TextInput::make('email')
                        ->label(__('menu.user_update.field.email'))
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true),
                        TextInput::make('username')
                        ->label(__('menu.user_update.field.username'))
                            ->required(),
                        Select::make('leave_type')
                        ->label(__('menu.user_update.field.leave_type'))
                            ->disabled()
                            ->multiple()
                            ->options(LeaveType::all()->pluck('full_name', 'id')),
                        DatePicker::make('last_login')
                        ->label(__('menu.user_update.field.last_login'))
                            ->date()
                            ->disabled(),
                        DatePicker::make('email_verified_at')
                        ->label(__('menu.user_update.field.email_verified_at'))
                            ->date()
                            ->disabled(),

                    ])->columns(2)->collapsible(),
                Section::make(__('menu.employees.section_form'))
                    ->description(__('menu.employees.sub_section_form_update'))
                    ->schema([
                        Group::make()
                            ->relationship('employee')
                            ->schema([
                                TextInput::make('firstname')
                                ->label(__('menu.employees.field.firstname'))
                                    ->required(),
                                TextInput::make('lastname')
                                ->label(__('menu.employees.field.lastname'))
                                    ->placeholder(__('menu.employees.field.lastname'))
                                    ->nullable(),
                                TextInput::make('account_number')
                                ->label(__('menu.employees.field.account_number'))
                                    ->readOnly(),
                                TextInput::make('phone_number')
                                ->label(__('menu.employees.field.phone_number'))
                                    ->live()
                                    ->reactive()
                                    ->afterStateUpdated(function (Set $set, ?string $state) {
                                        return $set("phone_number", ltrim($state, "0"));
                                    })
                                    ->prefix('+62')
                                    ->required(),
                                Select::make('gender')
                                ->label(__('menu.employees.field.gender'))
                                    ->options(Gender::class)
                                    ->required(),
                                Select::make('blood_group')
                                ->label(__('menu.employees.field.blood_group'))
                                    ->options(BloodGroup::class)
                                    ->searchable()
                                    ->required(),
                                DatePicker::make('dateofbirth')
                                ->label(__('menu.employees.field.dateofbirth'))
                                    ->required(),
                                DatePicker::make('dateofjoining')
                                ->label(__('menu.employees.field.dateofjoining'))
                                    ->nullable(),
                                Group::make()
                                    ->relationship('position')
                                    ->schema([
                                        TextInput::make('name')
                                        ->label(__('menu.employees.field.position'))
                                            ->disabled(),
                                    ]),
                                TextInput::make('city')
                                ->label(__('menu.employees.field.city'))
                                    ->nullable(),
                                TextInput::make('zip_code')
                                ->label(__('menu.employees.field.zip_code'))
                                    ->nullable(),
                                Select::make('matrial_status')
                                ->label(__('menu.employees.field.matrial_status'))
                                ->disabled()
                                ->options([
                                    'Belum Menikah' => "Belum Menikah",
                                    'Menikah' => 'Menikah',
                                    'Duda/Janda' => 'Duda/Janda',
                                ]),
                                TextInput::make('pincode')
                                ->label(__('menu.employees.field.pincode'))
                                    ->nullable(),
                                Select::make('nationality_id')
                                ->label('Your Nationality')
                                ->options(Country::all()->pluck('nationality', 'id'))
                                    ->searchable(),
                                Textarea::make('address')
                                ->label(__('menu.employees.field.address'))
                                    ->nullable(),
                            ])->columns(2)

                    ])->collapsible()->collapsed(true)
            ])
            ->model($this->getUser())
            ->statePath('profileData');
    }

    public function editPasswordForm(Form $form): Form
    {
        return
            $form->schema([
                Section::make(__('menu.user_update.section_form_update_password'))
                    ->description(__('menu.user_update.sub_section_form_update_password'))
                    ->schema([
                        TextInput::make('Current password')
                        ->label(__('menu.user_update.field.current_password'))
                            ->password()
                            ->required()
                            ->revealable()
                            ->currentPassword(),
                        TextInput::make('password')
                        ->label(__('menu.user_update.field.password'))
                            ->password()
                            ->required()
                            ->rule(Password::default())
                            ->autocomplete('new-password')
                            ->dehydrateStateUsing(fn($state): string => Hash::make($state))
                            ->live(debounce: 500)
                            ->same('passwordConfirmation')
                            ->revealable(),
                        TextInput::make('passwordConfirmation')
                        ->label(__('menu.user_update.field.password_confirmation'))
                            ->password()
                            ->required()
                            ->revealable()
                            ->dehydrated(false),
                    ])->collapsible()->collapsed(true),
            ])
            ->model($this->getUser())
            ->statePath('passwordData');
    }

    protected function getUser(): Authenticatable & Model
    {
        // Load Relationship
        $user = Filament::auth()->user()->load('employee');
        if (! $user instanceof Model) {
            throw new Exception('The authenticated user object must be an Eloquent model to allow the profile page to update it.');
        }
        return $user;
    }

    protected function fillForms(): void
    {
        $data = $this->getUser()->attributesToArray();
        $this->editProfileForm->fill($data);
        $this->editPasswordForm->fill();
    }

    protected function getUpdateProfileFormActions(): array
    {
        return [
            Action::make('updateProfileAction')
            ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editProfileForm'),
        ];
    }
    protected function getUpdatePasswordFormActions(): array
    {
        return [
            Action::make('updatePasswordAction')
            ->label(__('filament-panels::pages/auth/edit-profile.form.actions.save.label'))
                ->submit('editPasswordForm'),
        ];
    }

    public function updateProfile(): void
    {
        $data = $this->editProfileForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        $this->sendSuccessNotification();
    }
    public function updatePassword(): void
    {
        $data = $this->editPasswordForm->getState();
        $this->handleRecordUpdate($this->getUser(), $data);
        if (request()->hasSession() && array_key_exists('password', $data)) {
            request()->session()->put(['password_hash_' . Filament::getAuthGuard() => $data['password']]);
        }
        $this->editPasswordForm->fill();
        $this->sendSuccessNotification();
        Filament::auth()->logout();
    }
    private function handleRecordUpdate(Model $record, array $data): Model
    {
        $record->update($data);
        return $record;
    }

    private function sendSuccessNotification(): void
    {
        Notification::make()
            ->success()
            ->title(__('filament-panels::pages/auth/edit-profile.notifications.saved.title'))
            ->send();
    }
}
