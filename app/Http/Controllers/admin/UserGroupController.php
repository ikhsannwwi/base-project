<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    private static $module = 'user_groups';

    public function index(){
        return view('administrator.user_groups.index');
    }
}
