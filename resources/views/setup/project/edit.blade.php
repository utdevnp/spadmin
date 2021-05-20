
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">Update Project </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("projectsetup.update",['projectsetup'=>$project->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input class="form-control" value="{{$project->name}}" id="name" type="text" name="name" placeholder="Name">
            </div>

            <div class="form-group col-md-4">
                <label for="name">Start Date</label>
                <input class="form-control datetimepicker" value="{{$project->start_from}}" name="start_from" id="datepicker" type="text" placeholder="Start Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>

            <div class="form-group col-md-4">
                <label for="name">End Date</label>
                <input class="form-control datetimepicker" value="{{$project->end_to}}" name="end_to" id="datepicker" type="text" placeholder="End Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="status" class="custom-select mb-3">
                    <option @if($project->status=='yes') selected @endif value="yes">Yes</option>
                    <option @if($project->status=='no') selected @endif value="no">No</option>
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
