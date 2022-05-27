@extends('layouts.user')
@section('title')
Edit Password
@endsection
@section('container')
<br>

<div class="ed">
    <div class="card login-form">
        <div class="card-body">
            <h3 class="card-title text-center">Edit Password</h3>

            <!--Password must contain one lowercase letter, one number, and be at least 7 characters long.-->

            <div class="card-text">
                <form method="POST" action="{{ route('resetPassword') }}">
                    @csrf
                    <h6 class="msg">{{ $result }}</h6>
                    <br>
                    <div class="form-group">
                        <label for="oldpass">
                            <h6>Old Password</h6>
                        </label>
                        <input type="password" class="form-control form-control-sm" id="oldpass" name="oldpass">
                    </div>
                    <div class="form-group">
                        <label for="newpass">
                            <h6>New Password</h6>
                        </label>
                        <input type="password" class="form-control form-control-sm" id="newpass" name="newpass">
                    </div>
                    <div class="form-group">
                        <label for="rpass">
                            <h6>Repeat password</h6>
                        </label>
                        <input type="password" class="form-control form-control-sm" id="rpass" name="rpass">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block submit-btn" id="send">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('style')
<style>
    .msg {
        font-size: medium;
        color: red;
    }

    .ed {
        /* border: solid 2px red; */
        width: 360px;
        height: auto;
        ;
        margin: auto;
    }


    #send {
        width: 100%;
    }


    form {
        padding-top: 10px;
        font-size: 13px;
        margin-top: 30px;
    }

    .card-title {
        font-weight: 300;
    }

    .btn {
        font-size: 13px;
    }

    .login-form {
        width: 320px;
        margin: 20px;
    }

    .sign-up {
        text-align: center;
        padding: 20px 0 0;
    }

    span {
        font-size: 14px;
    }

    .submit-btn {
        margin-top: 20px;
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

@section('rnav')
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
@endsection
