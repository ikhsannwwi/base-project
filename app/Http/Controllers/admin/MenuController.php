<?php

namespace App\Http\Controllers\admin;

use DB;
use DataTables;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private static $module = 'menu';

    public function index(){
        return view('administrator.menus.index');
    }

    public function getData(Request $request){
        $query = Menu::query()->orderBy('row_order', 'asc');

        if ($request->status != "") {
            $status = $request->status;
            $query->where("status", $status);
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
                    $btn .= '<a href="'.route('admin.menus.edit',$row->id).'" class="btn btn-light-primary btn-sm mx-1" title="Edit"><i class="fas fa-edit"></i></a>';
                endif;
                // if (isAllowed(static::$module, "detail")) :
                    // $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-secondary btn-sm mx-1" title="Detail"><i class="fas fa-info-circle"></i></a>';
                // endif;
                if (isAllowed(static::$module, "delete")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light-danger btn-sm delete mx-1" title="Delete"><i class="fas fa-trash"></i></a>';
                    endif;
                return $btn;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
    
    public function add(){
        return view('administrator.menus.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $data = Menu::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'status' => $request->status ? 1 : 0,
            'created_by' => auth()->id() ?: 0
        ]);

        createLog(static::$module, __FUNCTION__, $data->id, ['Saved Data' => $data]);
        return redirect(route('admin.menus'))->with('success', 'Data saved successfully.');
    }

    public function edit($id){
        $data = Menu::find($id);

        return view('administrator.menus.edit', compact('data'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $id = $request->id;
        $data = Menu::find($id);
        
        $data->update([
            'name' => $request->name,
            'icon' => $request->icon,
            'status' => $request->status ? 1 : 0,
            'updated_by' => auth()->id() ?: 0
        ]);

        createLog(static::$module, __FUNCTION__, $data->id, ['Updated Data' => $data]);
        return redirect(route('admin.menus'))->with('success', 'Data updated successfully.');
    }

    public function destroy(Request $request){
        $data = Menu::find($request->id);

        DB::beginTransaction();
        try {
            createLog(static::$module, __FUNCTION__, $data->id, ['Deleted Data' => $data]);
            $destroy = $data->delete();
            DB::commit();
            
            $response = [
                'code' => 200,
                'status' => 'success',
                'message' => 'Data deleted successfully',
                'data' => $data
            ];
            
        } catch (\Throwable $th) {
            DB::rollback();
            $response = [
                'code' => $th->getCode(),
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $data
            ];
    
        }
        return $response;
    }

    public function updateRowOrder(Request $request){
        $id = $request->id;
        $data = Menu::find($id);
        
        $data->update([
            'row_order' => $request->row_order,
        ]);

        createLog(static::$module, __FUNCTION__, $data->id, ['Updated Data' => $data]);
        $response = [
            'code' => 200,
            'status' => 'success',
            'message' => 'Data updated successfully',
            'data' => $data
        ];
        
        return $response;
    }
}
