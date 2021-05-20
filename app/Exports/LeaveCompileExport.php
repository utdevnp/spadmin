<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\LeaveTypeSetup;

class LeaveCompileExport implements FromView
{
    public function view(): View
    {
        return view('leavecalaulate.export', [
            'report' => Staff::StaffDesc(),
            "leaveType"=>LeaveTypeSetup::ActiveLeaveType()
        ]);
    }
}
