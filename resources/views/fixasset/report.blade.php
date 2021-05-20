@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Fix Assets Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('fixassetReport')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('fixassetReport')}}?export=csv" class="btn btn-info btn-sm" type="button">
              <span class="fas fa-file-csv" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Csv</span>
            </a>

            <a href="{{route('fixasset.index')}}" class="btn btn-falcon-info btn-sm" type="button">
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
              <th>Name Chart</th>
              <th>Category</th>
              <th >Item Description</th>
              <th >Purchase Date</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Condition</th>
              <th>Suppliers</th>
              <th>Assets Location</th>
              <th>Responsible Person </th>

            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($report as $staff)
            <tr class="btn-reveal-trigger">
             
             <th class="align-middle"></th>
              <th class="align-middle">{{$staff->name_chart_name}}</th>
              <td class="align-middle">{{$staff->category_name}}</td>
              <td class="align-middle">{{$staff->item_name}}</td>
              <td class="align-middle">{{$staff->purchase_date}}</td>

              <th class="align-middle">{{$staff->quantity}}</th>
              <td class="align-middle">{{$staff->rate}}</td>
              <td class="align-middle">{{$staff->condition}}</td>
              <td class="align-middle">{{$staff->supplier_name}}</td>

              <th class="align-middle">{{$staff->assets_location}}</th>
              <td class="align-middle">{{$staff->staff_name}}</td>

            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection