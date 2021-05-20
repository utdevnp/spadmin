<div class="col-md-12" style="width:100%">
<div class="row">
    <div class="form-group col-md-4">
   

                <label class="@error('name_chart_id') text-danger  @enderror" for="name">Name Chart</label>

                <select wire:model="name_chart_id" name="name_chart_id" class="custom-select">
                    <option selected value="">Select Name Chart</option>
                    @foreach($name_charts as $c)
                    <option  value="{{$c->id}}">{{$c->name}} </option>
                    @endforeach
                </select>

                @error('name_chart_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>

            
            <div class="form-group col-md-4">
                
                <label class="@error('category_id') text-danger  @enderror" for="name">Category</label>
             
                <select wire:loading.attr="disabled" wire:model="get_category_id"  wire:target="name_chart_id" name="category_id" class="custom-select">
               
                    @if($categorys_detail)
                        <option @if($get_category_id  == 0) selected @endif value="0">Select</option>
                        @foreach($categorys_detail as $c)
                            <option @if($get_category_id  == $c->token) selected @endif  value="{{$c->id}}">{{$c->name}} </option>
                        @endforeach
                    @else 
                        <option selected value="">Select Category</option>
                    @endif
                </select>
                <small wire:loading wire:target="name_chart_id">
                    Processing category...
                </small>
                @error('category_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            <div class="form-group col-md-4">
        
                <label class="@error('item_id') text-danger  @enderror" for="name">Item description</label>
                
                <select name="item_id" class="custom-select">
                 
                    @if($items_detail)
                    <option selected value="">Select</option>
                        @foreach($items_detail as $c)
                            <option  value="{{$c->id}}"> {{$c->name}} </option>
                        @endforeach
                    @else 
                    <option selected value="">Select Item</option>
                    @endif
                </select>

                <small wire:loading wire:target="get_category_id">
                    Processing items...
                </small>
             
                @error('item_id')
                   <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>
    </div>
</div>