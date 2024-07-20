<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogSystem extends Model
{
    use HasFactory;

    protected $table = 'log_system';

    protected $guarded = ['id'];

    public $timestamps = true;

    const UPDATED_AT = null;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
