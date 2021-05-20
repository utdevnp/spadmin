
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">New Project </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("projectsetup.index")}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Name">
            </div>

            <div class="form-group col-md-4">
                <label for="name">Start Date</label>
                <input class="form-control datetimepicker" name="start_from" id="datepicker" type="text" placeholder="Start Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>

            <div class="form-group col-md-4">
                <label for="name">End Date</label>
                <input class="form-control datetimepicker" name="end_to" id="datepicker" type="text" placeholder="End Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>

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
