
@extends('layouts.app')

@section('content')
<div class="card">
    <!-- {{print_r($errors)}} -->
  <h5 class="card-header">Update Goods Receipt Note </h5>
  <div class="card-body bg-light overflow-hidden">
  <form method="post" action="{{route("goodreceipt.update",['goodreceipt'=>$goodreceipt->id])}}">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="form-group col-md-4">
                <label class="@error('project_id') text-danger  @enderror" for="name">Project Name</label>
                
                <select name="project_id" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($projects as $project)
                        <option @if($goodreceipt->project_id==$project->id) selected @endif  value="{{$project->id}}">{{$project->name}} </option>
                    @endforeach
                </select>

                @error('project_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('grn_number') text-danger  @enderror" for="name">GRN. No.</label>
                <input class="form-control" value="{{$goodreceipt->grn_number}}" name="grn_number"  type="text" placeholder="00001"/>
                @error('grn_number')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group col-md-4">
                <label class="@error('purchese_order_number') text-danger  @enderror" for="name">Purchase Order No.</label>
                <input class="form-control" value="{{$goodreceipt->purchese_order_number}}" name="purchese_order_number"  type="text" placeholder="00001"/>
                @error('purchese_order_number')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('recived_date') text-danger  @enderror" for="name">Receipt Date</label>
                <input class="form-control datetimepicker" value="{{$goodreceipt->recived_date}}" name="recived_date" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('recived_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('invoice_number') text-danger  @enderror" for="name">Invoice Number </label>
                <input class="form-control " name="invoice_number" value="{{$goodreceipt->invoice_number}}" type="text" placeholder="INV-20093"/>
                @error('invoice_number')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('invoice_date') text-danger  @enderror" for="name">Invoice Date</label>
                <input class="form-control datetimepicker" name="invoice_date" value="{{$goodreceipt->invoice_date}}" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('invoice_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>



            <div class="form-group col-md-4">
                <label class="@error('responsable_person') text-danger  @enderror" for="name">Responsible Person</label>
                
                <select name="responsable_person" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                        <option @if($goodreceipt->responsable_person==$staff->id) selected @endif  value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('responsable_person')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('recived_date') text-danger  @enderror" for="name">Purchase Date</label>
                <input class="form-control datetimepicker" value="{{$goodreceipt->recived_date}}" name="item_name" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('recived_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group col-md-4">
                <label class="@error('supplier_id') text-danger  @enderror" for="name">Supplier</label>
                
                <select name="supplier_id" class="custom-select">
                    <option selected value="">Select supplier </option>
                    @foreach($suppliers as $supply)
                        <option @if($goodreceipt->supplier_id == $supply->id) selected  @endif  value="{{$supply->id}} ">{{$supply->name}} </option>
                    @endforeach
                </select>

                @error('supplier_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
          
         
        

            <div class="clearfix col-md-12"></div>


            <div class="form-group col-md-4">
                <label class="@error('item_name') text-danger  @enderror" for="name">Item Name</label>
                
                <select name="item_name" class="custom-select">
                    <option selected value="">Select Item </option>
                    @foreach($items as $item)
                        <option @if($goodreceipt->item_name==$item->id) selected @endif  value="{{$item->id}}">{{$item->name}} </option>
                    @endforeach
                </select>

                @error('item_name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('unit') text-danger  @enderror" for="name">Unit</label>
                <input class="form-control " value="{{$goodreceipt->unit}}" name="unit" type="number" placeholder="10" />
                @error('unit')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('quantity_order') text-danger  @enderror" for="name">Quantity Ordered</label>
                <input class="form-control" value="{{$goodreceipt->quantity_order}}" name="quantity_order" type="number" placeholder="500" />
                @error('quantity_order')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('quantity_recived') text-danger  @enderror" for="name">Quantity Received</label>
                <input class="form-control" value="{{$goodreceipt->quantity_recived}}" name="quantity_recived" type="number" placeholder="500" />
                @error('quantity_recived')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

        
           
            
          

            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-12">
                <label class="@error('remarks') text-danger  @enderror" for="remarks">Remarks</label>
                <textarea class="form-control"  name="remarks"  cols="5" placeholder="Remarks of the product ">{{$goodreceipt->remarks}}</textarea>
                @error('remarks')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-4">
                <label class="@error('recived_by') text-danger  @enderror" for="recived_by">Goods Received By</label>
             
                <select name="recived_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                    <option @if($goodreceipt->recived_by==$staff->id) selected @endif  value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('recived_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group col-md-4">
                <label class="@error('inspect_by') text-danger  @enderror" for="inspect_by">Goods Inspected By</label>
             
                <select name="inspect_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staff)
                    <option @if($goodreceipt->inspect_by==$staff->id) selected @endif  value="{{$staff->id}}">{{$staff->name}} </option>
                    @endforeach
                </select>

                @error('inspect_by')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>



            <div class="form-group col-md-4">
                <label class="@error('reviewed_by') text-danger  @enderror" for="reviewed_by">Reviewed By</label>
             
                <select name="reviewed_by" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staffs)
                        <option  @if($goodreceipt->reviewed_by==$staff->id) selected @endif value="{{$staffs->id}}">{{$staffs->name}} </option>
                    @endforeach
                </select>

                @error('reviewed_by')
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
