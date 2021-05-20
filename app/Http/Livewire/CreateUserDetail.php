<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CreateUserDetail extends Component
{
    public $email;
    public $name;
    public $password;
    public $message = null;
    public $staff;
    public $role;
    public $permisson  = [] ;
    public $idUser;
    public $hideField  = true;

   
    

    public function render()
    {
        
        return view('livewire.create-user-detail');
    }

    public function mount(){
        $this->checkUserExist();
    }

    function checkUserExist(){
        if(count(User::where("staff_id",$this->staff)->get())>0){
            $data =  User::where("staff_id",$this->staff)->first();

            $this->name = $data->name;
            $this->email = $data->email;
            $this->role = $data->role;
            $this->permisson = json_decode($data->permisson);
            $this->idUser= $data->id;
            $this->hideField = false;

            
        }else{
            return false;
        }
    }

    public function save(Request $request){
       // $this->validate();
     
        $data =  User::find($this->idUser);
        if($data){

            $this->validate([
                'email' => 'required|email',
                "role"=>"required"
            ]);

            $createUser = $data->update([
                'name' => $this->name,
                'email' => $this->email,
                'staff_id'=>$this->staff,
                'role'=>$this->role,
                "permisson"=>json_encode($this->permisson)
            ]);
        }else{
            $this->validate([
                'password' => 'required|min:8',
                'email' => 'required|email|unique:users',
                "role"=>"required"
            ]);

            $createUser = User::create([
                'name' => $this->name,
                'password' => Hash::make($this->password),
                'email' => $this->email,
                'staff_id'=>$this->staff,
                'role'=>$this->role,
                "permisson"=>json_encode($this->permisson)
            ]);
        }
       
        
        $this->message = $createUser;

        if($createUser){
            session()->flash('success', 'Login creadential saved successfull.');
           // return redirect()->route('staff.show',['staff'=>$this->staff]);
        }else{
            session()->flash('danger', 'Unable to saved login creadential.');
        }
    }
}
