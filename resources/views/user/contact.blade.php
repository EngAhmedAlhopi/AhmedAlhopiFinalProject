@extends('layouts.user')
@section('title')
Contact Us
@endsection
@section('container')
<!------ Include the above in your HEAD tag ---------->




        <div class="well well-sm" id="cont">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <legend class="text-center">Contact us</legend>

            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>

            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email">Your E-mail</label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>

            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>

            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <button type="submit" class="btn btn-primary btn-lg" id="send" >Send</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>



<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/jq/jquery.min.js"></script>

@endsection
@section('style')
    <style>
        #cont{
            /* border: solid red 1px; */
            width: 1000px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        form{
            /* border: solid blue 1px; */
            width: 500px;
            height: 500px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 30px;
            margin-bottom: 30px;
        }
        #name,#email,#message{
            /* border: solid red 1px; */
            width: 100%;
            margin: 10px;
        }
        #send{
            /* border: solid red 1px; */
            width: 80%;
            /* margin-left: auto; */
            /* margin-right: auto; */
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
