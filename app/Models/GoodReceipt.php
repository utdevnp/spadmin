<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GoodReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        "project_id","grn_number","purchese_order_number",
        "recived_date","invoice_number","invoice_date","supplier_id",
        "item_name","unit","quantity_order","quantity_recived",
        "remarks","recived_by","inspect_by","reviewed_by","user_id",'responsable_person'
    ];


    protected $appends = [
        'item_name_show','project_name',"supplier_name",
        "recived_name","inspect_name","reviewed_name",'responsable_name',
        'supplier_name'
    ];


    public function getItemNameShowAttribute(){
       
        if(!empty(ItemSetup::find($this->attributes['item_name'])->name)){
            return ItemSetup::find($this->attributes['item_name'])->name;
        } else{
            return "N/A";
        }
    }


    public function getSupplierNameAttribute(){
        return Supplier::GetName($this->attributes['supplier_id']);
    }


    public function getProjectNameAttribute(){
        return ProjectSetup::GetName($this->attributes['project_id']);
    }

    public function getResponsableNameAttribute(){
        return Staff::GetName($this->attributes['responsable_person']);
    }

    public function getRecivedNameAttribute(){
        return Staff::GetName($this->attributes['recived_by']);
    }

    public function getInspectNameAttribute(){
        return Staff::GetName($this->attributes['inspect_by']);
    }

    public function getReviewedNameAttribute(){
        return Staff::GetName($this->attributes['reviewed_by']);
    }

    function scopeCountAll(){
        return $this->orderBy("id","desc")->get()->count();
    }

    function scopeSumUnit($model, $fromData){
       $sum =  DB::table('good_receipts')
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
            return $fromData['unit'];
        }
    }
    
}
