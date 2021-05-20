<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSheet extends Model
{
    use HasFactory;

    protected $fillable = ['project_id','item_id',"store_in","store_out","blance"];

    protected $appends = ['project_name',"item_name"];

    function getProjectNameAttribute(){
        return ProjectSetup::GetName($this->attributes['project_id']);
    }

    function getItemNameAttribute(){
        return ItemSetup::GetName($this->attributes['item_id']);
    }
}
