
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">Update Supplier </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("supplier.update",['supplier'=>$supplier->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-6">
                <label for="name">Name</label>
                <input class="form-control" value="{{$supplier->name}}" id="name" type="text" name="name" placeholder="Name">
            </div>

            <div class="col-md-12"></div>

            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="active" class="custom-select mb-3">
                    <option @if($supplier->active=='yes') selected @endif value="yes">Yes</option>
                    <option @if($supplier->active=='no') selected @endif value="no">No</option>
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
