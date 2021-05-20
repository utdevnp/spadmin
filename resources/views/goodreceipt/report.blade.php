@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Goods Receipt Note Report </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
         
          <div id="dashboard-actions">
            <a href="{{route('goodreceiptReport')}}?export=excel" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-file-excel" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Excel</span>
            </a>

            <a href="{{route('goodreceiptReport')}}?export=csv" class="btn btn-info btn-sm" type="button">
              <span class="fas fa-file-csv" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Csv</span>
            </a>

            <a href="{{route('goodreceipt.index')}}" class="btn btn-falcon-info btn-sm" type="button">
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
              <th> Project Name </th>
              <th>GRN. No.</th>
              <th > Purchase Order No. </th>
              <th > Receipt Date </th>
              <th>  Invoice Number  </th>
              <th>Invoice Date</th>
              <th> Supplier Name </th>
              <th>Item Name </th>
              <th>Unit</th>
              <th>Quantity Ordered </th>
              <th> Quantity Received </th>
              <th>Goods Inspected By</th>
              <th> Remarks</th>
              <th> Goods Received By </th>
              <th>Reviewed By</th>

            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($report as $staff)
            <tr class="btn-reveal-trigger">
             
             <th class="align-middle"></th>
              <th class="align-middle">{{$staff->project_name}}</a></th>
              <td class="align-middle">{{$staff->grn_number}}</td>
              <td class="align-middle">{{$staff->purchese_order_number}}</td>
              <td class="align-middle">{{$staff->recived_date}}</td>

              <th class="align-middle">{{$staff->invoice_number}}</th>
              <td class="align-middle">{{$staff->invoice_date}}</td>
              <td class="align-middle">{{$staff->supplier_name}}</td>
              <td class="align-middle">{{$staff->item_name_show}}</td>

              <th class="align-middle">{{$staff->unit}}</th>
              <td class="align-middle">{{$staff->quantity_order}}</td>

              <th class="align-middle">{{$staff->quantity_recived}}</th>
              <td class="align-middle">{{$staff->inspect_name}}</td>
              <td class="align-middle">{{$staff->remarks}}</td>

              <th class="align-middle">{{$staff->recived_name}}</th>
              
              <th class="align-middle">{{$staff->reviewed_name}}</th>

             

            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection