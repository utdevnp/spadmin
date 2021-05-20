<div class="row">
        <form class="form-inline" wire:submit.prevent="save">
            
            <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only ">Password</label>
                <input @error('changePass') style='background:#f0c1c1;'  @enderror   type="password" id="inputPassword2" wire:model="changePass" class="form-control form-control-sm"/>
            </div>
            <button type="submit" class="btn btn-primary mb-2 btn-sm">
                Change<span wire:loading>ing</span>
            </button>
            <div class="col-md-12">

            <small class="text-danger">@error('changePass') {{$message}}  @enderror </small>
            </div>
           
        </form>

        <div class='col-md-12'>
           
            @if (session()->has('changePasSuccess'))
                <div  class="alert alert-success alert-dismissible fade show text-sm" role="alert">
                    {{ session('changePasSuccess') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
                </div>
            @endif
        </div>
        
</div>
