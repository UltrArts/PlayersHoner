<div class="form-group row ">
    <label class="control-label col-md-3 col-sm-3 ">Supplier</label>
    <div class="col-md-9 col-sm-9 ">
<div>
        <select wire:model="supplier_id" class="form-control" name="supplier_id" required >
            <option></option>
            @foreach($suppliers as $supplier)
                <option  value="{{$supplier->id}}">{{$supplier->code}} : {{$supplier->name}}</option>
            @endforeach
        </select>
</div>

<div style="position:relative">
    <input wire:model.debounce.500ms="inputsearchsupplier" class="form-control relative" type="text" placeholder="search..."/>
</div>
<div style="position:absolute; z-index:100">
@if(strlen($inputsearchsupplier)>2)
@if(count($searchsuppliers)>0)
<ul class="list-group">
  @foreach($searchsuppliers as $searchsupplier)
  <li class="list-group-item list-group-item-action"><span wire:click="selectsupplier({{$searchsupplier->id}}, {{$searchsupplier->terms}})">{{$searchsupplier->code}} : {{$searchsupplier->name}}</span></li>
  @endforeach
</ul>
@else
<li class="list-group-item">Found nothing...</li>
@endif
@endif
</div>