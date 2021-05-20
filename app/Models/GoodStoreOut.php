<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoodStoreOut extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',"grn_out_number","submitted_date","required_date","issue_date","invoice_date",
        "purpose_activity","item_name","unit","quantity_required","quantity_issued","recived_by",
        "request_by","approved_by","issue_by","user_id"
    ];


    protected $appends = ['issue_name','project_name','item_name_show', "recived_name","approve_name","review_name","requested_name"];
    
    public function getProjectNameAttribute(){
        return  ProjectSetup::Getname($this->attributes['project_id']);
    }

    public function getItemNameShowAttribute(){
      

        if(!empty( ItemSetup::find($this->attributes['item_name'])->name)){
            return  ItemSetup::find($this->attributes['item_name'])->name;
        } else{
            return "N/A";
        }

    }

    public function getIssueNameAttribute(){
        return Staff::GetName($this->attributes['issue_by']);
    }

    public function getRecivedNameAttribute(){
        return Staff::GetName($this->attributes['recived_by']);
    }

    public function getApproveNameAttribute(){
        return Staff::GetName($this->attributes['approved_by']);
    }

    public function getReviewedNameAttribute(){
        return Staff::GetName($this->attributes['reviewed_by']);
    }

    public function getRequestedNameAttribute(){
        return Staff::GetName($this->attributes['request_by']);
    }

    function scopeSumUnit($model, $fromData){
        $sum =  DB::table('good_store_outs')
                 ->select('item_name', DB::raw('SUM(unit) as total_unit'))
                 ->where([
                         'item_name'=>$fromData['item_name'],
                         "project_id"=>$fromData['project_id']
                     ])
                 ->groupBy('item_name')
                 ->first();

        if(!empty($sum->total_unit)){
            return $sum->total_unit;
        }else{
            return 0;
        }
     }
     

}
