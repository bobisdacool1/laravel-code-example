@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    <div class="container-fluid">
        <div class="test">
            <div class="row">
                <div class="col-12 d-flex justify-content-end">
                    <a href="{{route('product.create')}}" class="btn btn-success">Create new</a>
                </div>
            </div>
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
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)

                    <tr>
                        <th>
                            <a href="{{route('product.show', ['id' => $product->id])}}">
                                {{$product->id}}
                            </a>
                        </th>
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
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{route('product.delete', ['id' => $product->id])}}" type="button"
                                   class="btn btn-danger">Delete</a>
                                <a href="{{route('product.show', ['id' => $product->id])}}" type="button"
                                   class="btn btn-warning">Edit</a>
                                <a href="{{route('product.show', ['id' => $product->id])}}" type="button"
                                   class="btn btn-success">View</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
