<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ActivationLetterResource\Pages;
use App\Models\ActivationLetter;
use App\Models\Brand;
use App\Models\Company;
use App\Models\User;
use App\Models\ZoomProductType;
use App\Models\ZoomSubAccount;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ActivationLetterResource extends Resource implements HasShieldPermissions
{
    protected static ?string $navigationIcon = 'heroicon-o-document';
    protected static ?string $activeNavigationIcon = 'heroicon-m-document';
    protected static ?string $navigationGroup = 'Zoom Account Customer';
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

    public static function getNavigationLabel(): string
    {
        return __('menu.activation_letters.manage_activation_letter');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('user_id', auth()->user()->id)->count() > 0 ? 'primary' : 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.activation_letters.section_form'))
                ->description(__('menu.activation_letters.sub_section_form'))
                ->schema([
                    Select::make('zoom_sub_account_id')
                    ->label(__('Akun PO'))
                    ->options(ZoomSubAccount::all()->pluck('name_with_type','id'))
                        ->searchable()
                        ->required(),
                    TextInput::make('name')
                    ->label(__('menu.activation_letters.field.name'))
                    ->autocapitalize('words')
                    ->required(),
                    TextInput::make('email')
                    ->label(__('menu.activation_letters.field.email'))
                    ->email()
                        ->required(),
                    TextInput::make('total_license')
                    ->maxLength(75)
                        ->required(),
                    Select::make('company_id')
                        ->label(__('menu.activation_letters.field.company'))
                        ->options(Company::all()->pluck('name', 'id'))
                        ->searchable()
                            ->required()
                            ->relationship(name: 'company', titleAttribute: 'name')
                            ->createOptionForm([
                                Card::make([
                                    TextInput::make('name')
                                    ->label(__('menu.companies.field.name'))
                                    ->required(),
                                    Hidden::make('user_id')
                                        ->default(auth()->user()->id),
                                ])->columns(2)
                            ]),
                    Select::make('brand_id')
                        ->label(__('menu.activation_letters.field.brand'))
                        ->default(1)
                        ->options(Brand::all()->pluck('name', 'id'))
                        ->searchable()
                        ->required()
                        ->relationship(name: 'brand', titleAttribute: 'name'),
                    Textarea::make('address')
                    ->label(__('menu.activation_letters.field.address')),
                    TextInput::make('code_reference')
                    ->label('Kode Referensi (Opsional)')
                    ->nullable(),
                ])->collapsible()
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->wrap()
                    ->label(__('menu.activation_letters.field.id'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('user.name')
                    ->label(__('menu.activation_letters.field.pic'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('company.name')
                    ->wrap()
                    ->label(__('menu.activation_letters.field.company'))
                    ->searchable(),
                TextColumn::make('code')
                    ->label(__('menu.activation_letters.field.code'))
                    ->searchable(),
                TextColumn::make('name')
                    ->label(__('menu.activation_letters.field.name'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('menu.activation_letters.field.email'))
                    ->limit(30)
                    ->searchable(),
                TextColumn::make('start_date')
                    ->date()
                    ->label(__('menu.activation_letters.field.start_date'))
                    ->searchable(),
                TextColumn::make('end_date')
                    ->date()
                    ->label(__('menu.activation_letters.field.end_date'))
                    ->searchable(),
                TextColumn::make('total_license')
                    ->limit(20)
                    ->label(__('menu.activation_letters.field.total_license'))
                    ->searchable(),
                TextColumn::make('address')
                    ->limit(30)
                    ->label(__('menu.activation_letters.field.address'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('brand.name')
                    ->limit(30)
                    ->default('-')
                    ->label(__('menu.activation_letters.field.brand'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('zoom_sub_account.account_number')
                    ->label(__('Account Number'))
                    ->searchable(),
                TextColumn::make('code_reference')
                    ->limit(30)
                    ->default('-')
                    ->label(__('menu.activation_letters.field.code_reference'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('zoom_code')
                ->options(ZoomProductType::all()->pluck('name', 'code')),
                SelectFilter::make('user_id')
                ->label(__('menu.activation_letters.field.pic'))
                ->options(User::with('employee')->get()->pluck('employee.fullname', 'id')),
                Filter::make('code_reference')
                ->default(false)
            ])
            ->actions([
                Action::make('reportLeaveRequest')
                ->label('Download Pdf')
                ->color('warning')
                ->icon('heroicon-m-arrow-top-right-on-square')
                ->url(fn (ActivationLetter $record): string => route('reports.activation_letter.download', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\ViewAction::make()
                    ->url(fn (ActivationLetter $record): string => route('reports.activation_letter.view', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->recordUrl(
                fn(Model $record) => null,
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
            'index' => Pages\ListActivationLetters::route('/'),
            'create' => Pages\CreateActivationLetter::route('/create'),
            'edit' => Pages\EditActivationLetter::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->orderBy('created_at', 'DESC');
    }
}
