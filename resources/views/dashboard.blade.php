@extends('layouts.app')

@section('content')

          @if(count($last_leave)>0)
            <div class="card bg-light mb-3">
              <div class="card-body p-3">
                <p class="fs--1 mb-0">
                  @foreach($last_leave as $leave)
                  <a href="{{route("leave.index")}}">
                    <span class="fas fa-exchange-alt mr-2" data-fa-transform="rotate-90"></span>
                    {{$leave->leave_type_name}} request added
                  </a>
                    <strong>{{$leave->created_at}}</strong>
                  @endforeach
                </p>
              </div>
            </div>
            @endif

            <div class="card-deck">
              <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-1.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6> Total Staff<span class="badge badge-soft-warning rounded-capsule ml-2"></span></h6>
                  <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning">{{$total_staff}}</div>
                  <a class="font-weight-semi-bold fs--1 text-nowrap" href="{{route("staff.index")}}">See all<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
              <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-2.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6>Leaves<span class="badge badge-soft-info rounded-capsule ml-2"></span></h6>
                  <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info">
                    {{$total_leave}}
                  </div><a class="font-weight-semi-bold fs--1 text-nowrap" href="{{route("leave.index")}}">All Leaves<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
              <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
                <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);"></div>
                <!--/.bg-holder-->
                <div class="card-body position-relative">
                  <h6>Good Receipt<span class="badge badge-soft-success rounded-capsule ml-2"></span></h6>
                  <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif" data-countup='{"count":{{$total_goodreceipt}},"format":"comma","prefix":""}'>
                    {{$total_goodreceipt}}
                  </div><a class="font-weight-semi-bold fs--1 text-nowrap" href="{{route("goodreceipt.index")}}">All Good Receipt<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                </div>
              </div>
            </div>
          <div class="row">
            @if(getRole()=="staff")
              @include("partial.staffdash")
            @else 
              @include("partial.admindash")
            @endif
          </div>
         




            
          

       
     
@endsection