@extends('layouts.frontend.master')
@section('title')
Account Setting
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .bgColor{
        overflow: hidden !important;
        background-size: 100% 100%;
    }
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv setting">
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
           <ins class="6357f5a99fae580a7534d3f1" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
        <div class="bgColor">
            <p class="rightNow">SETTING</p>
            <div class="main-formDiv">
                <div class="formDiv">
                    <form method="post" action="{{url('account/update-password')}}">
                        @csrf
                        <p class="title">Change Password</p>
                        <div class="inputDiv">
                            <label for="">Old Password:</label>
                            <input type="password" name="oldpassword" id="oldpassword" placeholder="Enter Old Password" required>
                            <br>
                            @error('oldpassword')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">New Password:</label>
                            <input type="password" name="password" id="password" placeholder="Enter New Password" required>
                            <br>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="inputDiv">
                            <label for="">Repeat Password:</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
                        </div>
                        <button class="commonBtn cursor-pointer" type="submit">
                            Change Password
                        </button>
                    </form>
                    <hr>
                    <!-- <div class="inputDiv">
                        <label for="">Interface Language:</label>
                        <select name="" id="">
                            <option value="English">English</option>
                        </select>
                    </div>
                    <hr> -->
                    <!-- <div class="inputDiv">
                        <label style="width: 95%;" for="">Use mobile version on mobile devices:</label>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </div> -->
                    <!-- <hr> -->
                    <div class="inputDiv">
                        <label for="">Account Currency:</label>
                        <label for="" >{{Auth::user()->currency ?? 'USD'}}</label>
                    </div>
                    <form action="{{url('account/update-currency')}}" method="post">
                        @csrf
                        <div class="inputDiv">
                            <label for="">New Account Currency:</label>
                            <select name="currency" id="currency" required>
                                <option value="USD" {{Auth::user()->currency=='USD' ? 'selected':''}}>USD</option>
                                <option value="EUR" {{Auth::user()->currency=='EUR' ? 'selected':''}}>EUR</option>
                                <option value="RUB" {{Auth::user()->currency=='RUB' ? 'selected':''}}>RUB</option>
                            </select>
                        </div>
                        <button class="commonBtn cursor-pointer">
                            Set New Currency
                        </button>
                    </form>
                    <hr>
                    <div class="changeEmail">
                        <p style="margin-bottom: 10px;" class="title">Change account email</p>
                        <p>You can change your account email address. Set only a valid email address otherwise you can lose access to your account.</p>
                    </div>
                    <form method="post" action="{{url('account/update-email')}}">
                        @csrf
                        <div class="inputDiv">
                            <label for="">Change Email:</label>
                            <input type="email" name="email" id="email" placeholder="Enter Email" required>
                            <br>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <button class="commonBtn cursor-pointer" type="submit">
                            Set New Email
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @include('Frontend.includes.menues')

    </div>
</section>
@endsection