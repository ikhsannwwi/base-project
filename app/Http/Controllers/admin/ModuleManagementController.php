<?php

namespace App\Http\Controllers\admin;

use DB;
use DataTables;
use App\Models\Menu;
use App\Models\Module;
use Illuminate\Support\Str;
use App\Models\ModuleAccess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleManagementController extends Controller
{
    private static $module = 'module';

    public function index(){
        return view('administrator.modules.index');
    }

    public function getData(Request $request){
        $query = Module::query()->orderBy('menu_id', 'asc')->orderBy('row_order', 'asc');

        return DataTables::of($query)
            ->addColumn('action', function ($row) {
                $btn = "";
                if (isAllowed(static::$module, "edit")) :
                    $btn .= '<a href="'.route('admin.module_managements.edit',$row->id).'" class="btn btn-light-primary btn-sm mx-1" title="Edit"><i class="fas fa-edit"></i></a>';
                endif;
                if (isAllowed(static::$module, "detail")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light btn-sm mx-1" title="Detail"><i class="fas fa-info-circle"></i></a>';
                endif;
                if (isAllowed(static::$module, "delete")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light-danger btn-sm delete mx-1" title="Delete"><i class="fas fa-trash"></i></a>';
                    endif;
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    public function add(){
        $menus = Menu::all();
        
        return view('administrator.modules.add', compact('menus'));
    }

    public function store(Request $request){
        $request->validate([
            'menu' => 'string',
            'name' => 'required|string',
            'identifier' => 'required|string',
            'url' => 'required|string',
            'module_access.*.type' => 'required|string',
            'module_access.*.code' => 'required_if:module_access.*.type,standar_elements|string',
            'module_access.*.code' => 'required_if:module_access.*.type,other_elements|string',
        ]);

        DB::beginTransaction();
        try {
            $module = Module::Create([
                'menu_id' => $request->menu_id ? $request->menu_id : 0,
                'url' => $request->url,
                'icon' => $request->icon ? $request->icon : '',
                'name' => Str::ucfirst($request->name),
                'identifier' => Str::lower($request->identifier),
            ]);
    
            foreach ($request->input('module_access') as $moduleAccess) {
                $module->access()->create([
                    'module_id' => $module->id,
                    'name' => Str::ucfirst($moduleAccess['code']),
                    'identifier' => Str::lower($moduleAccess['code']),
                ]);
            }
    
            $module_access = ModuleAccess::where('module_id',$module->id)->get();
            
            createLog(static::$module, __FUNCTION__, $module->id, ['Saved Data' => ['Module' => $module, 'Module Access' => $module_access]]);
            DB::commit();
            return redirect()->route('admin.module_managements')->with('success', 'Data saved successfully.');
            
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
        }
    }

    public function edit($id){
        $menus = Menu::all();

        $data = Module::with('access')->find($id);
        // dd($data);

        return view('administrator.modules.edit', compact('menus','data'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'menu' => 'string',
            'name' => 'required|string',
            'identifier' => 'required|string',
            'url' => 'required|string',
            'module_access.*.type' => 'required|string',
        ]);

        $id = $request->id;
        $data = Module::find($id);

        if (!$data) {
            return redirect()->route('admin.module_managements')->with('error', 'Module not found.');
        }
        $log_module_before = $data;

        $module_access = ModuleAccess::where('module_id', $data->id)->get();
        $log_module_access_after = $module_access;

        DB::beginTransaction();
        try {
            $data->update([
                'menu_id' => $request->menu_id ? $request->menu_id : 0,
                'url' => $request->url,
                'icon' => $request->icon ? $request->icon : '',
                'name' => Str::ucfirst($request->name),
                'identifier' => Str::lower($request->identifier),
            ]);
    
            foreach ($request->module_access as $index => $modulAkses) {
    
                if ($modulAkses['id'] !== null) {
                    $module_access = ModuleAccess::find(($modulAkses['id']));
                    $module_access->update([
                        'module_id' => $data->id,
                        'name' => Str::ucfirst($modulAkses['type'] === 'standar_elements' ? $modulAkses['code_select'] : $modulAkses['code_input']),
                        'identifier' => Str::lower($modulAkses['type'] === 'standar_elements' ? $modulAkses['code_select'] : $modulAkses['code_input']),
                    ]);
                }else {
                    $data->access()->create([
                        'module_id' => $data->id,
                        'name' => Str::ucfirst($modulAkses['type'] === 'standar_elements' ? $modulAkses['code_select'] : $modulAkses['code_input']),
                        'identifier' => Str::lower($modulAkses['type'] === 'standar_elements' ? $modulAkses['code_select'] : $modulAkses['code_input']),
                    ]);
                }
            }
            
            $log_module_access = ModuleAccess::where('module_id', $data->id)->get();
            
            createLog(static::$module, __FUNCTION__, $data->id, [
                'Data before updated' => ['Modules' => $log_module_before, 'Module Access' => $log_module_access_after],
                'Data after updated' => ['Modules' => $data, 'Module Access' => $log_module_access],
            ]);
            
            DB::commit();
            return redirect()->route('admin.module_managements')->with('success', 'Data updated successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Request $request){
        $data = Module::with('access')->find($request->id);

        DB::beginTransaction();
        try {
            createLog(static::$module, __FUNCTION__, $data->id, ['Deleted Data' => ['Module' => $data, 'Module Access' => $data->access()]]);
            $destroy = $data->access()->delete();
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

    public function destroyAccess(Request $request){
        $data = ModuleAccess::find($request->id);

        DB::beginTransaction();
        try {
            $destroy = $data->delete();
            createLog(static::$module, __FUNCTION__, $data->id, ['Deleted Data' => $data]);
            
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

    public function updateRowOrder(Request $request){
        $id = $request->id;
        $data = Module::find($id);
        
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
