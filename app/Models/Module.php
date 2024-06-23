<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\ModuleAccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Module extends Model
{
    use HasFactory;

    protected $table = 'module';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function access()
    {
        return $this->hasMany(ModuleAccess::class, 'module_id');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }
}
