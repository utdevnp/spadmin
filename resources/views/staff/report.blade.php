@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Staff Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('staffReport')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('staffReport')}}?export=csv" class="btn btn-info btn-sm" type="button">
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
        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":true,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":8,"columnDefs":[{"targets":[0,3],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ â€” <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
              <th></th>
              <th>Fiscal Year</th>
              <th>Staff /Consultant Name</th>
              <th>Designation</th>
              <th >Duty Station</th>
              <th >Joining Date</th>
              <th>Contract End Date</th>
              <th>Project Name</th>
              @foreach($leaveType as $type)
                <th>{{$type->name}}</th>
              @endforeach
            
              <th> Document </th>

            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($staffs as $staff)
            <tr class="btn-reveal-trigger">
             
             <th class="align-middle"></th>
             <th class="align-middle">{{$staff->fiscal_year}}</th>
              <th class="align-middle">{{$staff->name}}</th>
              <td class="align-middle">{{$staff->designation_name}}</td>
              <td class="align-middle">{{$staff->duity_station}}</td>
              <td class="align-middle">{{$staff->join_date}}</td>

              <th class="align-middle">{{$staff->contract_end_date}}</th>
              <td class="align-middle">{{$staff->project_title}}</td>

              @if($staff->leave_report)
                @foreach($staff->leave_report as $type)
                  <th>{{$type->total_hour}}</th>
                @endforeach
              @endif


              <td class="align-middle"> <a href="{{url(route("document",['document'=>$staff->id]))}}">Click Here</a> </td>
             

            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection