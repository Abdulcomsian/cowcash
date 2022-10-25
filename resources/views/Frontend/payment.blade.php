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
    .multiCards a{
        margin: 0px 5px;
    }
    #toast-container{
        z-index: 999999999 !important;
    }

</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv orderPayCard">
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
            <ins class="635148731dca4635dfdc0233" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
        <div class="bgColor">
            <div class="main-descriptionDiv">
                <div class="descriptionDiv" style="padding: 20px 20px;">
                    <p class="rightNow">ORDER PAYOFF</p>
                    <div class="payoffHeader">
                        <p>Choose the payment system suitable for you from the list of available Payoffs are made in automatic mode</p>
                    </div>
                    <div class="multiCards">
                        <a href="{{url('account/payment',1)}}"> 
                        <!--//{{url('account/payment',1)}}-->
                            <!-- <div style="color:#000;font-family: Nexa-Bold !important;font-size: 14px;">Active</div> -->
                            <div class="cardDiv">
                                <img src="{{asset('images/Payeer1.png')}}" alt="">
                            </div>
                        </a>
                        <a href="{{url('account/payment',2)}}">
                        <div class="cardDiv">
                            <!-- <div style="color:green;font-family: Nexa-Bold !important;font-size: 14px;">Active</div> -->
                            <img src="{{asset('images/faucet.png')}}" alt="">
                        </div>
                        </a>
                        <a href="{{url('account/payment',3)}}">
                        <div class="cardDiv">
                           
                             <!-- <div style="color:green;font-family: Nexa-Bold !important;font-size: 14px;">Active</div> -->
                             <img src="{{asset('images/Group 39.png')}}" alt="">
                           
                        </div>
                        </a>
                       
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