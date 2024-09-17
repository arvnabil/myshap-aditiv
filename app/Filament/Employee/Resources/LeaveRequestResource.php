<?php

namespace App\Filament\Employee\Resources;

use App\Filament\Employee\Resources\LeaveRequestResource\Pages;
use App\Filament\Employee\Resources\LeaveRequestResource\Widgets\StatsLeaveOverview;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use BezhanSalleh\FilamentShield\Contracts\HasShieldPermissions;
use Closure;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
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
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class LeaveRequestResource extends Resource implements HasShieldPermissions
{
    protected static ?string $model = LeaveRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $activeNavigationIcon = 'heroicon-m-rocket-launch';
    protected static ?string $navigationGroup = 'Menu';
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

    public static function getNavigationBadgeTooltip(): ?string
    {
        return __('menu.counting_badge_request');
    }

    public static function getNavigationLabel(): string
    {
        return __('menu.leaves.manage_leave');
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'Pending')->where('user_id', auth()->user()->id)->count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'Pending')->where('user_id', auth()->user()->id)->count() > 0 ? 'warning' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('menu.leaves.section_form'))
                ->description(__('menu.leaves.sub_section_form'))
                ->schema([
                    Hidden::make('year'),
                    Hidden::make('status')->default('Pending'),
                    Hidden::make('user_id')
                        ->default(auth()->user()->id),
                    Select::make('leave_type_id')
                        ->required()
                        ->label(__('menu.leaves.field.leave_type'))
                        ->options(function (): array {
                            $types = LeaveType::whereIn('id', Auth::user()->leave_type)->get()->pluck('full_name', 'id')->toArray();
                            return $types;
                        })
                        ->rules([
                            // Cek tipe nya dan total req nya mau pending atau tidak
                            // Kalau tipe nya strict dan jumlah total cuti yang sedang diajukan dan sudah diajukan
                            // di periode sama sudah melebihi max yang dibolehkan dan status nya tidak Rejected
                            // Ambil data yang sedang login untuk di cek
                            // maka tampilkan error, jika tidak strict tipe nya maka tidak error
                            fn (callable $get): Closure => function (string $attribute, $value, Closure $fail) use($get) {
                                $user = auth()->user();
                                $leave_type = LeaveType::where('id', $value)->first();
                                $leaveTotal = LeaveRequest::where('user_id', $user->id)->where('leave_type_id',$value)->where('year', now()->format('Y'))->where('status', '!=','Reject')->sum('total_leave');
                                if($leave_type){
                                    $totalReq = $get('total_leave');
                                    $sumReq = (int) $leaveTotal + (int) $totalReq;
                                    if ($sumReq > $leave_type->max_days_allowed && $leave_type->strict === 1) {
                                        $fail(__('validation.custom.leave_strict'));
                                    }
                                }
                            }
                        ]),
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
                                $set('year', date('Y', strtotime($state)));
                                // Calculate Total Days
                                $to = \Carbon\Carbon::createFromFormat('Y-m-d', $get('start_date'));
                                $from = \Carbon\Carbon::createFromFormat('Y-m-d', $state)->addDays();
                                $diff_in_days = $to->diffInDays($from);
                                $set('total_leave', $diff_in_days);
                            }
                        ),
                    TextInput::make('total_leave')
                        ->label(__('menu.leaves.field.total_leave'))
                        ->live()
                        ->readOnly()
                        ->suffix(__('menu.leaves.field.day'))
                        ->rules([
                            fn (callable $get): Closure => function (string $attribute, $value, Closure $fail) use($get) {
                                 $leave_type = LeaveType::where('id', $get('leave_type_id'))->first();
                                if ($value <= 0) {
                                    $fail('The :attribute must be more than 1.');
                                }else if($value > (int) $leave_type->max_days_allowed){
                                    // Error Jika value total nya lebih dari total tipe yang dibolehkan
                                    $fail(__('validation.custom.leave_total_allowed'));
                                }
                            }
                        ]),
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
                TextColumn::make('start_date')
                    ->date()
                    ->label(__('menu.leaves.field.start_date'))
                    ->searchable(),
                TextColumn::make('end_date')
                    ->date()
                    ->label(__('menu.leaves.field.end_date'))
                    ->searchable(),
                TextColumn::make('year')
                    ->label(__('menu.leaves.field.year')),
                TextColumn::make('user_checked_by.name')
                    ->default('Menunggu persetujuan')
                    ->label(__('menu.leaves.field.checked_by')),
                TextColumn::make('total_leave')
                    ->label(__('menu.leaves.field.total_leave'))
                    ->suffix(" " . __('menu.leaves.field.day')),
                IconColumn::make('status')
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
                    }),
                TextColumn::make('created_at')
                    ->date()
                    ->label(__('menu.leaves.field.created_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->date()
                    ->label(__('menu.leaves.field.updated_at'))
                    ->toggleable(isToggledHiddenByDefault: true),
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
                // Action::make('reportLeaveRequest')
                //     ->label('Download Pdf')
                //     ->color('warning')
                //     ->icon('heroicon-m-arrow-top-right-on-square')
                //     ->url(fn (LeaveRequest $record): string => route('reports.leave.download', $record))
                //     ->openUrlInNewTab(),
                Tables\Actions\ViewAction::make()
                    ->label(__('default.view_detail'))
                    ->url(fn (LeaveRequest $record): string => route('reports.leave.view', $record))
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make()
                ->hidden(fn ($record) => $record->status === "Approved"),
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

    public static function getWidgets(): array
    {
        return [
            StatsLeaveOverview::class,
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id', auth()->id())->orderBy('created_at', 'DESC');
    }
}
