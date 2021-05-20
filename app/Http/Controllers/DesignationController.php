<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Http\Requests\DesignationRequest;
class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['designations'] = Designation::orderBy("id","desc")->get();
        return view("setup.designation.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setup.designation.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("designation.index")->with("success","Designation save successfully. ");
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
        $data['designation'] = Designation::find($id);
        return view("setup.designation.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DesignationRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("designation.index")->with("success","Designation save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = Designation::destroy($id);
        if( $getProject){
            return redirect()->route("designation.index")->with("success","Designation deleted successfully. "); 
        }else{
            return redirect()->route("designation.index")->with("danger","Unable to delete leave designation. ");
        }
    }


    public function addUpdate($formData){

        $getProject = Designation::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            Designation::create($formData);
        }
    }

}
