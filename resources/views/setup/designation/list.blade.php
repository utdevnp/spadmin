@extends('layouts.app')

@section('content')

  <div class="card mb-3">
    <div class="card-header">
      <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Designation</h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
          <div class="d-none" id="purchases-actions">
            <div class="input-group input-group-sm"><select class="custom-select cus" aria-label="Bulk actions">
                <option selected="">Bulk actions</option>
                <option value="Refund">Refund</option>
                <option value="Delete">Delete</option>
                <option value="Archive">Archive</option>
              </select><button class="btn btn-falcon-default btn-sm ml-2" type="button">Apply</button></div>
          </div>
          <div id="dashboard-actions">
            <a href="{{route('designation.create')}}" class="btn btn-falcon-primary btn-sm" type="button">
              <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">New</span>
            </a>
            
          </div>
        </div>
      </div>
    </div>
    <div class="card-body px-0 pt-0">
      <div class="dashboard-data-table">
        <table class="table table-sm table-dashboard fs--1 data-table border-bottom" data-options='{"responsive":false,"pagingType":"simple","lengthChange":false,"searching":false,"pageLength":8,"columnDefs":[{"targets":[0,3],"orderable":false}],"language":{"info":"_START_ to _END_ Items of _TOTAL_ â€” <a href=\"#!\" class=\"font-weight-semi-bold\"> view all <span class=\"fas fa-angle-right\" data-fa-transform=\"down-1\"></span> </a>"},"buttons":["copy","excel"]}'>
          <thead class="bg-200 text-900">
            <tr>
              <th class="no-sort pr-1 align-middle data-table-row-bulk-select">
                <div class="custom-control custom-checkbox"><input class="custom-control-input checkbox-bulk-select" id="checkbox-bulk-purchases-select" type="checkbox" data-checkbox-body="#purchases" data-checkbox-actions="#purchases-actions" data-checkbox-replaced-element="#dashboard-actions" /><label class="custom-control-label" for="checkbox-bulk-purchases-select"></label></div>
              </th>
              <th class="sort pr-1 align-middle">Designation</th>
              <th class="sort pr-1 align-middle text-center">Active</th>
              <th class="no-sort pr-1 align-middle data-table-row-action"></th>
            </tr>
          </thead>
          <tbody id="purchases">

          @foreach($designations as $designation)
            <tr class="btn-reveal-trigger">
              <td class="align-middle">
                <div class="custom-control custom-checkbox"><input class="custom-control-input checkbox-bulk-select-target" type="checkbox" id="checkbox-0" /><label class="custom-control-label" for="checkbox-0"></label></div>
              </td>
              <th class="align-middle"><a href="#">{{$designation->name}}</a></th>
              <td class="align-middle text-center fs-0">
                @if($designation->active == 'yes')
                <span class="badge badge rounded-capsule badge-soft-success">
                  Yes
                  <span class="ml-1 fas fa-check" data-fa-transform="shrink-2"></span>
                </span>
                @else
                <span class="badge badge rounded-capsule badge-soft-danger">
                  No
                  <span class="ml-1 fas fa-ban" data-fa-transform="shrink-2"></span>
                </span>
                @endif
              </td>

              <td class="align-middle white-space-nowrap">
                <div class="dropdown text-sans-serif"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal mr-3" type="button" id="dropdown0" data-toggle="dropdown" data-boundary="html" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                  <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="dropdown0">
                    <div class="bg-white py-2">
                      <a class="dropdown-item" href="{{route('designation.edit',['designation'=>$designation->id])}}">Edit</a>
                      <div class="dropdown-divider"></div>
                     
                      <button action="{{route('designation.destroy',['designation'=>$designation->id])}}" class="dropdown-item text-danger deleteListItem"  data-toggle="modal" data-target="#DeleteModel" type="submit">Delete</button>
                      
                    </div>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
            


            
          </tbody>
        </table>
      </div>
    </div>
  </div>




            
          

       
     
@endsection