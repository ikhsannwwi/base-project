<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index($uuid){
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.index', compact('data'));
    }

    public function overview(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.overview', compact('data'));
    }

    public function settings(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.settings', compact('data'));
    }

    public function security(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.security', compact('data'));
    }

    public function activity(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.activity', compact('data'));
    }

    public function logs(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.logs', compact('data'));
    }
}
