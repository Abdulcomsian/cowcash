@extends('layouts.frontend.master')
@section('title')
About Us
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .bgColor {
        height: 93%;
        overflow: hidden;
        background-size: 100% 100%;
    }
.main-descriptionDiv{
    overflow: hidden;
}

    .active {
        background-color: #fff !important;
    }
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv orderPayCard">
        <div class="bgColor">
            <div class="main-descriptionDiv">
                <div class="descriptionDiv" style="padding: 20px 20px;">
                    <p class="rightNow">ORDER PAYOFF</p>
                    <div class="payoffHeader">
                        <p>Choose the payment system suitable for you from the list of available Payoffs are made in automatic mode</p>
                    </div>
                    <div class="multiCards">
                        <a href="{{url('account/payment',1)}}">
                            <div class="cardDiv">
                                <img src="{{asset('images/Group42.png')}}" alt="">
                            </div>
                        </a>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 39.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/faucetpay.jpg')}}" alt="">
                        </div>
                        <!-- <div class="cardDiv">
                            <img src="{{asset('images/Group40.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 39 (2).png')}}" alt="">
                        </div> -->
                    </div>
                    <!-- <div class="multiCards">
                        <div class="cardDiv">
                            <img src="{{asset('images/Group43.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group41.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 38 (2).png')}}" alt="">
                        </div>
                    </div>
                    <div class="multiCards">
                        <div class="cardDiv">
                            <img src="{{asset('images/Group44.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group46.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 47.png')}}" alt="">
                        </div>
                    </div> -->
                    <div class="multiCards">
                        <!-- <div class="cardDiv">
                            <img src="{{asset('images/Group 38.png')}}" alt="">
                        </div> -->
                        <!-- <div class="cardDiv">
                            <img src="{{asset('images/Group 39.png')}}" alt="">
                        </div> -->
                        <!-- <div class="cardDiv">
                            <img src="{{asset('images/Group 34.png')}}" alt="">
                        </div> -->
                    </div>
                    <!-- <div class="multiCards">
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 37.png')}}" alt="">
                        </div>
                        <div class="cardDiv">
                            <img src="{{asset('images/Group 36.png')}}" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        @include('Frontend.includes.menues')

    </div>
</section>
@endsection