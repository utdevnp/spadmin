<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\LeaveTypeSetup;
use App\Models\LeaveCalculate;
class UserLeaveUpdate extends Component
{
    public $leaveType;
    public $totalleave;
    public $staff;
    public $mode = 'create';
    public $actionComplete;



    protected $rules = [
        'totalleave.total_hour.*' => 'required|numeric',
    ];


    public function render()
    {
        return view('livewire.user-leave-update');
    }

    function mount(){

        $getUserLeave = LeaveCalculate::where("user_id",staffUserId($this->staff))->get()->count();
        if($getUserLeave>0){
            $this->mode = 'update';
            $this->leaveType = LeaveTypeSetup::get();
            $this->totalleave=LeaveCalculate::where("user_id",staffUserId($this->staff))->get()->toArray();
        }else{
            $this->leaveType = LeaveTypeSetup::get();
            $this->totalleave=LeaveTypeSetup::get()->toArray();
        }
       
    }


    function save(){
        $this->validate();

        foreach($this->totalleave as $key=>$value){
            
            if( $this->mode == 'update'){
                $check  = LeaveCalculate::where(
                    [
                        "user_id"=>staffUserId($this->staff),
                        "leave_type"=>$value['leave_type']
                    ]
                )->get();
            }else{
                $check  = LeaveCalculate::where(
                    [
                        "user_id"=>staffUserId($this->staff),
                        "leave_type"=>$value['id']
                    ]
                )->get();
            }
           

            if(count($check)>0){
                LeaveCalculate::where("user_id",staffUserId($this->staff))
                ->where("leave_type",$value['leave_type'])
                ->update([
                    "total_hour"=>$value['total_hour'],
                    ]);
            }else{
                LeaveCalculate::create([
                    "leave_type"=>$value['id'],
                    "user_id"=>staffUserId($this->staff),
                    "total_hour"=>$value['total_hour'],
                    "fiscal_year"=>CurrentFiscalYearId(),
                ]);

               
            }

           
        }


        session()->flash('success', 'Leave detail saved successfull.');
        $this->actionComplete = true;

       
    
    }


   

}
