<?php

namespace App\Exports;

use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\LeaveTypeSetup;


class StaffExport implements FromView
{

    public function properties(): array
    {
        return [
            'title' => 'Smarddha pahad',
            'description'=>"Smarddha pahad staff list"
        ];
    }


    public function view(): View
    {
        return view('staff.exportexcel', [
            'staffs' => Staff::StaffDesc(),
           'leaveType'=> LeaveTypeSetup::ActiveLeaveType()
        ]);
    }
    
}
