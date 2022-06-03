@extends('layouts.user')
@section('title')
{{ $categorie->name }}
@endsection

@section('container')
<br>
<h1>{{ $categorie->name }}</h1>
@if ($found)
@foreach ( $categories as $c )
@if($c->id == $categorie->id)
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">{{ $categorie->name }} </h3>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach ( $products as $product )
                                @if($product->categorie_id == $categorie->id)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ asset($product->picture) }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                            <div class="lpo">
                                                <a href="#" class="btn btn-primary"
                                                    style="height: 40px;margin-top: auto;margin-bottom: auto;">Go
                                                    somewhere</a>
                                                <div class="like">
                                                    @foreach ($fav as $fa )
                                                    @if ($fa->product_id == $product->id)
                                                    <a href="/preference/{{ $product->id }}" class="abc"><i
                                                            class="like2" style="color: red"></i></a>
                                                    @php
                                                    $arr[] = $product->id;
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                    @foreach ($arr as $e)
                                                    @if ($e == $product->id)
                                                    @php($i = false)
                                                    @break
                                                    @else
                                                    @php($i = true)
                                                    @endif
                                                    @endforeach
                                                    @if ($i)
                                                    <a href="/preference/{{ $product->id }}" class="abc"><i
                                                            class="like2"></i></a>
                                                    @endif
                                                    <a href="/buying/{{ $product->id }}" class="abc"><i
                                                            class="fas fa-shopping-basket"></i></a>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endif
@endforeach
@else
@foreach ( $categories as $c )
@if($c->id == $categorie->id )
<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">{{ $categorie->name }} </h3>
            </div>
            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                @foreach ( $products as $product )
                                @if($product->categorie_id == $categorie->id)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{asset($product->picture) }}">
                                        <div class="card-body">
                                            <h4 class="card-title">Special title treatment</h4>
                                            <p class="card-text">With supporting text below as a natural lead-in to
                                                additional content.</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endif
@endforeach

@endif
@endsection


@if ($found)
@section('rnav')
<li class="nav-item dropdown" style="margin-top: -20px ;margin-right:45px;">
    <div class="tyu">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="color: #fff">
            {{ $user->name }}<img src="{{ asset($user->picture) }}" class="img-circle" alt="Cinque Terre" width="30px"
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
    <!-- Authentication Links -->
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


@section('style')
<style>
    .abc {
        font-size: x-large;
        margin-right: 0px;
        color: #aaa;

    }

    .lpo {
        display: flex;
        justify-content: space-around;
    }

    .asd {
        display: flex;
        justify-content: space-around;
    }

    .ghj {
        text-align: center;
    }

    .tyu {
        display: flex;
        justify-content: space-between;
        width: auto;
    }

    .like {
        height: 50px;
        margin: 0 auto;
        position: relative;
        margin-right: 0px;
    }

    .like2 {
        cursor: pointer;
        padding: 10px 12px 8px;
        background: #fff;
        border-radius: 50%;
        display: inline-block;
        margin: 0 0 15px;
        color: #aaa;
        transition: .2s;
    }

    .like5 {
        cursor: pointer;
        padding: 10px 12px 8px;
        background: #fff;
        border-radius: 50%;
        display: inline-block;
        margin: 0 0 15px;
        color: red;
        transition: .2s;
    }

    .like2:hover {
        color: #666;
    }

    .like2:before {
        font-family: fontawesome;
        content: '\f004';
        font-style: normal;
    }

    .like3 {
        position: absolute;
        bottom: 70px;
        left: 0;
        right: 0;
        visibility: hidden;
        transition: .6s;
        z-index: -2;
        font-size: 2px;
        color: transparent;
        font-weight: 400;
    }

    .like2.press {
        animation: size .4s;
        color: #e23b3b;
    }

    .like3.press {
        bottom: 120px;
        font-size: 14px;
        visibility: visible;
        animation: fade 1s;
    }

    @keyframes fade {
        0% {
            color: #transparent;
        }

        50% {
            color: #e23b3b;
        }

        100% {
            color: #transparent;
        }
    }

    @keyframes size {
        0% {
            padding: 10px 12px 8px;
        }

        50% {
            padding: 14px 16px 12px;
            margin-top: -4px;
        }

        100% {
            padding: 10px 12px 8px;
        }
    }
</style>
@endsection
