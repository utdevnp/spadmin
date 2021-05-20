<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSetup extends Model
{
    use HasFactory;

    protected $fillable = ['name',"start_from","end_to","status"];
	

    public function scopeActiveProject()
    {
        return $this->where(['status' => 'yes'])->get();

    }

    public function scopeGetName($model, $id){
        if(!empty($model->find($id)->name)){
            return $model->find($id)->name;
        } else{
            return "N/A";
        }
    }

}
