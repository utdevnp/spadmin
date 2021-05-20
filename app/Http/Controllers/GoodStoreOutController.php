<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GoodStoreOutRequest;
use App\Models\GoodStoreOut;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use App\Models\ItemSetup;
use App\Models\ProjectSetup;
use App\Exports\GoodStoreOutExport;
use Excel;
use App\Models\Supplier;
class GoodStoreOutController extends Controller
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
        $data['goodstoreout'] = GoodStoreOut::get();
        return view("goodstoreout.list",$data);
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
        return view("goodstoreout.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodStoreOutRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
        $formData['user_id'] = Auth::id();
        $formData['invoice_date'] = 0;
        
        $this->addUpdate($formData);
        return redirect()->route("goodstoreout.index")->with("success","goodstoreout save successfully. ");
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
        $data['goodstoreout'] = GoodStoreOut::find($id);
        $data['staffs'] = Staff::StaffDesc();
        $data['items'] = ItemSetup::ActiveItems();
        $data['projects'] = ProjectSetup::ActiveProject();
        return view("goodstoreout.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodStoreOutRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
        $formData['invoice_date'] = 0;
        $formData['user_id'] = Auth::id();
        
        $this->addUpdate($formData);
        return redirect()->route("goodstoreout.index")->with("success","goodstoreout save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = GoodStoreOut::destroy($id);
        if( $getProject){
            return redirect()->route("goodstoreout.index")->with("success","Good Store out deleted successfully. "); 
        }else{
            return redirect()->route("goodstoreout.index")->with("danger","Unable to delete good store out. ");
        }
    }


    function goodstoreoutReport(Request $request){
        $data['report'] = GoodStoreOut::get();

      
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new GoodStoreOutExport, exportFileName("goodstoreout_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new GoodStoreOutExport, exportFileName("goodstoreout_info.csv"));
        }

        
        return view("goodstoreout.report",$data);
    }




    public function addUpdate($formData){

        $getProject = GoodStoreOut::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
           
            GoodStoreOut::create($formData);
        }

        $this->logSheet->logsheetEntry($formData);

    }

}
