
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">New Fix Assets </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("fixasset.index")}}">
        @csrf
        <div class="row">

        @livewire('multi-select-assets')


            <div class="form-group col-md-4">
                <label class="@error('condition') text-danger  @enderror" for="name">Condition</label>
                
                <select name="condition" class="custom-select">
                    <option selected value="">Select Condition</option>
                    @foreach($asset_contions as $key => $value)
                        <option  value="{{$key}}">{{$value}} </option>
                    @endforeach
                </select>

                @error('condition')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>



            


            <div class="form-group col-md-4">
                <label class="@error('responsable_person') text-danger  @enderror" for="name">Responsible Person</label>
                
                <select name="responsable_person" class="custom-select">
                    <option selected value="">Select Person</option>
                    @foreach($staffs as $staffs)
                        <option  value="{{$staffs->id}}">{{$staffs->name}} </option>
                    @endforeach
                </select>

                @error('responsable_person')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
                <label class="@error('assets_location') text-danger  @enderror" for="name">Assets Location</label>
                
                <select name="assets_location" class="custom-select">
                    <option selected value="">Select Location</option>
                    @foreach($asset_location as $key => $value)
                        <option  value="{{$key}}">{{$value}} </option>
                    @endforeach
                </select>

                @error('assets_location')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            


            <div class="clearfix col-md-12"></div>


            <div class="form-group col-md-4">
                <label class="@error('purchase_date') text-danger  @enderror" for="name">Purchase Date</label>
                <input class="form-control datetimepicker" name="purchase_date" id="datepicker" type="text" placeholder="YYYY-MM-DD" data-options='{"dateFormat":"Y-m-d"}'/>
                @error('purchase_date')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group col-md-4">
                <label class="@error('supplier_id') text-danger  @enderror" for="name">Supplier</label>
                
                <select name="supplier_id" class="custom-select">
                    <option selected value="">Select supplier </option>
                    @foreach($suppliers as $supply)
                        <option  value="{{$supply->id}}">{{$supply->name}} </option>
                    @endforeach
                </select>

                @error('supplier_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
          
         
        

            <div class="clearfix col-md-12"></div>

            <div class="form-group col-md-4">
                <label class="@error('quantity') text-danger  @enderror" for="name">Quantity</label>
                <input class="form-control " name="quantity" type="number" placeholder="10" />
                @error('quantity')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group col-md-4">
                <label class="@error('rate') text-danger  @enderror" for="name">Rate</label>
                <input class="form-control" name="rate" type="number" placeholder="500" />
                @error('rate')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

           
            
          

            <div class="clearfix col-md-12"></div>
          

            <div class="form-group col-md-4">
                <label for="name">Active</label>
                <select name="active" class="custom-select mb-3">
                    <option selected value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <button class="btn btn-primary mb-3" type="submit">Save</button>
            </div>
           
        </div>
</form>

  </div>
</div>


@endsection
