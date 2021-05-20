
@extends('layouts.app')

@section('content')
<div class="card">
    <!-- {{print_r($errors)}} -->
  <h5 class="card-header">Update Goods Store Out Note </h5>
  <div class="card-body bg-light overflow-hidden">
  <form method="post" action="{{route("goodstoreout.update",['goodstoreout'=>$goodstoreout->id])}}">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="form-group col-md-4">
                <label class="@error('project_id') text-danger  @enderror" for="name">Project Name</label>
                
                <select name="project_id" class="custom-select">
                    <option selected value="">Select Project</option>
                    @foreach($projects as $project)
                        <option @if($goodstoreout->project_id==$project->id) selected @endif  value="{{$project->id}}">{{$project->name}} </option>
                    @endforeach
                </select>

                @error('project_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('grn_out_number') text-danger  @enderror" for="grn_out_number">GSOF No.</label>
                <input class="form-control" name="grn_out_number" value="{{$goodstoreout->grn_out_number}}"  type="text" placeholder="00001"/>
                @error('grn_out_number')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


           

            <div class="form-group col-md-4">
                <label class="@error('submitted_date') text-danger  @enderror" for="submitted_date">Submitted Date</label>
                <input class="form-control datetimepicker"  value="{{$goodstoreout->submitted_date}}" name="submitted_date" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('submitted_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

          

            <div class="form-group col-md-4">
                <label class="@error('required_date') text-danger  @enderror" for="required_date">Required Date</label>
                <input class="form-control datetimepicker" value="{{$goodstoreout->required_date}}" name="required_date" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('required_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group col-md-4">
                <label class="@error('issue_date') text-danger  @enderror" for="issue_date">Issued Date</label>
                <input class="form-control datetimepicker" value="{{$goodstoreout->issue_date}}" name="issue_date" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('issue_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>



           



            <div class="clearfix col-md-12"></div>


            <div class="form-group col-md-4">
                <label class="@error('item_name') text-danger  @enderror" for="name">Item Name</label>
                
                <select name="item_name" class="custom-select">
                    <option selected value="">Select Item </option>
                    @foreach($items as $item)
                        <option @if($goodstoreout->item_name==$item->id) selected @endif  value="{{$item->id}}">{{$item->name}} </option>
                    @endforeach
                </select>

                @error('item_name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('unit') text-danger  @enderror" for="name">Unit</label>
                <input class="form-control " value="{{$goodstoreout->unit}}" name="unit" type="number" placeholder="10" />
                @error('unit')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('quantity_required') text-danger  @enderror" for="quantity_required">Quantity Required</label>
                <input class="form-control" value="{{$goodstoreout->quantity_required}}" name="quantity_required" type="number" placeholder="500" />
                @error('quantity_required')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('quantity_issued') text-danger  @enderror" for="quantity_issued">Quantity Issued</label>
                <input class="form-control" value="{{$goodstoreout->quantity_issued}}" name="quantity_issued" type="number" placeholder="500" />
                @error('quantity_issued')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        
           
            
          

            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-12">
                <label class="@error('purpose_activity') text-danger  @enderror" for="purpose_activity">Purpose/Activity</label>
                <textarea class="form-control" name="purpose_activity"  cols="5" placeholder="Purpose / activity of the product ">{{$goodstoreout->purpose_activity}}</textarea>
                @error('purpose_activity')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-4">
                <label class="@error('request_by') text-danger  @enderror" for="request_by">Requested By</label>
             
                <select name="request_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                    <option @if($goodstoreout->request_by==$staff->id) selected @endif   value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('request_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group col-md-4">
                <label class="@error('approved_by') text-danger  @enderror" for="approved_by">Approved By</label>
             
                <select name="approved_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                    <option @if($goodstoreout->approved_by==$staff->id) selected @endif   value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('approved_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>



            <div class="form-group col-md-4">
                <label class="@error('issue_by') text-danger  @enderror" for="issue_by">Issued By</label>
             
                <select name="issue_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                        <option @if($goodstoreout->issue_by==$staff->id) selected @endif   value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('issue_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('recived_by') text-danger  @enderror" for="recived_by">Received By</label>
                
                <select name="recived_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                        <option @if($goodstoreout->recived_by==$staff->id) selected @endif   value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('recived_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>



         

            <div class="form-group col-md-12">
                <button class="btn btn-primary mb-3" type="submit">Save</button>
            </div>
           
        </div>
</form>

  </div>
</div>


@endsection
