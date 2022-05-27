@extends('layouts.user')
@section('title')
Purchases
@endsection
@section('container')
<!------ Include the above in your HEAD tag ---------->
<div class="table">


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Picture</th>
                <th scope="col">Purchase Date</th>
                <th scope="col">Received Date</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($purchases as $purchase)

            <tr>
                <th scope="row">{{ ++$i }}</th>
                <td>{{ $purchase->name }}</td>
                <td>{{ $purchase->prise }} $</td>
                <td><img src="{{ $purchase->picture }}" alt="Admin" style="height: 50px;width: 50px;"></td>
                <td>{{ $purchase->created_at }}</td>
                <td>{{ $purchase->updated_at }}</td>
            </tr>
            @endforeach


        </tbody>
    </table>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/jq/jquery.min.js"></script>
</div>
@endsection
@section('style')
<style>
    .table {
        width: 90%;
        margin-left: auto;
        margin-right: auto;
        margin-top: 15px;
        margin-bottom: 15px;
    }
</style>
@endsection

@section('rnav')
<li class="nav-item dropdown" style="margin-top: -20px ;margin-right:45px;">
    <div class="tyu">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false" style="color: #fff">
            {{ $user->name }}<img src="{{ $user->picture }}" class="img-circle" alt="Cinque Terre" width="30px" height="30px"
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
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
            {{-- <li>
                <hr class="dropdown-divider">
            </li> --}}
            {{-- <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
        </ul>

    </div>


</li>
@endsection
