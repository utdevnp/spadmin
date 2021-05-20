<?php

namespace App\Http\Controllers;

use App\Exports\LogSheetExport;
use App\Models\GoodReceipt;
use App\Models\GoodStoreOut;
use App\Models\LogSheet;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LogSheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['report'] = LogSheet::get();

      
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new LogSheetExport, exportFileName("logsheet_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new LogSheetExport, exportFileName("logsheet_info.csv"));
        }

        return view("logsheet.report",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    function logsheetEntry($formData){

        $getSheet = LogSheet::where([
            "project_id"=>$formData['project_id'],
            "item_id"=>$formData['item_name'],
        ])->get();
        
        if(count($getSheet)>0){
            // update
            LogSheet::where([
                "project_id"=>$formData['project_id'],
                "item_id"=>$formData['item_name'],
            ])
            ->update([
                "store_in"=>$this->storeInBalance($formData),
                "store_out"=>$this->storeOutBalance($formData),
                "blance"=>$this->blanceRegister($this->storeInBalance($formData),$this->storeOutBalance($formData))
                ]);
        }else{
            // entry
            LogSheet::create([
                "project_id"=>$formData['project_id'],
                "item_id"=>$formData['item_name'],
                "store_in"=>$this->storeInBalance($formData),
                "store_out"=>$this->storeOutBalance($formData),
                "blance"=>$this->blanceRegister($this->storeInBalance($formData),$this->storeOutBalance($formData))
            ]);
        }

       
    }

    function storeInBalance($formData){
      return GoodReceipt::SumUnit($formData);
    }

    function storeOutBalance($formData){
        return GoodStoreOut::SumUnit($formData);
    }


    function blanceRegister($in,$out){
        return (int) $in - (int) $out;
    }
}



