<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSetup extends Model
{
    use HasFactory;

    protected $fillable = ['name',"active","category_id"];


    public function scopeActiveItems()
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
