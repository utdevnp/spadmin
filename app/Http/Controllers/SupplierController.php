<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $data['suppliers'] = Supplier::AllActive();
        return view("setup.supplier.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("setup.supplier.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $formData = $request->all();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("supplier.index")->with("success","Supplier save successfully.");
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
        $data['supplier'] = Supplier::find($id);
        return view("setup.supplier.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, $id)
    {
        $formData = $request->all();
        $formData['id'] = $id;
      
        $this->addUpdate($formData);
        return redirect()->route("supplier.index")->with("success","Supplier save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = Supplier::destroy($id);
        if( $getProject){
            return redirect()->route("supplier.index")->with("success","Suppplier deleted successfully. "); 
        }else{
            return redirect()->route("supplier.index")->with("danger","Unable to delete leave suppplier. ");
        }
    }

    function addUpdate($formData){
        $find = Supplier::find($formData['id']);
        if($find){
            $find->update($formData);
        }else{
            Supplier::create($formData);
        } 
    }


}
