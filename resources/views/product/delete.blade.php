@extends('layout.master')

@section('title')
    List of products
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class="form col-4 mt-5" method="post" action="{{route('product.destroy')}}">
        @csrf
        <h3>Are you sure? This action cannot be undone</h3>
        <button type="submit" class="btn btn-primary">Submit</button>
        <input type="hidden" name="id" value="{{$id}}">
    </form>
@endsection
