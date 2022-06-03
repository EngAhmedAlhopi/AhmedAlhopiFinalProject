@extends('layouts.admin')


@section('title')
{{ $product->name }}
@endsection

@section('content')

<div class="body">

    <div class="product">
        <h4><span class="data">Name : </span>{{ $product->name }}</h4>
        <br>
        <h4><span class="data">Price : </span>{{ $product->prise }} $</h4>
        <br>
        <h4><span class="data">Description : </span>{{ $product->description }}</h4>
        <br>
        <h4><span class="data">Information : </span>{{ $product->information }}</h4>
    </div>

    <div class="product">
        <div class="img">
            <div class="text-center">
                <img src="{{ asset($product->picture) }}" class="picture">
            </div>
        </div>
    </div>


</div>

@endsection

@section('style')
<style>
    .body {
        display: flex;
        height: 700px;
    }

    .product {
        height: 600px;
        width: 50%;
        margin-top: auto;
        margin-bottom: auto;
    }

    .img {
        height: 600px;
        width: 80%;
        margin-left: auto;
        margin-right: auto;

    }

    .picture{
        width: 100%;
        height: 550px;
    }

    .data{
        color: blue;
    }
</style>
@endsection


