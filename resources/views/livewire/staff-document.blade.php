<div id="documentStaff">
    
<style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  margin-top: 23%;
}
.photosBox{
    text-align: center;
}

.photosBox small{
    display:block;
    text-align:center;
}
.spinner-border {
    display: inline-block;
    width: 1rem;
    height: 1rem;
}
.trashBox{
    position: absolute;
    top: -19px;
    right: -9px;
    display: block;
}

</style>



<form wire:submit.prevent="save">
    <div class="row">
        @if(count($files)>0 OR count($photos)>0)
        <div class="col-md-12">
            <div class="row">
            
                @foreach($files as $file)
              
                    <div class="col-md-2 photosBox mb-4">

                        <button type="button"  wire:click="removePhoto({{$file->id}})" value="{{$file->id}}" class="trashBox btn-xs btn"><i class="text-danger fa-1x  fas fa-window-close"></i></button>

                        @if (Storage::disk('staff_file')->exists($file->file_name)) 

                            @if($file->ext == 'pdf')
                                
                            <a href="{{route("documentDownload",['document'=>$file->id])}}" class="text-center text-danger"><span class="far fa-file-pdf fa-5x"></span></a>
                            <small>{{$file->name}}</small>
                            @elseif($file->ext == 'docx')
                                <a href="{{route("documentDownload",['document'=>$file->id])}}"><span class="far fa-file-word fa-5x"></span></a>
                                <small>{{$file->name}}</small>
                            @elseif($file->ext == 'txt')
                                <a href="{{route("documentDownload",['document'=>$file->id])}}"><span class="far fa-file-alt fa-5x"></span></a>
                                <small>{{$file->name}}</small>
                            @else
                                <a href="{{route("documentDownload",['document'=>$file->id])}}">
                                    <img src="{{url($file->file_name)}}" width="60%"/>
                                </a>
                                <small>{{$file->name}}</small>
                            @endif
                        @else
                           <img class="center" src="{{url("assets/img/icons8-no-document-64.png")}}" width="50%"/>
                        @endif
                    </div>
                @endforeach


    
            </div>
        </div>
            <div class="clearfix"></div>
        @else
        <div class="col-md-12 text-center">
                No document upload here 
        </div>
        @endif
        <div class="col-md-4 ">
        <div class="custom-file mt-4">
            <input class="custom-file-input" type="file" multiple wire:model="photos" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>

            @error('photos') <span class="error text-danger">{{ $message }}</span> @enderror
        </div>

        
            <button wire:model="submitfile" class="btn btn-primary mt-3" type="submit">Save  <div wire:loading wire:target="submitfile">
        <div class="spinner-border " role="status"><span class="sr-only">Loading...</span></div>
    </div> </button>

        </div>
    </div>
 
  

</form>

</div>


<script>
    $('#deleteModel').modal('show');
</script>

<div class="modal modal-fixed-right fade in" id="deleteModel"   tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical"  role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="UserCradentialLabel">Create login detail</h5>
        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body py-5 text-left">

      Hello

      </div>
    </div>
  </div>
</div>

