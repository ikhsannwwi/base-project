<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use App\Models\ModuleAccess;
use Illuminate\Database\Seeder;
use App\Models\UserGroupPermission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_group = UserGroup::create([
            'name' => 'Administrator',
            'status' => 1,
            'created_at' => now(),
            'created_by' => 1,
        ]);

        $access = ModuleAccess::all();

        foreach ($access as $index => $row) {
            UserGroupPermission::create([
                'usergroup_id' => $user_group->id,
                'module_access_id' => $row->id,
                'status' => 1,
                'created_at' => now(),
                'created_by' => 1,
            ]);
        }

        $user = User::create([
            'name' => 'Developer',
            'email' => 'dev@daysf.com',
            'password' => Hash::make('ikhsannwwi'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'created_by' => 1,
            'usergroup_id' => 0,
            'status' => 1,
            'telephone' => '087798889924',
            'uuid' => generateUuid(),
        ]);

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(60),
            'created_at' => now(),
            'created_by' => 1,
            'usergroup_id' => $user_group->id,
            'status' => 1,
            'telephone' => '081234567891',
            'uuid' => generateUuid(),
        ]);
    }
}
