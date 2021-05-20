<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NameChartSetup;
use App\Http\Requests\NameChartSetupRequest;

class NameChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['namecharts'] = NameChartSetup::get();
        return view("setup.namechart.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setup.namechart.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NameChartSetupRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("namechart.index")->with("success","Name chart save successfully. ");
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
        $data['namechart'] = NameChartSetup::find($id);
        return view("setup.namechart.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NameChartSetupRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("namechart.index")->with("success","Name chart save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = NameChartSetup::destroy($id);
        if( $getProject){
            return redirect()->route("namechart.index")->with("success","Namechart deleted successfully. "); 
        }else{
            return redirect()->route("namechart.index")->with("danger","Unable to delete namechart. ");
        }
    }


    public function addUpdate($formData){

        $getProject = NameChartSetup::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            NameChartSetup::create($formData);
        }
    }
}
