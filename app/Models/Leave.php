<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LeaveTypeSetup;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
class Leave extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        "project_id",
        "leave_type_id",
        "leave_hour",
        "leave_form",
        "leave_to",
        "submitted_to",
        "standing_person_id",
        "user_id",
        "leave_start_time",
        "leave_end_time",
        "status",
        "approved_by"
    ];

    public $appends = ['submitted_name','leave_type_name','standing_person_name','project_name','leave_date_time','staff_detail',"approved_name",'pending_date'];

    public function getLeaveTypeNameAttribute(){

        if(!empty(LeaveTypeSetup::find($this->attributes['leave_type_id'])->name)){
            return LeaveTypeSetup::find($this->attributes['leave_type_id'])->name;
        } else{
            return "N/A";
        }

      
       
    }

    public function getSubmittedNameAttribute(){
        return Staff::GetName($this->attributes['submitted_to']);
    }

    public function getStandingPersonNameAttribute(){
        return Staff::GetName($this->attributes['standing_person_id']);
    }

    public function getApprovedNameAttribute(){
        return Staff::GetName($this->attributes['approved_by']);
    }

    public function getStaffDetailAttribute(){
        $staff_id = User::find($this->attributes['user_id'])->staff_id;
        return Staff::find($staff_id);
    }


    public function getProjectNameAttribute(){
        
        if(!empty( ProjectSetup::find($this->attributes['project_id'])->name)){
            return  ProjectSetup::find($this->attributes['project_id'])->name;
        } else{
            return "N/A";
        }
    }

    function scopeCountAll(){
        
        if(getRole() == "staff"){
            return $this->where('user_id',UserId())->orderBy('id' , 'desc')->get()->count();
        }else{
            return $this->orderBy('id' , 'desc')->get()->count();
        }
    }

    function scopeLastLeaveRequest(){
        if(getRole() == "staff"){
           $latestLeave =   $this->where(["status"=>"pending",'user_id'=>UserId()])->orderBy('id' , 'desc')->take(1)->get();
        }else{
            $latestLeave =  $this->where("status","pending")->orderBy('id' , 'desc')->take(1)->get();
        }

        return  $latestLeave;
       
    }

    function scopeLeaveForDashboard(){
        return $this->where('user_id',UserId())->orderBy('id' , 'desc')->take(10)->get();
    }

    
    function scopeAllLeave(){
        if(getRole() == "staff"){
            return $this->where('user_id',UserId())->orderBy('id' , 'desc')->get();
        }else{
            return $this->orderBy('id' , 'desc')->get();
        }
    }


     function scopeLatestApprovedLimit($model , $limit){
        return $this->where('status','approved')->orderBy('id' , 'desc')->take($limit)->get();
     }

    public function getLeaveDateTimeAttribute(){

        $leave_from_date_time = Carbon::parse($this->attributes['leave_form'])->format('M d Y')." ".$this->attributes['leave_start_time'] ;
        $leave_to_date_time = Carbon::parse($this->attributes['leave_to'])->format('M d Y')." ".$this->attributes['leave_end_time'] ;

        return  $leave_from_date_time." to ".$leave_to_date_time;
    }



    public function getCreatedAtAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('M d Y') ;
        
    }

    public function getPendingDateAttribute(){
       $Human =  Carbon::parse($this->attributes['leave_form'])->diffForHumans();

      $timeDiff =  Carbon::parse($this->attributes['leave_start_time'])->diffInHours($this->attributes['leave_end_time']);

      return $Human;
    }
}
