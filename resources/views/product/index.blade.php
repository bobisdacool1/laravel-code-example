@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    <div class="test">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Article</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Data</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)

                <tr>
                    <th>{{$product->id}}</th>
                    <td>{{$product->article}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        @foreach($product->data as $dataRowKey => $dataRowValue)
                            <span>{{$dataRowKey}} : {{$dataRowValue}}</span> <br>
                        @endforeach
                    </td>
                    <td>{{$product->created_at}}</td>
                    <td>{{$product->updated_at}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection