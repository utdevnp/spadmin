
@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
  <div class="row align-items-center justify-content-between">
        <div class="col-6 col-sm-auto d-flex align-items-center pr-0">
          <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Staff /Consultant Name Detail </h5>
        </div>
        <div class="col-6 col-sm-auto ml-auto text-right pl-0">
             <div id="dashboard-actions">
            <a href="{{route('staff.edit',['staff'=>$staff->id])}}" class="btn btn-primary btn-sm" type="button">
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
    <form method="post" action="{{route("staff.update",['staff'=>$staff->id])}}">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
            <div class="row">
            <div class="form-group col-md-4">
                <label for="name">Fiscal Year</label>
              
               <p>{{$staff->fy_year}}</p>
            </div>
            <div class="clearfix col-md-12"></div>
            <div class="form-group col-md-4">
                <label for="name">Staff /Consultant Name</label>
              <p>{{$staff->name}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Designation</label>
               <p>{{$staff->designation}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Duty Station</label>
                <p>{{$staff->duity_station}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Joining Date</label>
                <p>{{$staff->join_date}}</p>
            </div>
            <div class="form-group col-md-4">
                <label for="name">Contract End Date</label>
                <p>{{$staff->contract_end_date}}</p>
            </div>
         
            <div class="form-group col-md-4">
                <label for="project_name">Project Name</label>
               <p>{{$staff->project_name}}</p>

            </div>

            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-4">
                <label for="name">Annual Leave(Hour)</label>
                <p>{{$staff->annual_leave}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Sick Leave(Hour)</label>
                <p>{{$staff->sick_leave}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Other Leave(Hour)</label>
                <p>{{$staff->other_leave}}</p>
            </div>

            <div class="form-group col-md-4">
                <label for="name">Balance Leave (Hour) <small>from previous year</small> </label>
                <p>{{$staff->blance_leave}}</p>
                
            </div>


            <div class="form-group col-md-4">
                <label for="name">Active</label>
               <p>{{$staff->active}}</p>
            </div>

            </div>
            </div>
            <div class="col-md-4" style="border-left:1px solid #dedede">
               
                @if(count($staff->user_detail)>0)
                @foreach($staff->user_detail as $detail)
                <div class="row">
                    <div class="col-md-12">
                        <h5>Account Information</h5>
                    </div>
                    <div class="clearfix col-md-12 mt-5"></div>

                    <div class="col-md-12">
                        <label for="name">Email (Username)</label>
                        <p>{{$detail->email}}</p>
                    </div>

                    <div class="col-md-12">
                        <label for="name">Role</label>
                        <p>@if($detail->role != null){{$detail->role}} @else Unassign  @endif</p>
                    </div>


                    <div class="col-md-12">
                        <label for="name">Password</label>
                        <p><a class="text-primary" href="#">Change</a></p>

                        <!-- <livewire:change-pasword-component :userid="$detail->id"/> -->

                    </div>


                    <div class="col-md-12">
                        <label for="name">Email Verification</label>
                       @if($detail->email_verified_at != null)
                        <p><span class="badge badge-secondary">Verified</span> <small>{{$detail->email_verified_at}}</small></p>
                       @else 
                       <p><span class="badge badge-danger">Unverified</span> </p>
                       @endif
                      
                    </div>


                    <div class="col-md-12">
                        <label for="name">Created Date </label>
                        <p>{{$detail->created_at}}</p>
                    </div>



                    <div class="col-md-12">
                        <label for="name">Updated Date</label>
                        <p>{{$detail->updated_at}}</p>
                    </div>

                     @endforeach
                </div>
               
                @else 

                <div class="row">
                    <div class="col-sm-12 col-lg-12 mt-8">
                        <div class="card bg-light">
                        <div class="card-body">
                            <div class="card-title">Create Login Detail </div>
                            <label class="card-text text-primary">Login detail used in login to this system </label>
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#UserCradential">Get Start</button>
                        </div>
                        </div>
                    </div>
                </div>
                    
                @endif

            </div>
        </div>

   
</form>

  </div>
</div>


<div class="modal modal-fixed-right fade" id="UserCradential"  tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical"  role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="UserCradentialLabel">Create login detail</h5>
        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body py-5 text-left">

      <livewire:create-user-detail :staff="$staff->id"/>

      </div>
    </div>
  </div>
</div>


@endsection
