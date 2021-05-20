<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiscalYear extends Model
{
    use HasFactory;

    protected $fillable = ['fy_year',"default","active"];

    function scopeFiscalYear($model){
        return $model->where("active",1)->get();
    }


    function scopeFiscalYearAll($model){
        return $model->get();
    }


    public function scopeGetName($model, $id){
        if(!empty($model->find($id)->fy_year)){
            return $model->find($id)->fy_year;
        } else{
            return "N/A";
        }
    }


}
