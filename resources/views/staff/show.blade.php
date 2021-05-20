
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

            <a href="{{route('document',['document'=>$staff->id])}}" class="btn btn-warning btn-sm" type="button">
              <span class="fas fa-file" data-fa-transform="shrink-3 down-2"></span>
              <span class="d-none d-sm-inline-block ml-1">Documents</span>
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



            <div class="form-group col-md-4 mb-3">
                <label for="name">Active</label>
               <p>{{$staff->active}}</p>
            </div>


            <div class="clearfix col-md-12">
              <h6>Leave  <span class="text-right">( Current FY {{CurrentFiscalYearDetail()->fy_year}}) </span></h6>
              <hr>
            </div>

            
            @if(count($leavecalcuate)>0)
              @foreach($leavecalcuate as $leave)
                <div class="form-group col-md-4">
                    <label for="name">{{$leave->leave_name}}(Hour)</label>
                    <p>{{$leave->total_hour}} / <span classs="text-success">{{$leave->remain_leave}}</span> </p>
                </div>
              @endforeach
            @else 
            <div class="form-group col-md-12">
              <h6> Leave detail not added yet . please add the detail clicking below button  </h6>
              <button type='button' class="btn btn-primary btn-sm mr-1 mb-1" data-toggle="modal" data-target="#UserleaveUpdate" ><span class="fas fa-plus"></span> Add leave detail</button>
            </div>
            @endif



          

            </div>
            </div>



            <div class="col-md-4" style="border-left:1px solid #dedede">
               
                @if(count($staff->user_detail)>0)
                @foreach($staff->user_detail as $detail)
                <div class="row">
                    <div class="col-md-12">
                        <h5>Account Information   
                          <button type='button' class="btn btn-falcon-default btn-sm mr-1 mb-1" data-toggle="modal" data-target="#UserCradential" ><span class="far fa-edit"></span></button>
                          <button type='button' class="btn btn-falcon-primary btn-sm mr-1 mb-1" data-toggle="modal" data-target="#UserleaveUpdate" ><span class="far fa-file"></span></button>
                        </h5>
                    </div>
                    <div class="clearfix col-md-12 mt-5"></div>

                    <div class="col-md-12">
                        <label for="name">Email (Username)</label>
                        <p>{{$detail->email}}</p>
                    </div>

                    <div class="col-md-12">
                        <label for="name">Role</label>
                        <p>@if($detail->role != null){{$detail->role}} @else Unassign  @endif

                        <span><small>(
                          @foreach(json_decode($detail->permisson) as $permisison)
                            {{$permisison}},
                          @endforeach
                        )</small>  </span>

                        </p>
                        
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
                        
                       <livewire:user-change-password :userid="$detail->id"/>
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
                            <div class="card-title">Create Login Account  </div>
                            <label class="card-text text-primary">Login account  used in login to this system </label>
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#UserCradential">Get Start</button>
                        </div>
                        </div>
                    </div>
                </div>
                    
                @endif

            </div>
        </div>
  </div>
</div>




<!-- User model -->

<div class="modal modal-fixed-right fade" id="UserCradential"  tabindex="-1" role="dialog" aria-labelledby="exampleModalRightLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical"  role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="UserCradentialLabel">Create / Update Account </h5>
        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body py-5 text-left">

      <livewire:create-user-detail :staff="$staff->id"/>

      </div>
    </div>
  </div>
</div>





<!-- leave model -->

<div class="modal modal-fixed-right fade" id="UserleaveUpdate"  tabindex="-1" role="dialog" aria-labelledby="UserleaveUpdateLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-vertical"  role="document">
    <div class="modal-content border-0 min-vh-100">
      <div class="modal-header">
        <h5 class="modal-title" id="UserCradentialLabel">Leave update </h5>
        <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button> -->
      </div>
      <div class="modal-body py-5 text-left">

      <livewire:user-leave-update :staff="$staff->id"/>

      </div>
    </div>
  </div>
</div>





@endsection
