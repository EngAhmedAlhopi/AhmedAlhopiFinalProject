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
                <form>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Welcome !</strong> Try to enter a password that is difficult to guess.
                        <a class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="oldpass"><h6>Old Password</h6></label>
                        <input type="password" class="form-control form-control-sm" id="oldpass">
                    </div>
                    <div class="form-group">
                        <label for="newpass"><h6>New Password</h6></label>
                        <input type="password" class="form-control form-control-sm" id="newpass">
                    </div>
                    <div class="form-group">
                        <label for="rpass"><h6>Repeat password</h6></label>
                        <input type="password" class="form-control form-control-sm" id="rpass">
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
    .ed {
        /* border: solid 2px red; */
        width: 360px;
        height: auto;;
        margin: auto;
    }


    #send{
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
<li class="nav-item dropdown" style="margin-top: -20px ;margin-right:45px;">
    <div class="tyu">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="color: #fff">
            AhmedAlhopip<img src="img/1.jpg" class="img-circle" alt="Cinque Terre" width="30px" height="30px"
                style="margin-left: 10px;border-radius: 50%">
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
            <li><a class="dropdown-item" href="/">Logout</a></li>
            {{-- <li>
                <hr class="dropdown-divider">
            </li> --}}
            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
        </ul>

    </div>


</li>
@endsection
