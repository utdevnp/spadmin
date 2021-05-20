<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['name','active'];


    public function scopeActiveDesignation()
    {
        return $this->where(['active' => 'yes'])->get();

    }

    function scopeGetName($model ,$id){
        if(!empty($model->find($id)->name)){
            return $model->find($id)->name;
        } else{
            return "N/A";
        }
    }
}
