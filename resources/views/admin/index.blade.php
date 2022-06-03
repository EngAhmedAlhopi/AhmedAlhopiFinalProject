@extends('layouts.admin')



@section('title')
DashBord
@endsection


@section('content')

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Product</th>
            <th scope="col">Price</th>
            <th scope="col">Picture</th>
            <th scope="col">Purchase Date</th>
            <th scope="col">Received Date</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($purchases as $purchase)
            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $purchase->name }}</td>
                <td>{{ $purchase->email }} </td>
                <td>{{ $purchase->product_name }} </td>
                <td>{{ $purchase->prise }} $</td>
                <td><img src="{{ $purchase->picture }}" alt="Admin" style="height: 50px;width: 50px;"></td>
                <td>{{ $purchase->created_at }}</td>
                <td>{{ $purchase->updated_at }}</td>
                <td><button type="button" class="btn btn-success">Received</button>
                </td>

            </tr>
            @endforeach

    </tbody>
</table>

@endsection




@section('style')

@endsection
