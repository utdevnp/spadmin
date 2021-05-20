
@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
  <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Staff /Consultant Document  Detail </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
             <div id="dashboard-actions">
            <a href="{{route('staff.edit',['staff'=>$id])}}" class="btn btn-primary btn-sm" type="button">
              <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Update</span>
            </a>

            <a href="{{route('staff.index')}}" class="btn btn-falcon-info btn-sm" type="button">
              <span class="fas fa-chevron-left" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Back</span>
            </a>
            
          </div>

        </div>
    </div>
 </div>
  <div class="card-body bg-light overflow-hidden">
 
  <livewire:staff-document  :staff="$id"/>


  </div>
</div>




@endsection
