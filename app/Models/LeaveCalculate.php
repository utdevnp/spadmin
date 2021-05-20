<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCalculate extends Model
{
    use HasFactory;

    protected $fillable = ['leave_type',"user_id","total_hour","remain_leave","fiscal_year"];
    protected $appends = ['leave_name',"leave_zero"];
    
    function getLeaveNameAttribute(){
        if(!empty(LeaveTypeSetup::find($this->attributes['leave_type'])->name)){
            return LeaveTypeSetup::find($this->attributes['leave_type'])->name;
        }else{
            return "N/A";
        }
    }


    function getLeaveZeroAttribute(){
        if($this->attributes['remain_leave'] > 0){
            return $this->attributes['remain_leave'];
        }else{
            return $this->attributes['total_hour'];
        }
    }


    function scopeGetLeaveByUser($model, $user_id){
        return $model->where("user_id",$user_id)->get();
    }


    
}
