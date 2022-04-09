@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    <h1 class="text-center mt-2"> {{ $product->name }} </h1>

    <h3>Attributes</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Attribute name</th>
            <th scope="col">Attribute value</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>id</td>
            <td>{{$product->id}}</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Article</td>
            <td>{{$product->article}}</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Name</td>
            <td>{{$product->name}}</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Created at</td>
            <td>{{$product->created_at}}</td>
        </tr>
        @foreach($product->data as $productDataRowKey => $productDataRowValue)

            <tr>
                <th scope="row">{{$loop->index + 5}}</th>
                <td>{{$productDataRowKey}}</td>
                <td>{{$productDataRowValue}}</td>
            </tr
        @endforeach
        </tbody>
    </table>
@endsection
