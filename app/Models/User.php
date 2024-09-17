<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use BezhanSalleh\FilamentShield\Facades\FilamentShield;
use BezhanSalleh\FilamentShield\Support\Utils;
use BezhanSalleh\FilamentShield\Traits\HasPanelShield;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Panel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail, FilamentUser, HasAvatar
{
    use HasFactory, Notifiable, HasRoles, HasPanelShield;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'leave_type',
        'avatar',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'leave_type' => 'array'
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        if($this->avatar){
            return Storage::url($this->avatar);
        }
        return $this->avatar;
    }

    protected static function booted()
    {
        if(config('filament-shield.panel_employee.enabled', false)) {
            FilamentShield::createRole(name:config('filament-shield.panel_employee.name','panel_employee'));
            FilamentShield::createRole(name:'Employee');
            static::created(function (User $user) {
                $user->assignRole(config('filament-shield.panel_employee.name', 'panel_employee'));
            });
            static::deleting(function (User $user) {
                $user->assignRole(config('filament-shield.panel_employee.name', 'panel_employee'));
            });

        }
        if(config('filament-shield.panel_app.enabled', false)) {
            FilamentShield::createRole(name:config('filament-shield.panel_app.name','panel_app'));
            static::created(function (User $user) {
                $user->assignRole(config('filament-shield.panel_app.name', 'panel_app'));
            });
            static::deleting(function (User $user) {
                $user->assignRole(config('filament-shield.panel_app.name', 'panel_app'));
            });

            self::deleted(function (self $model) {
                if ($model->avatar !== null) {
                    Storage::disk('public')->delete($model->avatar);
                }
            });

            static::updating(function ($model) {
                if ($model->isDirty('avatar') && ($model->getOriginal('avatar') !== null)) {
                    Storage::disk('public')->delete($model->getOriginal('avatar'));
                }
            });

        }
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if($panel->getId() === 'administrator') {
            return $this->hasRole(Utils::getSuperAdminName());
        }else if($panel->getId() === 'employee'){
            return $this->hasRole(config('filament-shield.panel_employee.name', 'panel_employee'));
        }else if($panel->getId() === 'app'){
            return $this->hasRole(config('filament-shield.panel_app.name', 'panel_app'));
        }else{
            return false;
        }
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }
    public function company()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    public function activation_letter()
    {
        return $this->hasMany(ActivationLetter::class, 'user_id');
    }

    public function user_leave_checked_by()
    {
        return $this->hasMany(LeaveRequest::class, 'checked_by');
    }
    public function customer_pic()
    {
        return $this->hasMany(Customer::class, 'user_id');
    }

}
