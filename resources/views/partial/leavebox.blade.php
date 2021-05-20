<div class="card mb-3">
          <div class="card-header">
            <div class="row align-items-center justify-content-between">
              <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
                <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Approved Leaves</h5>
              </div>
              
            </div>
          </div>
          <div class="card-body px-0 pt-0">
            <div class="dashboard-data-table">
            <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":true,"searching":true,"pageLength":8,"columnDefs":[{"targets":[0,6],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_  <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
             
              <th colspan="3" >Name</th>
             
           
            
              <th class="no-sort pr-1 align-middle data-table-row-action"></th>
            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($latestleave as $leave)
            <tr class="btn-reveal-trigger">
               
            <td class="align-middle"><a href="{{route('leave.show',['leave'=>$leave->id])}}">@if($leave->staff_detail->name) {{$leave->staff_detail->name}}  @endif </a></td>
             
              <td>&nbsp; {{$leave->pending_date}} for <b>{{$leave->leave_hour}}</b> hours</td>
            </tr>
            @endforeach
            


            
            </tbody>
          </table>
      </div>
      </div>
      </div>