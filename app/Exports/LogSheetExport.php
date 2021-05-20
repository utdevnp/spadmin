<?php

namespace App\Exports;

use App\Models\LogSheet;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\LeaveTypeSetup;

class LogSheetExport implements FromView
{
    public function view(): View
    {


        return view('logsheet.export', [
            'report' => LogSheet::get(),
        ]);
    }
}
