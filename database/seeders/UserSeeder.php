<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $roles = Role::all();
        $rolesArray = $roles->pluck('name')->toArray();

        User::truncate();

        $users = config('dataconstant.users');
        foreach ($users as $user) {
            $userObj = User::create([
                'name'                 => $user['name'],
                'username'             => $user['username'],
                'email'                => $user['email'],
                'email_verified_at'    => $user['email_verified_at'],
                'password'             => bcrypt($user['password']),
                'is_locked'            => $user['is_locked'] ?? 0,
                'leave_type'            => 	["1","2"],
                'last_password_change' => date('Y-m-d H:i:s'),
            ]);
            if ($user['employee']) {
                $employee = Employee::create([
                    'firstname'         => $user['employee']['firstname'],
                    'lastname'          => $user['employee']['lastname'],
                    'account_number'    => $user['employee']['account_number'],
                    'gender'            => $user['employee']['gender'],
                    'phone_number'      => $user['employee']['phone_number'],
                    'user_id'           => $userObj->id,
                    'position_id'       => $user['employee']['position_id'],
                ]);
            }
            foreach ($user['roles'] as $role) {
                $userObj->assignRole($role);
            }
        }
    }
}
