<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProjectSetup;

class Staff extends Model
{
    use HasFactory;

    protected $table = "staff";

    protected $fillable = [
        'fy_year',"name","designation","duity_station","join_date","contract_end_date",
        "project_name","annual_leave","sick_leave","other_leave","blance_leave","active"
    ];

    protected $appends = ['fiscal_year','project_title',"user_detail","leave_total","designation_name","leave_report"];


    public function getFiscalYearAttribute(){
        return FiscalYear::GetName($this->attributes['fy_year']);
    }
    public function getProjectTitleAttribute(){
       
        if(!empty(ProjectSetup::find($this->attributes['project_name'])->name)){
            return ProjectSetup::find($this->attributes['project_name'])->name;
        } else{
            return "N/A";
        }

    }

    public function getLeaveReportAttribute(){
        return LeaveCalculate::where("user_id",staffUserId($this->attributes['id']))->get();
    }

    public function getDesignationNameAttribute(){
        return Designation::GetName($this->attributes['designation']);
    }

    public function getUserDetailAttribute(){
      return  User::where("staff_id",$this->attributes['id'])->get();
    }

    public function getLeaveTotalAttribute(){
        return $this->attributes['annual_leave'] +  $this->attributes['sick_leave'] +   $this->attributes['other_leave'];
    }


    public function scopeFiscalYear(){
        return config('spnconfig.year');
    }

    public function scopeStaffDesc()
    {
        return $this->orderBy('id' , 'desc')->get();

    }

    public function scopeStaffCountAll()
    {
        return $this->orderBy('id' , 'desc')->get()->count();

    }

    public function scopeActiveStaff()
    {
        return $this->where(['active'=>"yes"])->orderBy('id' , 'desc')->get();

    }


    public function getStaffDocumentAttribute($value)
    {
        return Document::where('staff_id' , $this->attributes['id'])->get()->count();
    }

    public function scopeGetName($model, $id){
        if(!empty($model->find($id)->name)){
            return $model->find($id)->name;
        } else{
            return "N/A";
        }
    }




}
