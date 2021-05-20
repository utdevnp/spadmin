<div id="userleaveSetup">
   
    <form method="post" wire:submit.prevent="save">
        <div class="row">
            <div class="col-md-12">
            @if (session()->has('success'))
                        <div  class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }} <br>
                            <small>Redirecting in 2s...</small>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                        </div>

                        <script>
                            setTimeout(function(){ 
                                location.reload();
                            }, 2000);
                        </script>
                        
                    @endif
                    
            </div>
            @if(! $actionComplete)
                <div class="col-md-12 ">

                    @if(count($errors)>0)
                        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                            All field are required...
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                        </div>
                    @endif

                </div>
            <div class="col-md-12">

           
                <div class="row" >
                @foreach($leaveType as $key=> $type)
                        <div class="col-md-7">
                           {{$type->name}}

                           @if($mode=='update')
                           <input type="hidden" wire:model="totalleave.{{$key}}.leave_type"/>
                           @else 
                            <input type="hidden" wire:model="totalleave.{{$key}}.id"/>
                           @endif
                          
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input required  wire:model="totalleave.{{$key}}.total_hour"   class="form-control"/>

                            </div>
                        </div>
                        @endforeach
                        
                </div>
               

            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control  btn-sm">
                        Save
                    </button>
                </div>
            </div>
            @else  
                <div class="col-md-12">
                    <div class="alert alert-primary" role="alert">
                            
                       All leave are saved with input values.
                        
                        <hr>
                        <a  href="{{route('staff.show',['staff'=>$staff])}}" class="btn btn-falcon-primary mr-1 mb-1 btn-sm">Go Back </a>
                    </div>
                </div>
            
            @endif

        </div>
    </form>
</div>
