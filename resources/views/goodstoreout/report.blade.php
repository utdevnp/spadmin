@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Goods Store Out Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('goodstoreoutReport')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('goodstoreoutReport')}}?export=csv" class="btn btn-info btn-sm" type="button">
              <span class="fas fa-file-csv" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Csv</span>
            </a>

            <a href="{{route('goodstoreout.index')}}" class="btn btn-falcon-info btn-sm" type="button">
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
              <th class="align-middle"></th>
              <th> Project Name </th>
              <th>GSOF No.</th>
              <th > Submitted Date </th>
              <th >Required Date </th>
              <th>Issued Date</th>
              <th>Purpose/Activity</th>
              <th>Item Name</th>
              <th>Unit</th>
              <th>Quantity Required</th>
              <th>Quantity Issued</th>
              <th> Requested By </th>
              <th> Approved By</th>
              <th>Issued By</th>
              <th>Received By</th>

            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($report as $staff)
            <tr class="btn-reveal-trigger">
             
             <th class="align-middle"></th>
              <th class="align-middle">{{$staff->project_name}}</th>
              <td class="align-middle">{{$staff->grn_out_number}}</td>
              <td class="align-middle">{{$staff->submitted_date}}</td>
              <td class="align-middle">{{$staff->required_date}}</td>

              <th class="align-middle">{{$staff->issue_date}}</th>
              <td class="align-middle">{{$staff->purpose_activity}}</td>
              <td class="align-middle">{{$staff->item_name_show}}</td>

              <th class="align-middle">{{$staff->unit}}</th>
              <td class="align-middle">{{$staff->quantity_required}}</td>

              <th class="align-middle">{{$staff->quantity_issued}}</th>
              <td class="align-middle">{{$staff->requested_name}}</td>
              <td class="align-middle">{{$staff->approve_name}}</td>
              <th class="align-middle">{{$staff->issue_name}}</th>
              <th class="align-middle">{{$staff->recived_name}}</th>

      
             

            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection