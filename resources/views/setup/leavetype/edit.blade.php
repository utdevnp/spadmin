
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">Update Leave Type </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("leavetype.update",['leavetype'=>$leavetype->id])}}">
        @csrf
        @method('PUT') 
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Leave Type</label>
                <input class="form-control" value="{{$leavetype->name}}" id="name" type="text" name="name" placeholder="Sick Leave">
            </div>

            <div class="col-md-12"></div>

            <div class="form-group col-md-5">
                <label for="name">Total Hour</label>
                <input class="form-control" value="{{$leavetype->total_hour}}" id="total_hour" type="number" name="total_hour" placeholder="10">
            </div>

            <div class="col-md-12"></div>

            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="active" class="custom-select mb-3">
                    <option @if($leavetype->active=='yes') selected @endif value="yes">Yes</option>
                    <option @if($leavetype->active=='no') selected @endif value="no">No</option>
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
