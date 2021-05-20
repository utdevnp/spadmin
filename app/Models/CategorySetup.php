<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\NameChartSetup;
class CategorySetup extends Model
{
    use HasFactory;

    protected $fillable = ['name','active','name_chart_id'];

    protected $appends  = ['name_chart_name'];

    public function getNameChartNameAttribute(){
        $nameChart =  NameChartSetup::find($this->attributes['name_chart_id'])->first();
        return $nameChart['name'];
    }
    public function scopeActiveCategory()
    {
        return $this->where(['active' => 'yes'])->get();
    }

    public function scopeGetName($model, $id){
        if(!empty($model->find($id)->name)){
            return $model->find($id)->name;
        } else{
            return "N/A";
        }
    }

   
   
}
