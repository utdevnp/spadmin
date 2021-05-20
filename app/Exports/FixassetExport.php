<?php

namespace App\Exports;

use App\Models\Fixasset;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FixassetExport implements FromView
{
    public function view(): View
    {
        return view('fixasset.exportexcel', [
            'report' => Fixasset::get()
        ]);
    }
}
