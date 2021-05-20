<div>
    <form method="post" wire:submit.prevent="save">
            <div class="row">
              
                <div class="col-md-12 ">
                    @if (session()->has('success'))
                        <div  class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                        </div>
                    @endif
                </div>

                @if(! $message)
                <div class="col-md-12">
                    <label class="@error('name') text-danger @enderror">Name</label> 
                    <input  class="form-control " wire:model.lazy="name" type="text" name="name"/>
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-12">
                    <label class="@error('email') text-danger @enderror">Email</label> 
                    <input class="form-control " wire:model="email" type="text" name="email"/>
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                @if($hideField)
                    <div class="col-md-12">
                        <label class="@error('password') text-danger @enderror">Password</label>
                        <input class="form-control" wire:model="password" type="password" name="password"/>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                @endif
                <div class="col-md-12">
                    <label class="@error('role') text-danger @enderror">Role</label>
                    <select wire:model="role" class="form-control"  name="role">
                    <option value="">Select role </option>
                        @foreach(config("spnconfig.roles") as $role)
                            <option value="{{$role}}">{{$role}}</option>

                        @endforeach
                    </select>
                    @error('role') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="col-md-12">

                <div class="form-group">
                    <label class="@error('permisson') text-danger @enderror" for="multiple-select">Permissions</label>
                    <br>
                        @foreach(config("spnconfig.navs") as $key => $navs)
                            <input wire:model="permisson"  type="checkbox" value="{{$navs['route_name']}}"/> {{$navs['name']}} &nbsp; |  

                            @if($navs['child'] == true)
                                @foreach($navs['childNav'] as $childKey => $childValue)
                                    <input wire:model="permisson"  type="checkbox" value="{{$childValue['route_name']}}"/> {{$childValue['name']}} &nbsp; | 
                                @endforeach
                            @endif

                        @endforeach
                    
                        
                     @error('permisson') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                </div>


                <div class="col-dm-12">
                    <button type="submit" class="btn btn-primary form-control ml-3 mt-3 btn-sm">
                        
                        @if($hideField)
                            Create  
                        @else 
                            Update 
                        @endif
                        
                        and Assign</button>
                </div>

                @else 
                    <div class="col-md-12">
                        <div class="alert alert-primary" role="alert">
                              
                        @if($hideField)
                        After creating the login creadential the email must be verify then user able to login in system. 
                        @else 
                            Account detail  is update 
                        @endif
                           
                            <hr>
                            <a  href="{{route('staff.show',['staff'=>$staff])}}" class="btn btn-falcon-primary mr-1 mb-1 btn-sm">Go Back </a>
                        </div>
                   </div>
                @endif 

            </div>
         </form>

</div>
