<?php

namespace App\Http\Controllers\admin;

use File;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\AccountSetting;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function overview(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();

        return view('administrator.account.content.overview', compact('data'));
    }

    public function settings(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();
        $account_settings = AccountSetting::where('user_uuid', $uuid)->get()->toArray();
        
        $account_settings = array_column($account_settings, 'value', 'name');

        return view('administrator.account.content.settings', compact('data', 'account_settings'));
    }

    public function updateSettings(Request $request){
        $uuid = $request->uuid;
        $data = User::where('uuid', $uuid)->first();
        $updated = [
            'name' => $request->name
        ];

        if ($request->hasFile('avatar')) {
            if (isset($data->image)) {
                $imageBefore = $data->image;
                if (!empty($data->image)) {
                    $image_path = "./administrator/assets/media/accounts/" . $data->image;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }

            $image = $request->file('avatar');
            $fileName  =  'avatar-' . $data->name. '-' . time() . '.' . $image->getClientOriginalExtension();
            $path = upload_path('accounts') . $fileName;
            Image::make($image->getRealPath())->save($path, 100);
            $updated['image'] = $fileName;
        }

        $data->update($updated);
        return redirect(route('admin.account.settings',$uuid))->with('success', 'Successfuly updated data');
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
