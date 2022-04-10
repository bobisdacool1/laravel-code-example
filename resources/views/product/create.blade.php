@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    <h1 class="text-center mt-2"> Create new product </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="create-product" class="form col-4" method="post" action="{{route('product.store')}}">
        @csrf
        <div class="mb-3">
            <label for="article" class="form-label">Article</label>
            <input type="text" class="form-control" id="article" name="article">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select class="form-select" id="status" name="status">
                <option selected value="available">Available</option>
                <option value="unavailable">Unavailable</option>
            </select>
        </div>
        <h4>Properties</h4>
        <div class="mb-3" id="properties">

        </div>
        <button type="button" id="add-property-field" class="btn btn-secondary">Add more property field</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
