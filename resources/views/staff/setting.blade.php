@extends('layouts.app')

@section('content')
        
        <div class="row no-gutters">
            <div class="col-lg-8 pr-lg-2">
              <div class="card mb-3 mt-3">
                <div class="card-header">
                  <h5 class="mb-0">Profile</h5>
                </div>
                <div class="card-body bg-light">
                
                    <div class="row">

                        <div class="clearfix col-md-12"></div>
                        <div class="form-group col-md-4">
                            <label for="name">Full Name</label>
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
                      <div class="col-12 d-flex justify-content-end">
                          <a href="{{route("dashboard")}}" class="btn btn-primary" type="submit">Back </a></div>
                    </div>
                 
                </div>
              </div>
              
              
            </div>
            <div class="col-lg-4 pl-lg-2">
              <div class="sticky-top sticky-sidebar">
                <div class="card mb-3 overflow-hidden">
                  <div class="card-header">
                    <h5 class="mb-0">Account Info</h5>
                  </div>
                  <div class="card-body bg-light">
                  @if(count($staff->user_detail)>0)
                    @foreach($staff->user_detail as $detail)
                    <div class="row">

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
                            
                        <!-- <livewire:user-change-password :userid="$detail->id"/> -->
                            <br>
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
                
                    @endif 
                  </div>
                </div>

              </div>
            </div>
          </div>

@endsection