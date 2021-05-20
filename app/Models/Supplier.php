<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name',"active"];

    function scopeAllActive(){
        return $this->where("active",'yes')->get();
    }
    function scopeGetName($model, $id){
        if(! empty(Supplier::find($id)->name)){
            return Supplier::find($id)->name;
        }else{
            return "N/A";
        }
    }
}

