<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSystem extends Model
{
    use HasFactory;

    protected $table = 'log_system';

    protected $guarded = ['id'];

    public $timestamps = true;

    const UPDATED_AT = null;
}
