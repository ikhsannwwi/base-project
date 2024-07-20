<?php

namespace App\Http\Controllers\admin;

use DB;
use DataTables;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private static $module = "user";

    public function index(){
        if (!isAllowed(static::$module, "view")) {
            abort(403);
        }

        return view('administrator.users.index');
    }
    
    public function getData(Request $request){
        $query = User::query()->with('user_group');

        if (isset($request->status) || isset($request->usergroup)) {
            if ($request->status != "") {
                $status = $request->status;
                $query->where("status", $status);
            }
            
            if ($request->usergroup != "") {
                $usergroupid = $request->usergroup ;
                $query->where("usergroup_id", $usergroupid);
            }
        }

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
                    $btn .= '<a href="'.route('admin.users.edit',$row->id).'" class="btn btn-light-primary btn-sm mx-1" title="Edit"><i class="fas fa-edit"></i></a>';
                endif;
                if (isAllowed(static::$module, "detail")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light btn-sm mx-1" title="Detail" data-bs-toggle="modal" data-bs-target="#detail"><i class="fas fa-info-circle"></i></a>';
                endif;
                if (isAllowed(static::$module, "delete")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light-danger btn-sm delete mx-1" title="Delete"><i class="fas fa-trash"></i></a>';
                    endif;
                return $btn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    
    public function add(){
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        return view('administrator.users.add');
    }
    
    public function store(Request $request){
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'telephone' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8|same:password',
            'user_group' => 'required',
            'status' => 'required',
        ]);
    
        $data = User::create([
            'uuid' => generateUuid(),
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'usergroup_id' => $request->user_group,
            'status' => $request->status,
            'remember_token' => Str::random(60),
        ]);
    
        createLog(static::$module, __FUNCTION__, $data->id, ['Saved Data' => $data]);
        return redirect()->route('admin.users')->with('success', 'Data saved successfully.');
    }
    
    public function edit($id){
        if (!isAllowed(static::$module, "edit")) {
            abort(403);
        }

        $data = User::find($id);

        if ($data->usergroup_id === 0 && auth()->user()->email != $data->email) {
            return redirect()->route('admin.users')->with('warning', 'Forbidden.');
        }

        return view('administrator.users.edit',compact('data'));
    }

    public function update(Request $request){
        if (!isAllowed(static::$module, "add")) {
            abort(403);
        }

        $id = $request->id;
        $data = User::find($id);

        $rules = [
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'user_group' => 'required',
        ];

        if ($request->password) {
            $rules['password'] = 'required|min:8';
            $rules['password_confirmation'] = 'required|min:8|same:password';
        }

        $request->validate($rules);

        $oldData = $data->toArray();

        $updates = [
            // 'uuid' => generateUuid(),
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'usergroup_id' => $request->user_group,
            'status' => $request->status,
            'remember_token' => Str::random(60),
        ];

        if ($request->password) {
            $updates['password'] = Hash::make($request->password);
        }

        $newData = array_intersect_key($updates, $data->getOriginal());
        $data->update($updates);

        createLog(static::$module, __FUNCTION__, $data->id, ['Updated Data' => ['Old Data' => $oldData, 'New Data' => $newData]]);
        return redirect()->route('admin.users')->with('success', 'Data updated successfully.');
    }
    
    
    public function getDataUserGroup(){
        $datas = UserGroup::select('id', 'name')->get()->toArray();
    
        $data = $datas;
    
        if (auth()->user()->usergroup_id === 0) {
            $moderator = [
                'id' => 0,
                'name' => 'Moderator'
            ];
    
            $data = array_merge([$moderator], $datas);
        }

        return DataTables::of($data)
            ->make(true);
    }
    
    public function checkEmail(Request $request)
    {
        $email = $request->input('email');
        $query = User::where('email', $email);
        $data = $query->where('id', '!=', $request->id);
        $isRegistered = $data->exists();

        return response()->json(['registered' => $isRegistered]);
    }
    
    public function checkTelephone(Request $request)
    {
        $telephone = $request->input('telephone');
        $query = User::where('telephone', $telephone);
        $data = $query->where('id', '!=', $request->id);
        $isRegistered = $data->exists();

        return response()->json(['registered' => $isRegistered]);
    }

    public function getDetail(Request $request){
        
        try {
            $data = User::with('user_group')->find($request->id);

            $response = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Data successfully',
                'data' => $data,
            ];
        } catch (\Throwable $th) {
            $response = [
                'code' => $th->getCode(),
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ];
        }
        return $response;
    }

    public function changeStatus(Request $request)
    {
        if (!isAllowed(static::$module, "status")) {
            abort(403);
        }
        
        $id = $request->ix;
        $status = $request->status == "Active" ? 1 : 0;

        try {
            DB::beginTransaction();
            
            $data = User::findOrFail($id);
            $data->update(['status' => $status]);
            
            createLog(static::$module, __FUNCTION__, $id, ['Updated Status' => $data]);
            
            DB::commit();

            $response = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Status updated successfully',
                'data' => $data
            ];
        } catch (\Throwable $th) {
            DB::rollback();

            $response = [
                'code' => $th->getCode(),
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ];
        }

        return $response;
    }
}
