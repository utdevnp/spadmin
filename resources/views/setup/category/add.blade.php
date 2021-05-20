
@extends('layouts.app')

@section('content')
<div class="card">
  <h5 class="card-header">New Category </h5>
  <div class="card-body bg-light overflow-hidden">
    <form method="post" action="{{route("category.index")}}">
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label class=" @error('name') text-danger  @enderror" for="name">Name</label>
                <input class="form-control" id="name" type="text" name="name" placeholder="Name">
                @error('name')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12"></div>
            
            <div class="form-group col-md-5">
                <label class=" @error('name_chart_id') text-danger  @enderror" for="name">Name Chart</label>
                <select name="name_chart_id" class="custom-select">
                    <option selected value="">Select Name Chart</option>
                    @foreach($namecharts as $namechart)
                        <option  value="{{$namechart->id}}">{{$namechart->name}}</option>
                    @endforeach
                </select>
                @error('name_chart_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-12"></div>


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
