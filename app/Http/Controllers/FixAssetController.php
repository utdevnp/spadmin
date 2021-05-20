<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FixAsset;
use App\Http\Requests\FixAssetRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Staff;
use App\Models\CategorySetup;
use App\Models\NameChartSetup;
use App\Exports\FixassetExport;
use Excel;
use App\Models\Supplier;
class FixAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fixassets'] = FixAsset::get();
        return view("fixasset.list",$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['asset_contions'] = FixAsset::AssetCondition();
        $data['asset_location'] = FixAsset::AssetLocation();
        $data['suppliers'] = Supplier::AllActive();
        $data['staffs'] = Staff::StaffDesc();
        return view("fixasset.add",$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FixAssetRequest $request)
    {
        $formData = $request->all();
       // dd($formData);
        $formData['user_id'] = Auth::id();
        $formData['id'] = null;
      
        $this->addUpdate($formData);
        return redirect()->route("fixasset.index")->with("success","Fix assets save successfully. ");
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
        $data['fixasset'] = FixAsset::find($id);
        $data['asset_contions'] = FixAsset::AssetCondition();
        $data['asset_location'] = FixAsset::AssetLocation();
        $data['staffs'] = Staff::StaffDesc();
        $data['suppliers'] = Supplier::AllActive();
        return view("fixasset.edit",$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FixAssetRequest $request, $id)
    {
        $formData = $request->all();
        // dd($formData);
        $formData['user_id'] = Auth::id();
        $formData['id'] = $id;
    
        $this->addUpdate($formData);
        return redirect()->route("fixasset.index")->with("success","Fix assets save successfully. ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $getProject = FixAsset::destroy($id);
        if( $getProject){
            return redirect()->route("fixasset.index")->with("success","Fixasset deleted successfully. "); 
        }else{
            return redirect()->route("fixasset.index")->with("danger","Unable to delete fixasset. ");
        }
    }


    function fixassetReport(Request $request){
        $data['report'] = FixAsset::get();

     
        ob_start();
        if($request->query("export") =="excel"){
            return Excel::download(new FixassetExport, exportFileName("fixasset_info.xlsx"));
        }
        if($request->query("export") =="csv"){
            return Excel::download(new FixassetExport, exportFileName("fixasset_info.csv"));
        }


        return view("fixasset.report",$data);
    }


    public function addUpdate($formData){

        $FixAsset = FixAsset::find($formData['id']);

        if($FixAsset){
            $FixAsset->update($formData);
        }else{
            FixAsset::create($formData);
        } 
    }

}
