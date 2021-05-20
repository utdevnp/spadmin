<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StaffRequest;
use App\Models\Staff;
use App\Models\ProjectSetup;
use App\Models\Designation;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Exports\StaffExport;
use Excel;
use Illuminate\Support\Facades\Storage;
use App\Models\LeaveCalculate;
use App\Models\LeaveTypeSetup;
use App\Models\FiscalYear;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['staffs'] = Staff::StaffDesc();
        return view("staff.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['fiscal_year'] = FiscalYear::FiscalYear();
        $data['designations']  = Designation::ActiveDesignation();
        return view("staff.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StaffRequest $request)
    {
        $request->validated();
        $formData = $request->all();
        $formData['id'] = null;
        
        $this->addUpdate($formData);
       return redirect()->route("staff.index")->with("success","Staff save successfully. ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['staff'] = Staff::find($id);
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['fiscal_year'] = Staff::FiscalYear();
        $data['designations']  = Designation::ActiveDesignation();
        $data['leavecalcuate'] = LeaveCalculate::GetLeaveByUser(staffUserId($id));
        return view("staff.show",$data);
    }


    public function document($document){

       

        $data['id'] = $document;
        return view("staff.document",$data);
    }

    public function documentDownload(Request $request, $id){

        $validated = $request->validate([
            'document' => 'required|exist:documents,id',
        ]);

        if ($validated->fails()) {
            return route("staff.index")->with("danger",$validated->document);
        }
       

        $data = Document::find($id);
        return Storage::disk('staff_file')->download($data->file_name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['staff'] = Staff::find($id);
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['fiscal_year'] = FiscalYear::FiscalYear();
        $data['designations']  = Designation::ActiveDesignation();
        return view("staff.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StaffRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
       return redirect()->route("staff.index")->with("success","Staff save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Staff::find($id)->staff_document > 0){
            return redirect()->route("staff.index")->with("danger","Staff document not deleted yet.");
        }else{
            $getProject = Staff::destroy($id);

            if( $getProject){
                return redirect()->route("staff.index")->with("success","Staff deleted successfully. "); 
            }else{
                return redirect()->route("staff.index")->with("danger","Unable to delete staff. ");
            }
        }

      
        // check document 

      

        if( $getProject){
            return redirect()->route("staff.index")->with("success","Staff deleted successfully. "); 
        }else{
            return redirect()->route("staff.index")->with("danger","Unable to delete staff. ");
        }
    }

    public function addUpdate($formData){

        $getProject = Staff::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
           
            Staff::create($formData);
        }
    }


    function staffReport(Request $request){
        $data['staffs'] = Staff::StaffDesc();
        $data['leaveType'] = LeaveTypeSetup::ActiveLeaveType();
        
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new StaffExport, exportFileName("staff_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new StaffExport, exportFileName("staff_info.csv"));
        }
        return view("staff.report",$data);
    }


    function setting(){
        $staff_id = Auth::user()->staff_id;
        $data['staff'] = Staff::find($staff_id);
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['fiscal_year'] = Staff::FiscalYear();
        $data['designations']  = Designation::ActiveDesignation();
        return view("staff.setting",$data);
    }

}
