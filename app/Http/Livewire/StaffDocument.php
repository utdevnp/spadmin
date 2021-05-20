<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class StaffDocument extends Component
{

    use WithFileUploads;

    public $photos = [];
    public $files =[];
    public $staff;
   
    function mount($staff){
       $this->staff;
    }

   



    function getFiles(){
        $this->files =  Document::where("staff_id",$this->staff)->get();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photos' => 'required|max:1024',
        ]);

        
    }
    
    

    public function save()
    {
        $this->validate([
            'photos' => 'required|max:1024',
        ]);

        foreach ($this->photos as $photo) {
            //$photo->store('photos');
            $originalName =$photo->getClientOriginalName();
            $ext = $photo->getClientOriginalExtension();
            $file_name = $photo->store("documents",['disk' => 'staff_file']);
            Document::create([
                "name" => $originalName,
                'file_name' => $file_name,
                "user_id" => Auth::id(),
                "staff_id" => $this->staff,
                "ext"=>$ext
            ]);

        }
        return redirect()->back(); // This is not working
       // $this->photos = [];
       
    }


    function removePhoto($value){
        $getFile = Document::find($value);
        if($getFile){
            // dd($getFile->file_name);
            Storage::disk('staff_file')->delete($getFile->file_name);
            $getFile->delete();
            $this->getFiles();
            return back()->withInput();
        }

    }

    public function render()
    {
       $this->getFiles();
        return view('livewire.staff-document');
    }




   


    
}
