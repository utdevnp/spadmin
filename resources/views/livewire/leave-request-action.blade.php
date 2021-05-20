<div>
    <form wire:submit.prevent="save">
       <div class="form-group">
       @if (session()->has('success'))
            <div style="font-size: 15px;"  class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}<br>
                <small>Redirecting...</small>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
            </div>

            <script>
                setTimeout(function(){ 
                    location.reload();
                }, 2000);
            </script>
        @endif


        @if (session()->has('danger'))
            <div style="font-size: 15px;"  class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('danger') }}<br>
                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button>
            </div>
        @endif

       </div>
        <div class="form-group">
            <label class="@error('status') text-danger @enderror" for="exampleFormControlSelect1">Status</label>
            <select wire:model="status" class="form-control" id="exampleFormControlSelect1">
                <option value="">Select status</option>
                @foreach(config("spnconfig.leave_status") as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
            @error('status') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Reason</label>
            <textarea  wire:model="reason" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
           <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
