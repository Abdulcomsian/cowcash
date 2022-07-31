@extends('layouts.frontend.master-register')
@section('title')
Registraion
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .bgColor{
        overflow: hidden;
    }
    #startRightNow .midDiv .rightNow{
        max-width: 60%;
        left: 19%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #startRightNow .midDiv.registration .rightNow a{
        color: #fff;
    }
    #loginForm{
        display: none;
    }
    #loginForm h3{
        font-family: Nexa-Bold !important;
    }
    #startRightNow .midDiv.registration .rightNow{
        position: relative;
        max-width: initial;
        left: initial;
        margin: 0px 10px;
    }
    .registration .nav-pills{
        display: flex;
        padding: 0px;
        margin: 0px;
        position: absolute;
        top: 0px;
        z-index: 999999;
        width: 85%;
        left: 7%;
    }
</style>
@endsection

@section('content')
<section id="startRightNow">
    <!-- <div class="leftSideContent mobileHide">
        <ul>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Play to earn</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Real crypto</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Bonus 30% first Deposit</p>
                    </div>
                </a>
            </li>
        </ul>
    </div> -->
    @php $errormsg='';@endphp
    @error('email')
     @php 
      $errormsg=$message;
     @endphp
    @enderror
    <div class="midDiv registration">
        <div class="bgColor">
        <ul class="nav nav-pills" role="tablist">
            <li class="nav-item rightNow">
               
                <a class="nav-link {{$errormsg =='These credentials do not match our records.' ? '':'ative'}}" data-toggle="pill" href="#register">REGISTRATION</a>
            </li>
            <li class="nav-item rightNow">
                <a class="nav-link {{$errormsg =='These credentials do not match our records.' ? 'ative show':''}}" data-toggle="pill" href="#loginForm">LOGIN</a>
            </li>
        </ul>
        <div class="tab-content">
            <div id="register" class="container tab-pane {{$errormsg =='These credentials do not match our records.' ? '':'active'}}" style="{{$errormsg =='These credentials do not match our records.' ? 'display: none':''}}">
                <div class="detailBox">
                    <p>Do not register multiple accounts.<br> The system will quickly recognize them and they will be
                        blocked</p>
                </div>
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="role" value="farmer" />
                    <div class="formDiv">
                        <div class="inputDiv">
                            <label for="">Username: <span>*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter Name">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">Email: <span>*</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">Password: <span>*</span></label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="*******">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">Repeat Password: <span>*</span></label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="*******">
                        </div>
                        <div class="inputDiv">
                            <label for="">Currency: <span>*</span></label>
                            <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" value="{{ old('currency') }}" required>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                                <option value="RUB">RUB</option>
                            </select>

                            @error('currency')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">Country: <span>*</span></label>
                            <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror" value="{{ old('country_id') }}" required>
                                <option value="">Select Country</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}">{{$country->country_name}}</option>
                                @endforeach
                            </select>
                            @error('country_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <p class="acceptText"><input type="checkbox" name="" id="termCondition" required="required"> I have read and accept the &nbsp; <a style="display:contents; color: #ffd9a9;" href="https://cow4cash.com/public/rules">rules</a> of the project: </p>
                    </div>
                    <button class="commonBtn cursor-pointer" type="submit">Sign Up</button>
                </form>
            </div>
            <div id="loginForm" class="container tab-pane fade {{$errormsg =='These credentials do not match our records.' ? 'active show':''}}" style="{{$errormsg =='These credentials do not match our records.' ? 'display: block':''}}"><br>
                <h3>Sign In Account</h3>
                <form id="login" style="position:Relative;top:3px;" method="POST" action="{{route('login')}}">
                         @csrf
                         <div class="formDiv">
                            <div class="inputView">
                                <div class="inputDiv">
                                    
                                    <label for="">Email</label>
                                    <input style="width: 100%" type="email" name="email" id="email" required>
                                    @error('email')
                                        <span class="invalid-feedback" style="position:absolute;bottom:-11px;font-size:9px" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="inputDiv">
                                    <label for="">Password</label>
                                    <input style="width: 100%" type="password" name="password" id="password" required>
                                    @error('password')
                                        <span class="invalid-feedback" style="position:absolute;bottom:-11px;font-size:9px" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="inputDiv ">
                                  {!! NoCaptcha::display() !!}
                                  @error('g-recaptcha-response')
                                  <span class="invalid-feedback" style="display: block !important" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                              </div>
                        </div>
                            </div>
                         <div class="multiBtn">
                                 <button  id="login_button" type="submit" class="commonBtn  cursor-pointer">Login</button>
                             
                             
                                 <!-- <a href="{{url('account/registration')}}">
                                     <button id="register_button" type="button" class="commonBtn cursor-pointer">Register</button></a> -->
                           
                         </div>
                     </form>
            </div>
        </div>
        </div>

        <!-- @include('Frontend.includes.menues') -->

    </div>
    <!-- <div class="leftSideContent desktopHide">
        <ul>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Play to earn</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Real crypto</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="commonBoard">
                        <img src="{{asset('images/board.png')}}" alt="" class="img-fluid">
                        <p>Bonus 30% first Deposit</p>
                    </div>
                </a>
            </li>
        </ul>
    </div> -->
</section>

@endsection
