@extends('layouts.user')
@section('title')
Home Page
@endsection
@section('container')
<br>


<!---->
<div class="ghj">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/1.jpg" alt="First slide" width="1600px" height="500px">
            </div>
            <div class="carousel-item">
                <img src="img/2.jpg" alt="Second slide" width="1600px" height="500px">
            </div>
            <div class="carousel-item">
                <img src="img/3.jpg" alt="Third slide" width="1600px" height="500px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>




@foreach ( $categories as $categorie )

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3 class="mb-3">Popular {{ $categorie->name }} </h3>
            </div>

            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">




                    <div class="carousel-inner">
                        <div class="carousel-item active">


                            <div class="row">


                                @foreach ( $populars as $popular )

                                @if($popular->categorie_id == $categorie->id)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <img class="img-fluid" alt="100%x280" src="{{ $popular->description }}">
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

<hr>

@endforeach


@endsection
@section('style')
<style>
    .asd {
        display: flex;
        justify-content: space-around;
    }

    .ghj {
        text-align: center;
    }
</style>
@endsection

@section('rnav')
<a href="/log"> <button class="btn btn-outline-success" type="button" style="margin-right: 15px">
        Login</button></a>
<a href="/reg"> <button class="btn btn-outline-info" type="submit">Register</button></a>
@endsection
