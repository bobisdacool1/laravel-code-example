@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    <h1 class="text-center mt-2"> Edit product </h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="edit-product" class="form col-4" method="post" action="{{route('product.update')}}">
        @csrf
        <div class="mb-3">
            <label for="article" class="form-label">Article</label>
            <input type="text" class="form-control" id="article" name="article" value="{{$product->article}}"/>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$product->name}}"/>
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" id="status" name="status">

                @if($product->status == 'available')
                    <option selected value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                @else
                    <option selected value="unavailable">Unavailable</option>
                    <option value="available">Available</option>
                @endif
            </select>
        </div>
        <h4>Properties</h4>
        <div class="mb-3" id="properties">
            @foreach($product->data as $productDataRowKey => $productDataRowValue)
                <div class="property-group row mb-3 d-flex justify-content-space-between">
                    <div class="col-5">
                        <input type="text" class="form-control property key" disabled value="{{$productDataRowKey}}"/>
                    </div>
                    <div class="col-5">
                        <input type="text" class="form-control property value" name="data[{{$productDataRowKey}}]"
                               value="{{$productDataRowValue}}"/>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn-close remove-property" aria-label="Close"></button>
                    </div>
                </div>
            @endforeach
        </div>

        <input type="hidden" name="id" value="{{$product->id}}">

        <button type="button" id="add-property-field" class="btn btn-secondary">Add more property field</button>
        <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger">Delete</a>
        <a href="{{route('product.show', ['id' => $product->id])}}" class="btn btn-success">View</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
