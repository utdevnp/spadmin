<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LeaveTypeRequest;
use App\Models\LeaveTypeSetup;
class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['leavetypes'] = LeaveTypeSetup::GetAll();
        return view("setup.leavetype.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setup.leavetype.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveTypeRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("leavetype.index")->with("success","Leave type save successfully. ");
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
        $data['leavetype'] = LeaveTypeSetup::find($id);
        return view("setup.leavetype.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveTypeRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("leavetype.index")->with("success","Leave type save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = LeaveTypeSetup::destroy($id);
        if( $getProject){
            return redirect()->route("leavetype.index")->with("success","Leave type deleted successfully. "); 
        }else{
            return redirect()->route("leavetype.index")->with("danger","Unable to delete leave type. ");
        }
    }


    public function addUpdate($formData){

        $getProject = LeaveTypeSetup::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            LeaveTypeSetup::create($formData);
        } 
    }

}
