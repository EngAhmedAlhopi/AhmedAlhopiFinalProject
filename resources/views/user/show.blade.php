@extends('layouts.user')
@section('title')
{{ $product->name }}
@endsection
@section('container')

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
@if ($found)
@section('rnav')
<li class="nav-item dropdown" style="margin-top: -20px ;margin-right:45px;">
    <div class="tyu">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="color: #fff">
            {{ $user->name }}<img src="{{ $user->picture }}" class="img-circle" alt="Cinque Terre" width="30px"
                height="30px" style="margin-left: 10px;border-radius: 50%">
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/purchases">Purchases</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/favorite">Favorite</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="/chpassword">Edit Password</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>

    </div>


</li>
@endsection
@else
@section('rnav')
<ul class="navbar-nav ms-auto">
    @guest
    @if (Route::has('login'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    @endif
    @if (Route::has('register'))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
    </li>
    @endif
    @else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
    @endguest
</ul>
@endsection
@endif




