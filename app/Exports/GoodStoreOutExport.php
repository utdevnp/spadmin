<?php

namespace App\Exports;

use App\Models\GoodStoreOut;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GoodStoreOutExport implements FromView
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('goodstoreout.exportexcel', [
            'report' => GoodStoreOut::get()
        ]);
    }
}
