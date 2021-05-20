
<div class="col-md-8">
          <div class="card mb-3">
              <div class="card-header">
                <div class="row align-items-center justify-content-between">
                  <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Latest Goods Receipt Note</h5>
                  </div>
                  
                </div>
              </div>
              <div class="card-body px-0 pt-0">
                <div class="dashboard-data-table">
                <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":true,"searching":true,"pageLength":8,"columnDefs":[{"targets":[0,6],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_  <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
              <th class="no-sort pr-1 align-middle data-table-row-bulk-select">
                <div class="custom-control custom-checkbox"><input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-purchases-select" type="checkbox" data-checkbox-body="#purchases" data-checkbox-actions="#purchases-actions" data-checkbox-replaced-element="#dashboard-actions" /><label class="custom-control-label" for="checkbox-bulk-purchases-select"></label></div>
              </th>
              <th>Item description</th>
              <th>Purchase Date</th>
              <th>Quantity</th>
              <th>Unit</th>
            
              <th class="no-sort pr-1 align-middle data-table-row-action"></th>
            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($goodreceipt as $staff)
            <tr class="btn-reveal-trigger">
              <td class="align-middle">
                <div class="custom-control custom-checkbox"><input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="checkbox-0" /><label class="custom-control-label" for="checkbox-0"></label></div>
              </td>
              <th class="align-middle"><a href="{{route('goodreceipt.show',['goodreceipt'=>$staff->id])}}">{{$staff->item_name_show}}</a></th>
              <td class="align-middle">{{$staff->recived_date}}</td>
              <td class="align-middle">{{$staff->quantity_order}}</td>
              <td class="align-middle">{{$staff->unit}}</td>
              

             
            </tr>
            @endforeach
            


            
          </tbody>
        </table>
        </div>
      </div>
    </div>
          
  </div>
  <div class="col-md-4">
        @include("partial.leavebox")
  </div>