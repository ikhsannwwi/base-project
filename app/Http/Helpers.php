<?php

use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\LogSystem;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Models\ModuleAccess;

function asset_administrator($url)
{
	return asset('administrator/' . $url);
}

function asset_frontpage($url)
{
	return asset('frontpage/' . $url);
}

function template_administrator($url)
{
	return asset('templateAdmin/' . $url);
}

function template_frontpage($url)
{
	return asset('templateFrontpage/public/' . $url);
}

function upload_path($type = '', $file = '')
{
	switch ($type) {
		case 'settings':
			$target_folder = 'settings';
			break;
		case 'accounts':
			$target_folder = 'accounts';
			break;
		default:
			$target_folder = '';
			break;
	}

	return Str::finish('administrator/assets/media/' . $target_folder, '/') . $file;
}

function img_src($image = '', $img_type = '')
{
	$file_notfound = 'media/notfound.jpg';

	if (filter_var($image, FILTER_VALIDATE_URL)) {
		return $image;
	} else {
		switch ($img_type) {
			case 'settings':
				$folder = '/settings/';
				break;
			case 'accounts':
				$folder = '/accounts/';
				break;
			default:
				$folder = '/';
				break;
		}
		$file = 'administrator/assets/media' . $folder . $image;
		//echo $file;
		if ($image === true) {
			return url('media' . $folder);
		} else if (file_exists($file) && !is_dir($file)) {
			return url($file);
		} elseif (file_exists($file_notfound)) {
			return url($file_notfound);
		} else {
			return asset_administrator('assets/media/default/image-broken.png');
		}
	}
}

function createLog($module, $action, $data_id,$data)
{
    $log['ip_address'] = request()->ip();
    $log['user_id'] = auth()->check() ? auth()->user()->id : 1;

    // Use Jenssegers/Agent to get device and browser information
    $agent = new Agent();
    $log['device'] = $agent->device();
    $log['browser_name'] = $agent->browser();
    $log['browser_version'] = $agent->version($log['browser_name']); // Add browser version

    $log['module'] = $module;
    $log['action'] = $action;
    $log['data_id'] = $data_id;
    $log['data'] = json_encode($data);;
    $log['created_at'] = now(); // Use Carbon for date and time

    LogSystem::create($log);
}

function isAllowed($modul, $modul_akses)
{
	if (!auth()->user()) {
		return false;
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->usergroup_id;
	$permission = getPermissionGroup($grup_pengguna_id);
	if ($grup_pengguna_id == 0) {
		return TRUE;
	} else {
		$group = UserGroup::find($grup_pengguna_id);

		if (!$group) {
			return false;
		}
        
        if ($group->status == 1) {
            $permission = getPermissionGroup($grup_pengguna_id);
            
            if ($permission[$grup_pengguna_id][$modul][$modul_akses] == 1) {
                return true; // Jika user group aktif dan memiliki izin, berikan akses
            }
        }
    }
    return false; // Default, jika tidak memenuhi syarat maka tidak diizinkan akses
	
}

function getDefaultPermission()
{
	$query = ModuleAccess::select(DB::raw("
    module_access.*,
    user_group_permission.usergroup_id,
    user_group_permission.status"))
		->leftJoin(
			DB::raw("user_group_permission"),
			function ($join) {
				$join->on('user_group_permission.module_access_id', '=', 'module_access.id');
			}
		);
	$data_akses = $query->get();
	$data_grup_pengguna = UserGroup::all();
	$permission = array();
	foreach ($data_grup_pengguna as $val) {
		foreach ($data_akses as $row) {
			$permission[$val->id][$row->module_id][$row->id] = 0;
		}
	}
	return $permission;
}

function getPermissionGroup($usergroup_id)
{
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifier as module_identifier,
    module_access.*,
    user_group_permission.usergroup_id,
    user_group_permission.status'))
		->leftJoin(
			DB::raw("user_group_permission"),
			function ($join) use ($usergroup_id) {
				$join->on('user_group_permission.module_access_id', '=', 'module_access.id')
                ->where("user_group_permission.usergroup_id", "=", $usergroup_id);
			}
		)
		->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
		->get();
	$permission = [];
	$index = 0;

	foreach ($data_akses as $row) {
		if ($row->status == "") {
			$status = 0;
		} else {
			$status = $row->status;
		}
		$permission[$usergroup_id][$row->module_identifier][$row->identifier] = $status;
	}
	$index++;

	return $permission;
}

function getPermissionGroup2($x)
{
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifier as module_identifier,
    module_access.*,
    user_group_permission.usergroup_id,
    user_group_permission.status'))
		->leftJoin(
			DB::raw("user_group_permission"),
			function ($join) use ($x) {
				$join->on('user_group_permission.module_access_id', '=', 'module_access.id')
                ->where("user_group_permission.usergroup_id", "=", $x);
			}
		)
		->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
		->get();
        // dd($x);
	$permission = [];
	$index = 0;
	foreach ($data_akses as $row) {
		if ($row->status == "") {
			$status = 0;
		} else {
			$status = $row->status;
		}
		$permission[$x][$row->module_identifier][$row->identifier] = $status;
	}
	$index++;
	return $permission;
}

function getPermissionModuleGroup()
{
	if (!auth()->user()) {
		return $permission = [];
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->usergroup_id;
	$data_akses = ModuleAccess::select(DB::raw('
    module.identifier as module_identifier, 
    COUNT(user_group_permission.id) as permission_given'))
		->leftJoin(
			DB::raw("user_group_permission"),
			function ($join) use ($grup_pengguna_id) {
				$join->on('user_group_permission.module_access_id', '=', 'module_access.id')
                ->where("user_group_permission.usergroup_id", "=", $grup_pengguna_id)
                ->where("user_group_permission.status", 1);
			}
		)
		->leftJoin(DB::raw("module"), "module.id", "=", "module_access.module_id")
		->groupBy("module.id")
		->get();

	$permission = [];
	$index = 0;

	foreach ($data_akses as $row) {
		if ($row->permission_given > 0) {
			$status = TRUE;
		} else {
			$status = FALSE;
		}
		$permission[$row->module_identifier] = $status;
	}
	$index++;

	return $permission;
}

function showModule($module, $permission_module)
{
	if (!auth()->user()) {
		return false;
	}
	$data_user = User::find(auth()->user()->id);
	$grup_pengguna_id = $data_user->usergroup_id;
	if ($grup_pengguna_id == 0) {
		return TRUE;
	} else {
		if (array_key_exists($module, $permission_module)) {
			return $permission_module[$module];
		} else {
			return FALSE;
		}
	}
}

if (! function_exists('generateUuid')) {
    function generateUuid()
    {
        return Uuid::uuid4()->toString();
    }
}
