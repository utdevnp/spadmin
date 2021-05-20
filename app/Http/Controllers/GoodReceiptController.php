<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GoodReceiptRequest;
use App\Models\GoodReceipt;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectSetup;
use App\Models\ItemSetup;
use Excel;
use App\Exports\GoodreciptExport;
use App\Models\LogSheet;
use App\Models\Supplier;
class GoodReceiptController extends Controller
{

    function __construct(LogSheetController $logSheet){
        $this->logSheet = $logSheet;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['goodreceipt'] = GoodReceipt::get();
        return view("goodreceipt.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['staffs'] = Staff::StaffDesc();
        $data['items'] = ItemSetup::ActiveItems();
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['suppliers'] = Supplier::AllActive();
        return view("goodreceipt.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodReceiptRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
        $formData['user_id'] = Auth::id();
        
        $this->addUpdate($formData);
       return redirect()->route("goodreceipt.index")->with("success","goodreceipt save successfully. ");
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
        $data['goodreceipt'] = GoodReceipt::find($id);
        $data['staffs'] = Staff::StaffDesc();
        $data['items'] = ItemSetup::ActiveItems();
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['suppliers'] = Supplier::AllActive();
        return view("goodreceipt.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodReceiptRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
        
        $this->addUpdate($formData);
       return redirect()->route("goodreceipt.index")->with("success","goodreceipt save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = GoodReceipt::destroy($id);
        if( $getProject){
            return redirect()->route("goodreceipt.index")->with("success","Good receipt deleted successfully. "); 
        }else{
            return redirect()->route("goodreceipt.index")->with("danger","Unable to delete good receipt. ");
        }
    }


    function goodreceiptReport(Request $request){
        $data['report'] = GoodReceipt::get();

    
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new GoodreciptExport, exportFileName("goodreceipt_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new GoodreciptExport, exportFileName("goodreceipt_info.csv"));
        }

        return view("goodreceipt.report",$data);
    }


    public function addUpdate($formData){

        $getProject = GoodReceipt::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{

            GoodReceipt::create($formData);
        }

        $this->logSheet->logsheetEntry($formData);
    }

}
