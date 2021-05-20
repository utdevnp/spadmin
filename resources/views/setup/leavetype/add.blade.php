
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">New Leave Type </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("leavetype.index")}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Leave Type</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Sick Leave">
                @error('name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

                <div class="col-md-12"></div>

                
            <div class="form-group col-md-5">
                <label for="name">Total Hour</label>
                <input class="form-control"  id="total_hour" type="number" name="total_hour" placeholder="10">
                @error('total_hour')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12"></div>

            

            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="status" class="custom-select mb-3">
                    <option selected value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <button class="btn btn-primary mb-3" type="submit">Save</button>
            </div>
           
        </div>
</form>

  </div>
</div>


@endsection
