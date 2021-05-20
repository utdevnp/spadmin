<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Leave;
use App\Models\LeaveHistory;

class LeaveRequestAction extends Component
{
    public $leave;
    public $status;
    public $reason;

    public function render()
    {
        return view('livewire.leave-request-action');
    }

    function save(){

        $this->validate([
            'status' => 'required',
        ]);

        $findLeave = Leave::find($this->leave);
        

        if( $findLeave){
        // update leave 

            if($findLeave->status == $this->status){
                session()->flash('danger', 'Leave already '.$this->status);
                return false;
            }
       

            $updateLeave = $findLeave->update([
                "status"=>$this->status,
                "approved_by"=>UserId()
            ]);

           

            if($updateLeave){
                LeaveHistory::create([
                    "leave_id"=>$this->leave,
                    "requested_by"=>$findLeave->user_id,
                    "status"=>$this->status,
                    "approved_by"=>UserId(),
                    "reason"=>$this->reason
                ]);
                
                if($this->status == 'approved' OR $this->status == 'rejected'){
                    if(leaveCalculate($findLeave,$this->status)){
                        session()->flash('success', 'Status cahnge to '.$this->status);
                    }else{
                        session()->flash('danger', 'Unable to change status');
                    }
                }else{
                    session()->flash('success', 'Status cahnge to '.$this->status);
                }

                $this->reset(['status', 'reason']);

            }else{
                session()->flash('danger', 'Unable to update leave.');
            }
        }else{
            session()->flash('danger', 'Leave request not found.');
        }

     
        
    }



}
