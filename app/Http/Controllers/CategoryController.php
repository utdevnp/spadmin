<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorySetup;
use App\Http\Requests\CategoryRequest;
use App\Models\NameChartSetup;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = CategorySetup::get();
        return view("setup.category.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['namecharts']  = NameChartSetup::ActiveNameChart();
        return view("setup.category.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("category.index")->with("success","Category save successfully. ");
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
        $data['category'] = CategorySetup::find($id);
        $data['namecharts']  = NameChartSetup::ActiveNameChart();
        return view("setup.category.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("category.index")->with("success","Category save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = CategorySetup::destroy($id);
        if( $getProject){
            return redirect()->route("category.index")->with("success","Category deleted successfully. "); 
        }else{
            return redirect()->route("category.index")->with("danger","Unable to delete category. ");
        }
    }



    public function addUpdate($formData){

        $getProject = CategorySetup::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            CategorySetup::create($formData);
        }
    }
}
