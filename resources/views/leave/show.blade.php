
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
        <div class="card-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Leave Detail </h5>
                </div>
                <div class="col-6 col-sm-auto ml-auto text-right pl-0">
                    <div id="dashboard-actions">
                    <a href="{{route('leave.edit',['leave'=>$leave->id])}}" class="btn btn-primary btn-sm" type="button">
                    <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ml-1">Update</span>
                    </a>

                    <a href="{{route('leave.index')}}" class="btn btn-falcon-info btn-sm" type="button">
                    <span class="fas fa-chevron-left" data-fa-transform="shrink-3 down-2"></span>
                    <span class="d-none d-sm-inline-block ml-1">Back</span>
                    </a>
                    
                </div>

                </div>
            </div>
        
        </div>
        <div class="card-body bg-light overflow-hidden">
        
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12 mb-4">
                            @if($leave->status == 'approved')
                            <span class="badge badge rounded-capsule badge-soft-success">
                            Approved
                            <span class="ml-1 fas fa-check" data-fa-transform="shrink-2"></span>
                            </span>
                            @elseif($leave->status == 'rejected')
                            <span class="badge badge rounded-capsule badge-soft-danger">
                            Rejected
                            <span class="ml-1 fas fa-close" data-fa-transform="shrink-2"></span>
                            </span>
                            @else
                            <span class="badge badge rounded-capsule badge-soft-primary">
                            Pending
                            <span class="ml-1 fas fa-hourglass" data-fa-transform="shrink-2"></span>
                            </span>
                            @endif
                        
                           

                            </div>



                            <div class="form-group col-md-4">
                                <label  for="name">Project name</label>
                                <p class="text-primary">{{$leave->project_name}}</p>

                            

                            </div>

                            <div class="form-group col-md-4">
                                <label  for="name">Leave Type</label>
                                <p class="text-primary">{{$leave->leave_type_name}}</p>
                            </div>

                            <div class="form-group col-md-4">
                                <label   for="endingtime">Total Leave Hour</label>
                                <p class="text-primary">{{$leave->leave_hour}}</p>
                            </div>


                            <div class="clearfix col-md-12"></div>

                            <div class="form-group col-md-3">
                                <label   for="name">Leave Start Date</label>
                                <p class="text-primary">{{$leave->leave_form}}</p>
                            </div>


                        

                            <div class="form-group col-md-3">
                                <label  for="startTime">Leave Start Time</label>
                                <p class="text-primary">{{$leave->leave_start_time}}</p>
                            </div>


                            <div class="form-group col-md-3">
                                <label   for="name">Leave Ending Date </label>
                                <p class="text-primary">{{$leave->leave_to}}</p>
                            </div>

                            <div class="form-group col-md-3">
                                <label  for="endingtime">Leave Ending Time</label>
                                <p class="text-primary">{{$leave->leave_end_time}}</p>
                            </div>

                        

                            <div class="form-group col-md-4">
                                <label for="name">Submited to </label>
                                <p>{{$leave->submitted_name}}</p>

                            </div>

                            <div class="form-group col-md-5">
                                <label  for="name">Staff Standing in during Leave Period</label>
                                <p>{{$leave->standing_person_name}}</p>
                            </div>

                        
                        
                        </div>
                    </div>
                
                </div>

        </div>
        </div>
        </div>

        <div class="col-md-4">
            @if( getRole() !='staff')
                <div class="card mb-3">
                    <h5 class="card-header"> Action    <span  class="text-primary pull-right"> <small>By </small> {{$leave->approved_name}}</span>  </h5>
                    <div class="card-body bg-light overflow-hidden">
                            <livewire:leave-request-action :leave="$leave->id"/>
                    </div>
                </div>
            @endif
                
            <div class="card ">
                    <h5 class="card-header"> Staff / Leave Info  </h5>
                    <div class="card-body bg-light overflow-hidden">

                    <div class="row">

                    <div class="form-group col-md-12">
                        <label for="name">Name Of the Staff</label>
                            <p class="text-primary">{{$leave->staff_detail->name}} </p>
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
