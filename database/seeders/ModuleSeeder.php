<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Module;
use App\Models\ModuleAccess;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuIds = [];
        $menu = Menu::all();
        foreach ($menu as $val) {
            $menuIds[$val['name']] = $val->id;
        }

        $modules = [
            ['identifier' => 'dashboard', 'name' => 'Dashboard', 'menu_id' => 0, 'icon' => 'fas fa-home', 'url' => '/dashboard', 'row_order' => 0],
            ['identifier' => 'user_group', 'name' => 'User Group', 'menu_id' => $menuIds['User Management'], 'icon' => null, 'url' => '/user-groups', 'row_order' => 2],
            ['identifier' => 'module', 'name' => 'Module', 'menu_id' => $menuIds['Settings'], 'icon' => null, 'url' => '/module-managements', 'row_order' => 4],
            ['identifier' => 'menu', 'name' => 'Menu', 'menu_id' => $menuIds['Settings'], 'icon' => null, 'url' => '/menus', 'row_order' => 0],
            ['identifier' => 'user', 'name' => 'User', 'menu_id' => $menuIds['User Management'], 'icon' => null, 'url' => '/users', 'row_order' => 3],
            ['identifier' => 'log_system', 'name' => 'Logs', 'menu_id' => $menuIds['Systems'], 'icon' => null, 'url' => '/log-systems', 'row_order' => null],
        ];

        $moduleIds = [];

        foreach ($modules as $module) {
            $createdModule = Module::create($module);
            $moduleIds[$module['identifier']] = $createdModule->id;
        }

        $accesses = [
            ['module_id' => $moduleIds['dashboard'], 'identifier' => 'add', 'name' => 'Add'],
            ['module_id' => $moduleIds['menu'], 'identifier' => 'view', 'name' => 'View'],
            ['module_id' => $moduleIds['menu'], 'identifier' => 'add', 'name' => 'Add'],
            ['module_id' => $moduleIds['menu'], 'identifier' => 'edit', 'name' => 'Edit'],
            ['module_id' => $moduleIds['menu'], 'identifier' => 'delete', 'name' => 'Delete'],
            ['module_id' => $moduleIds['menu'], 'identifier' => 'status', 'name' => 'Status'],
            ['module_id' => $moduleIds['module'], 'identifier' => 'view', 'name' => 'View'],
            ['module_id' => $moduleIds['module'], 'identifier' => 'add', 'name' => 'Add'],
            ['module_id' => $moduleIds['module'], 'identifier' => 'edit', 'name' => 'Edit'],
            ['module_id' => $moduleIds['module'], 'identifier' => 'delete', 'name' => 'Delete'],
            ['module_id' => $moduleIds['module'], 'identifier' => 'detail', 'name' => 'Detail'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'add', 'name' => 'Add'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'edit', 'name' => 'Edit'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'delete', 'name' => 'Delete'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'detail', 'name' => 'Detail'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'status', 'name' => 'Status'],
            ['module_id' => $moduleIds['user_group'], 'identifier' => 'view', 'name' => 'View'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'add', 'name' => 'Add'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'edit', 'name' => 'Edit'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'view', 'name' => 'View'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'delete', 'name' => 'Delete'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'detail', 'name' => 'Detail'],
            ['module_id' => $moduleIds['user'], 'identifier' => 'status', 'name' => 'Status'],
            ['module_id' => $moduleIds['log_system'], 'identifier' => 'view', 'name' => 'View'],
        ];

        foreach ($accesses as $access) {
            ModuleAccess::create($access);
        }

    }
}
