@extends('layouts.user')
@section('title')
About Us
@endsection
@section('container')
ahmedalhopi

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection

@section('style')
<style>

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
                {{-- <a class="dropdown-item" href="/logout">Logout</a> --}}
                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{-- {{ __('Logout') }} --}}Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </li>
            {{-- <li>
                <hr class="dropdown-divider">
            </li> --}}
            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
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
