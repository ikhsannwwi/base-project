<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Module;
use Illuminate\Support\ServiceProvider;

class DataServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->composer([
            'administrator.layouts.sidemenu'
        ], function ($view){
            $module = Module::orderBy('menu_id', 'asc')->orderBy('row_order', 'asc')->with('access')->with('menu')->get();
            $menu = Menu::with(['module' => function($query){
                    $query->orderBy('menu_id', 'asc')->orderBy('row_order', 'asc');
                }])->orderBy('row_order', 'asc')->get();
            $permissions = getPermissionModuleGroup();

            $view->with([
                'module' => $module,
                'menu' => $menu,
                'permissions' => $permissions,
            ]);
        });
    }
}
