<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemSetup;
class FixAsset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_chart_id',"category_id","item_id","purchase_date","quantity","rate",
        "condition","supplier_id","assets_location","responsable_person","user_id"
    ];

    protected $appends = ['supplier_name','item_name',"category_name","name_chart_name","staff_name"];

    public function getAssetsLocationAttribute(){
        return AssetLocationName($this->attributes['assets_location']);
    }

    public function getSupplierNameAttribute(){
        return Supplier::GetName($this->attributes['supplier_id']);
    }

    public function getConditionAttribute(){
        return ConditionName($this->attributes['condition']);
    }


    public function getItemNameAttribute(){
        return  ItemSetup::GetName($this->attributes['item_id']);
    }

    public function getCategoryNameAttribute(){
        return  CategorySetup::GetName($this->attributes['category_id']);
    }

    public function getNameChartNameAttribute(){
        return  NameChartSetup::GetName($this->attributes['name_chart_id']);
    }

    public function getStaffNameAttribute(){
        return  Staff::GetName($this->attributes['responsable_person']);
    }
  

    public function scopeAssetCondition(){
        return config('spnconfig.asset_conditions');
    }

    public function scopeAssetLocation(){
        return config('spnconfig.asset_locations');
    }
}
