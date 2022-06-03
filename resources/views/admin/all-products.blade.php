@extends('layouts.admin')

@section('title')
All Products
@endsection


@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            {{-- <th scope="col">Description</th>
            <th scope="col">Information</th> --}}
            <th scope="col">Picture</th>
            <th scope="col">Added Date</th>
            <th scope="col">Updated Date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{ ++$i }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->prise }} $</td>
            {{-- <td>{{ $product->description }}</td>
            <td>{{ $product->information }}</td> --}}
            <td><img src="{{ $product->picture }}" alt="Admin" style="height: 50px;width: 50px;"></td>
            <td>{{ $product->created_at }}</td>
            <td>{{ $product->updated_at }}</td>
            <td>
                <form action="{{ route('showProduct',[$product->id]) }}" method="POST">@csrf<button type="submit" class="btn btn-info">Show</button></form>
                <form action="{{ route('editProductPage',[$product->id]) }}" method="GET">@csrf<button type="submit" class="btn btn-primary">Edit</button></form>
                <form action="{{ route('deleteProduct',[$product->id]) }}" method="POST">@csrf<button type="submit" class="btn btn-danger">Delete</button></form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
