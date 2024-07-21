<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'User Management',
            'icon' => 'fas fa-users',
            'status' => 1,
            'created_at' => '2024-06-15 10:14:34',
            'updated_at' => '2024-07-07 11:51:04',
            'created_by' => 1,
            'row_order' => 0,
        ]);

        Menu::create([
            'name' => 'Settings',
            'icon' => 'fas fa-cogs',
            'status' => 1,
            'created_at' => '2024-06-15 11:21:21',
            'updated_at' => '2024-07-07 11:51:05',
            'created_by' => 2,
            'row_order' => 2,
        ]);

        Menu::create([
            'name' => 'Systems',
            'icon' => 'fas fa-sliders-h',
            'status' => 1,
            'created_at' => '2024-07-04 13:22:48',
            'updated_at' => '2024-07-07 11:51:05',
            'created_by' => 1,
            'row_order' => 1,
        ]);
    }
}
