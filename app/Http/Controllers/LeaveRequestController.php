<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\LeaveTypeSetup;
use App\Models\ProjectSetup;
use App\Http\Requests\LeaveRequest;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use App\Notifications\LeaveStatus;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Excel;
use App\Exports\LeaveExport;
use App\Models\LeaveCalculate;
class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['leaves'] = Leave::AllLeave();
        return view("leave.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['leavetypes'] = LeaveTypeSetup::ActiveLeaveType();
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['staffs'] = Staff::ActiveStaff();
        $data['staffDetail'] = Staff::find(Auth::user()->staff_id);
        $data['leavecalcuate'] = LeaveCalculate::GetLeaveByUser(Auth::user()->id);
        return view("leave.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveRequest $request)
    {
        $formData = $request->all();
       // dd($formData);
        $formData['user_id'] = Auth::id();
        $formData['id'] = null;
      
        $insertid = $this->addUpdate($formData);
      
        $leave = Leave::find($insertid);
        
    
        User::find(UserId())->notify(new LeaveStatus ($leave));
    
       // LeaveStatus::notify(new LeaveStatus ($formData));
       // Notification::send(['utdevnp@bdamodar.com.np'], new LeaveStatus($formData));

        return redirect()->route("leave.index")->with("success","Leave requested successfully. ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['leave'] = Leave::find($id);
        $data['leavecalcuate'] = LeaveCalculate::GetLeaveByUser(Auth::user()->id);
        return view("leave.show",$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['leavetypes'] = LeaveTypeSetup::ActiveLeaveType();
        $data['projects'] = ProjectSetup::ActiveProject();
        $data['staffs'] = Staff::ActiveStaff();
        $data['leave'] = Leave::find($id);
        $data['staffDetail'] = Staff::find(Auth::user()->staff_id);
        $data['leavecalcuate'] = LeaveCalculate::GetLeaveByUser(Auth::user()->id);
        return view("leave.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveRequest $request, $id)
    {
        $formData = $request->all();
        $formData['user_id'] = Auth::id();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);

        User::find(UserId())->notify(new LeaveStatus ($formData));

        return redirect()->route("leave.index")->with("success","Leave request update successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = Leave::find($id);
      
        if($getProject->status == 'rejected'){

            $getProject->delete();

            if( $getProject){
                return redirect()->route("leave.index")->with("success","Leave deleted successfully. "); 
            }else{
                return redirect()->route("leave.index")->with("danger","Unable to delete leave . ");
            }
        }else{
            return redirect()->route("leave.index")->with("danger","Unable to delete leave. It only delete when reject . "); 
        }
       
    }


    function leaveReport(Request $request){
        $data['report'] = Leave::AllLeave();

   
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new LeaveExport, exportFileName("leave_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new LeaveExport, exportFileName("leave_info.csv"));
        }

        return view("leave.report",$data);
    }



    public function addUpdate($formData){

        $leave = Leave::find($formData['id']);

        if($leave){
            $leave->update($formData);
        }else{
            $data = Leave::create($formData);
            return $data->id;
        } 
    }

}
