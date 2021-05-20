
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">New Staff </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("staff.index")}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-4">
                <label class="@error('fy_year') text-danger  @enderror" for="name">Fiscal Year</label>
                
                <select name="fy_year" class="custom-select">
                    <option selected value="">Select FY Year</option>
                    @foreach($fiscal_year as $value)
                        <option  value="{{$value->id}}">{{$value->fy_year}}</option>
                    @endforeach
                </select>

                @error('fy_year')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
            <div class="clearfix col-md-12"></div>
            <div class="form-group col-md-4">
                <label class="@error('name') text-danger  @enderror"  for="name">Staff /Consultant Name</label>
                <input class="form-control " name="name"  type="text" placeholder="John Doe" />
                @error('name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label for="name">Designation</label>
               
                <select name="designation" class="custom-select">
                    <option selected value="">Select Designation</option>
                    @foreach($designations as $designation)
                        <option  value="{{$designation->id}}">{{$designation->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Duty Station</label>
                <input class="form-control " name="duity_station"  type="text" placeholder="Kathmandu" />
            </div>

            <div class="form-group col-md-4">
                <label for="name">Joining Date</label>
                <input class="form-control datetimepicker" name="join_date" id="datepicker" type="text" placeholder="Joining Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>
            <div class="form-group col-md-4">
                <label for="name">Contract End Date</label>
                <input class="form-control datetimepicker" name="contract_end_date" id="datepicker" type="text" placeholder="Contract End Date" data-options='{"dateFormat":"Y-m-d"}'/>
            </div>
         
            <div class="form-group col-md-4">
                <label class="@error('project_name') text-danger  @enderror" for="project_name">Project Name</label>
                <select name="project_name" class="custom-select">
                    <option selected value="">Select Project</option>
                    @foreach($projects as $project)
                        <option  value="{{$project->id}}">{{$project->name}}</option>
                    @endforeach
                </select>

                @error('project_name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-4">
                <label for="name">Annual Leave(Hour)</label>
                <input class="form-control " name="annual_leave" type="number" placeholder="Annual Leave(Hour)" />
            </div>

            <div class="form-group col-md-4">
                <label for="name">Sick Leave(Hour)</label>
                <input class="form-control " name="sick_leave" type="number" placeholder="Sick Leave(Hour)" />
            </div>

            <div class="form-group col-md-4">
                <label for="name">Other Leave(Hour)</label>
                <input class="form-control " name="other_leave"  type="number" placeholder="Other Leave(Hour)" />
            </div>

            <div class="form-group col-md-4">
                <label for="name">Balance Leave (Hour) <small>from previous year</small> </label>
                <input class="form-control" name="blance_leave"  type="number" placeholder="Balance Leave (Hour)" />
                
            </div>


            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="active" class="custom-select mb-3">
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
