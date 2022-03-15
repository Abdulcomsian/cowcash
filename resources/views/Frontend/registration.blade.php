@extends('layouts.frontend.master')
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
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv registration">
        <div class="bgColor">
            <p class="rightNow">REGISTRATION</p>
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
                            <option value="1">USD</option>
                            <option value="2">EUR</option>
                            <option value="3">RUB</option>
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
                    <p class="acceptText">I have read and accept the rules of the project: <input type="checkbox" name="" id="" required="required"></p>
                </div>
                <button class="commonBtn cursor-pointer" type="submit">Sign Up</button>
            </form>
        </div>

        @include('Frontend.includes.menues')

    </div>
</section>
@endsection