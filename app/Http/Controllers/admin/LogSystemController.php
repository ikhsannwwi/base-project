<?php

namespace App\Http\Controllers\admin;

use DataTables;
use App\Models\User;
use App\Models\Module;
use App\Models\LogSystem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogSystemController extends Controller
{
    private static $module = "log_system";

    public function index(){
        if (!isAllowed(static::$module, "view")) {
            abort(403);
        }

        return view('administrator.log_systems.index');
    }
    
    public function getData(Request $request){
        $query = LogSystem::query()->with('user');

        if (isset($request->date) || isset($request->user) || isset($request->module)) {
            if (!empty($request->date)) {
                $dateRange = explode(' to ', $request->date);
                if (count($dateRange) === 2) {
                    $dateStart = $dateRange[0];
                    $dateEnd = $dateRange[1];
                    $query->whereBetween('created_at', [$dateStart, $dateEnd]);
                }
            }
            
            if ($request->user != "") {
                $userid = $request->user ;
                $query->where("user_id", $userid);
            }
            
            if ($request->module != "") {
                $moduleid = $request->module;
                $module = Module::select('identifier')->where('id', $moduleid)->first();
                $query->where("module", $module->identifier);
            }
        }

        $data = $query->get();

        return DataTables::of($data)
            ->addColumn('detail', function ($row) {
                $btn = "";
                if (isAllowed(static::$module, "detail")) :
                    $btn .= '<a href="#" data-id="' . $row->id . '" class="btn btn-light btn-sm mx-1" title="Detail" data-bs-toggle="modal" data-bs-target="#detail"><i class="fas fa-info-circle"></i></a>';
                endif;
                return $btn;
            })
            ->rawColumns(['detail'])
            ->make(true);
    }
    
    public function getDetail(Request $request){
        
        try {
            $data = LogSystem::with('user')->find($request->id);

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

    public function getDataUser(){
        $datas = User::with('user_group')->get()->toArray();
    
        $data = $datas;

        return DataTables::of($data)
            ->make(true);
    }

    public function getDataModule(){
        $datas = Module::select('id', 'identifier', 'name')->get()->toArray();
    
        $data = $datas;

        return DataTables::of($data)
            ->make(true);
    }
}
