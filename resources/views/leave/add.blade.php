
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
    <div class="card">
    <h5 class="card-header">Request New Leave </h5>
    <div class="card-body bg-light overflow-hidden">
        <form method="post" action="{{route("leave.index")}}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label class="@error('project_id') text-danger  @enderror" for="name">Project name</label>
                            <select name="project_id" class="custom-select">
                                <option selected value="">Select Project</option>
                                @foreach($projects as $project)
                                    <option  value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>

                            @error('project_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="clearfix col-md-12"></div>

                        <div class="form-group col-md-6">
                            <label class="@error('leave_type_id') text-danger  @enderror" for="name">Leave Type</label>
                            <select name="leave_type_id" class="custom-select">
                                <option selected value="">Select Leave Type</option>
                                @foreach($leavetypes as $project)
                                    <option  value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>

                            @error('leave_type_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="form-group col-md-3">
                            <label class="@error('leave_hour') text-danger  @enderror"  for="endingtime">Total Leave Hour</label>
                            <input class="form-control"  name="leave_hour"  type="text" placeholder="Hour" />
                            @error('leave_hour')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="clearfix col-md-12"></div>

                        <div class="form-group col-md-6">
                            <label class="@error('leave_form') text-danger  @enderror"  for="name">Leave Start Date</label>
                            <input class="form-control datetimepicker"  data-options='{"dateFormat":"Y-m-d"}' name="leave_form"  type="text" placeholder="Y-m-d" />
                            @error('leave_form')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                    

                        <div class="form-group col-md-3">
                            <label class="@error('leave_start_time') text-danger  @enderror"  for="startTime">Leave Start Time</label>
                            <input class="form-control datetimepicker" id="startTime"  data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i"}' name="leave_start_time"  type="text" placeholder="H:m" />
                            @error('leave_start_time')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group col-md-6">
                            <label class="@error('leave_to') text-danger  @enderror"  for="name">Leave Ending Date </label>
                            <input class="form-control datetimepicker" data-options='{"dateFormat":"Y-m-d"}' name="leave_to"  type="text" placeholder="Y-m-d" />
                            @error('leave_to')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label class="@error('leave_end_time') text-danger  @enderror"  for="endingtime">Leave Ending Time</label>
                            <input class="form-control datetimepicker" id="endingtime"  data-options='{"enableTime":true,"noCalendar":true,"dateFormat":"H:i"}' name="leave_end_time"  type="text" placeholder="H:m" />
                            @error('leave_end_time')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                    

                        <div class="form-group col-md-4">
                            <label class="@error('submitted_to') text-danger  @enderror" for="name">Submited to </label>
                            <select name="submitted_to" class="custom-select">
                                <option selected value="">Select Person</option>
                                @foreach($staffs as $project)
                                    <option  value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>

                            @error('submitted_to')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                        <div class="form-group col-md-5">
                            <label class="@error('standing_person_id') text-danger  @enderror" for="name">Staff Standing in during Leave Period</label>
                            <select name="standing_person_id" class="custom-select">
                                <option selected value="">Select Standing Person</option>
                                @foreach($staffs as $project)
                                    <option  value="{{$project->id}}">{{$project->name}}</option>
                                @endforeach
                            </select>

                            @error('standing_person_id')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror

                        </div>

                    
                    

                        <div class="clearfix col-md-12"></div>


                        <div class="form-group col-md-12">
                            <button class="btn btn-primary mb-3" type="submit">Apply</button>
                        </div>

                        <div class="form-group col-md-12">
                        <small class="text-italic"> By default leave request send to Approval Authority and copy to Admin and Finance.</small>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>

        </div>
        </div>

    </div>
    <div class="col-md-4">
       
    <div class="card">
        <h5 class="card-header"> Staff / Leave Info </h5>
        <div class="card-body bg-light overflow-hidden">

        <div class="row">
        <div class="form-group col-md-12">

                    <label for="name">Name Of the Staff</label>
                        <p class="text-primary">{{$staffDetail->name}} </p>
                    </div>

                    @foreach($leavecalcuate as $leave)
                        <div class="form-group col-md-6">
                            <label for="name">{{$leave->leave_name}}(Hour)</label>
                            <p>{{$leave->total_hour}} / <span classs="text-success">{{$leave->remain_leave}}</span> </p>
                        </div>
                    @endforeach

        </div>
        </div>
    </div>
    </div>
</div>


@endsection
