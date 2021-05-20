<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserChangePassword extends Component
{
    public $userid;
    public $changePass;
    public $returnData;
    public $loading = false;

    public function render()
    {
        return view('livewire.user-change-password');
    }

   

    public function save(){
        $this->validate([
            'changePass' => 'required|min:8',
        ]);
        $this->loading = true;
        $getUser = User::find($this->userid);
        $updatePass = $getUser->update([
             'password' => Hash::make($this->changePass)
         ]);

         $this->reset('changePass');

         if($updatePass){
            session()->flash('changePasSuccess', 'Password change successfully.');
           // return redirect()->route('staff.show',['staff'=>$this->staff]);
        }else{
            session()->flash('changePasError', 'Unable change password.');
        }

    }
}
