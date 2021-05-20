<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProjectSetup;
use App\Http\Requests\ProjectSetupRequest;
use Illuminate\Support\Facades\Redirect;

class ProjectSetupController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects']  = ProjectSetup::orderBy("id",'desc')->get();
        return view("setup.project.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setup.project.addupdate");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectSetupRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
       return redirect()->route("projectsetup.index")->with("success","Project save successfully. ");
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
        $data['project']  = ProjectSetup::find($id);
        return view("setup.project.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectSetupRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("projectsetup.index")->with("success","Project save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = ProjectSetup::destroy($id);
        if( $getProject){
            return redirect()->route("projectsetup.index")->with("success","Project deleted successfully. "); 
        }else{
            return redirect()->route("projectsetup.index")->with("danger","Unable to delete project. ");
        }
    }


    public function addUpdate($formData){

        $getProject = ProjectSetup::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            ProjectSetup::create($formData);
        }

       
    }
}
