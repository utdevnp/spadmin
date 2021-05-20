@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Leave Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('leaveReport')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('leaveReport')}}?export=csv" class="btn btn-info btn-sm" type="button">
              <span class="fas fa-file-csv" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Csv</span>
            </a>

            <a href="{{route('staff.index')}}" class="btn btn-falcon-info btn-sm" type="button">
              <span class="fas fa-arrow-left" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Back</span>
            </a>
            
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pt-0">
      <div class="dashboard-data-table">
        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":true,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":8,"columnDefs":[{"targets":[0,12],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ â€” <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
              <th></th>
              <th>Project Name</th>
              <th>Name Of the Employee</th>
              <th>Designation</th>
              <th>Total Leave Hour</th>
              <th>Leave Start Date</th>
              <th>Leave Start Time</th>
              <th>Leave Ending Date</th>
              <th>Leave Ending Time</th>
              <th>Leave Type</th>
              <th>Staff Standing in during Leave Period</th>
              <th> Submitted To: </th>
              <th> Requested By</th>
              <th> Approved By </th>

            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($report as $staff)
            <tr class="btn-reveal-trigger">
             
             <th class="align-middle"></th>
              <th class="align-middle">{{$staff->project_name}}</th>
              <td class="align-middle">@if($staff->staff_detail->name) {{$staff->staff_detail->name}} @endif </td>
              <td class="align-middle">@if($staff->staff_detail->designation_name) {{$staff->staff_detail->designation_name}} @endif</td>
              <td class="align-middle">{{$staff->leave_hour}}</td>

              <th class="align-middle">{{$staff->leave_form}}</th>
              <td class="align-middle">{{$staff->leave_start_time}}</td>
              <td class="align-middle">{{$staff->leave_to}}</td>
              <td class="align-middle">{{$staff->leave_end_time}}</td>

              <th class="align-middle">{{$staff->leave_type_name}}</th>
              <td class="align-middle">{{$staff->standing_person_name}}</td>

              <td class="align-middle">{{$staff->submitted_name}}</td>

              <td class="align-middle">{{$staff->staff_detail->name}}</td>
              <td class="align-middle">{{$staff->approved_name}}</td>

             

            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection