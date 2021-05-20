@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Inventory Log Sheet Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('logsheet.index')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('logsheet.index')}}?export=csv" class="btn btn-info btn-sm" type="button">
              <span class="fas fa-file-csv" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Csv</span>
            </a>

            <a href="{{route('dashboard')}}" class="btn btn-falcon-info btn-sm" type="button">
              <span class="fas fa-arrow-left" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Back</span>
            </a>
            
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pt-0">
      <div class="dashboard-data-table">
        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":true,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":8,"columnDefs":[{"targets":[0,4],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ â€” <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
              <th> Project Name </th>
              <th>Item Name</th>
              <th>Store In</th>
              <th>Store Out  </th>
              <th>Balance as per Register    </th>
            </tr>
          </thead>
          <tbody id="purchases">

         
            <tr class="btn-reveal-trigger">
             @foreach($report as $data)
                <th class="align-middle">{{$data->project_name}}</th>
                <th class="align-middle">{{$data->item_name}}</th>
                <th class="align-middle">{{$data->store_in}}</th>
                <th class="align-middle">{{$data->store_out}}</th>
                <th class="align-middle">{{$data->blance}}</th>
             @endforeach

            </tr>

            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection