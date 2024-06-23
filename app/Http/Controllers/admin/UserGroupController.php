<?php

namespace App\Http\Controllers\admin;

use DB;
use DataTables;
use App\Models\Module;
use App\Models\UserGroup;
use Illuminate\Http\Request;
use App\Models\UserGroupPermission;
use App\Http\Controllers\Controller;

class UserGroupController extends Controller
{
    private static $module = 'user_groups';

    public function index(){
        return view('administrator.user_groups.index');
    }

    public function add(){
        $modules = Module::with("access")->get();

        return view('administrator.user_groups.add', compact('modules'));
    }

    public function getData(Request $request){
        $query = UserGroup::query();

        $data = $query->get();

        return DataTables::of($data)
            ->addColumn('status', function ($row) {
                if (isAllowed(static::$module, "status")) : //Check permission
                    if ($row->status) {
                        $status = '<div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input h-20px w-30px changeStatus" data-ix="' . $row->id . '" type="checkbox" value="1"
                            name="status" checked="checked" />
                        <label class="form-check-label fw-bold text-gray-400"
                            for="status"><span class="badge badge-success">Active</span></label>
                    </div>';
                    } else {
                        $status = '<div class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input h-20px w-30px changeStatus" data-ix="' . $row->id . '" type="checkbox" value="1"
                            name="status"/>
                            <label class="form-check-label fw-bold text-gray-400"
                            for="status"><span class="badge badge-danger">Inactive</span></label>
                            </div>';
                    }
                    return $status;
                endif;
            })
            ->addColumn('action', function ($row) {
                $btn = "";
                if (isAllowed(static::$module, "edit")) :
                    $btn .= '<a href="'.route('admin.user_groups.edit',$row->id).'" class="btn btn-light-primary btn-sm mx-1" title="Edit"><i class="fas fa-edit"></i></a>';
                endif;
                if (isAllowed(static::$module, "detail")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light btn-sm mx-1" title="Detail"><i class="fas fa-info-circle"></i></a>';
                endif;
                if (isAllowed(static::$module, "delete")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light-danger btn-sm delete mx-1" title="Delete"><i class="fas fa-trash"></i></a>';
                    endif;
                return $btn;
            })
            ->rawColumns(['status','action'])
            ->make(true);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        DB::beginTransaction();
        try {
            $data = UserGroup::create([
                'name' => $request->name,
                'status' => $request->status ? 1 : 0,
                'created_by' => auth()->user() ? auth()->user()->id : '',
            ]);
    
            foreach ($request->access as $key => $value) {
                if (array_key_exists("module_access", $value)) {
                    foreach ($value['module_access'] as $module_access => $status) {
                        $permission = UserGroupPermission::create([
                            'usergroup_id' => $data->id,
                            'module_access_id' => $module_access,
                            'status' => $status,
                            'created_by' => auth()->user() ? auth()->user()->id : '',
                        ]);
                    }
                }
            }
            
            createLog(static::$module, __FUNCTION__, $data->id, ['Saved Data' => ['Data' => $data, 'Permission' => getPermissionGroup($data->id)]]);
            DB::commit();
            return redirect()->route('admin.user_groups')->with('success', 'Data saved successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit($id){
        $data = UserGroup::find($id);
        $modules = Module::with("access")->get();
        $permission = getPermissionGroup($id);

        return view('administrator.user_groups.edit', compact('data', 'modules', 'permission'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required'
        ]);

        $id = $request->id;
        $data = UserGroup::find($id);
        $oldData = $data->toArray();
        $oldPermissions = getPermissionGroup($data->id);

        DB::beginTransaction();

        try {
            $data->update([
                'name' => $request->name,
                'status' => $request->status ? 1 : 0,
                'updated_by' => auth()->id() ?: '',
            ]);

            $permission_group = getDefaultPermission()[$id];

            foreach ($request->access as $row) {
                if (isset($row["module_access"])) {
                    foreach ($row["module_access"] as $key => $value) {
                        $permission_group[$row['modul_id']][$key] = $value;
                    }
                }

                if (isset($permission_group[$row['modul_id']])) {
                    foreach ($permission_group[$row['modul_id']] as $modul_akses => $status) {
                        $permissionData = [
                            "usergroup_id" => $id,
                            "module_access_id" => $modul_akses,
                        ];
                        $content = array_merge($permissionData, [
                            "status" => $status,
                            'updated_by' => auth()->id() ?: '',
                        ]);

                        $is_exist = UserGroupPermission::where($permissionData)->exists();
                        UserGroupPermission::updateOrCreate($permissionData, $content);
                    }
                }
            }

            DB::commit();

            $newData = UserGroup::find($id)->toArray();
            $newPermissions = getPermissionGroup($data->id);

            createLog(static::$module, __FUNCTION__, $data->id, [
                'Updated Data' => [
                    ['Old Data' => $oldData, 'New Data' => $newData,],
                    ['Old Permissions' => $oldPermissions, 'New Permissions' => $newPermissions]
                ]
            ]);

            return redirect()->route('admin.user_groups')->with('success', 'Data updated successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request){
        $data = UserGroup::find($request->id);
        $permission = UserGroupPermission::where('usergroup_id', $data->id)->get();

        DB::beginTransaction();
        try {
            createLog(static::$module, __FUNCTION__, $data->id, ['Deleted Data' => ['Data' => $data, 'Permission' => $permission]]);
            foreach ($permission as $row) {
                $destroy = $row->delete();
            }
            $destroy = $data->delete();
            DB::commit();
            
            $response = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Data deleted successfully',
                'data' => $data
            ];
            
            return $response;
        } catch (\Throwable $th) {
            DB::rollback();
            $response = [
                'code' => $th->getCode(),
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $data
            ];
    
            return $response;
        }
    }

    public function checkName(Request $request)
    {
        $name = $request->input('name');
        $isRegistered = UserGroup::where('name', $name)->exists();

        return response()->json(['registered' => $isRegistered]);
    }
}
