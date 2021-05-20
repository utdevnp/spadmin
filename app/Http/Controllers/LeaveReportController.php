<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LeaveExport;
use App\Models\LeaveCalculate;
use App\Models\Staff;
use App\Models\LeaveTypeSetup;
use App\Exports\LeaveCompileExport;

class LeaveReportController extends Controller
{
    public function index(Request $request){

       // dd(Staff::StaffDesc());
        $data['report'] = Staff::StaffDesc();
        $data['leaveType'] = LeaveTypeSetup::ActiveLeaveType();
   
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new LeaveCompileExport, exportFileName("leave_compile_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new LeaveCompileExport, exportFileName("leave_compile_info.csv"));
        }

        return view("leavecalaulate.report",$data);
    }
}
