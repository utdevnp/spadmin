<?php

namespace App\Exports;

use App\Models\GoodReceipt;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GoodreciptExport implements FromView
{
    public function view(): View
    {
        return view('goodreceipt.exportexcel', [
            'report' => GoodReceipt::get()
        ]);
    }
}
