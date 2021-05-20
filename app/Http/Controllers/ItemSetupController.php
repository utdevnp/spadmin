<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemSetupRequest;
use App\Models\ItemSetup;
use App\Models\CategorySetup;
class ItemSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = ItemSetup::get();
        return view("setup.item.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']  = CategorySetup::ActiveCategory();
        return view("setup.item.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemSetupRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("itemsetup.index")->with("success","Item description save successfully. ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['itemsetup'] = ItemSetup::find($id);
        $data['categories']  = CategorySetup::ActiveCategory();
        return view("setup.item.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemSetupRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("itemsetup.index")->with("success","Item description save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = ItemSetup::destroy($id);
        if( $getProject){
            return redirect()->route("itemsetup.index")->with("success","Itemsetup deleted successfully. "); 
        }else{
            return redirect()->route("itemsetup.index")->with("danger","Unable to delete itemsetup. ");
        }
    }


    public function addUpdate($formData){

        $getProject = ItemSetup::find($formData['id']);

        if($getProject){
            $getProject->update($formData);
        }else{
            ItemSetup::create($formData);
        }
    }

}
