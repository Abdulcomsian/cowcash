@extends('layouts.frontend.master')
@section('title')
Home Page
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<section id="startRightNow">
    <div class="midDiv">
        <p class="rightNow">EARN MONEY BY PLAYING</p>
        <p>Cow fram with money withdrawal <br> Stable earnings with our affiliate program</p>
        <div class="multiDiv">
            <div class="leftDiv">
                <div class="imgDiv">
                    <img src="{{asset('frontend/assets/img/cow.png')}}" alt="">
                </div>
                <p>Buy cow they give milks for you 24/7 automatic</p>
            </div>
            <div class="rightDiv">
                <div class="imgDiv">
                    <img src="{{asset('frontend/assets/img/milksBotel.png')}}" alt="">
                </div>
                <p>Milk will be stored in the warehouse, collect it.</p>
            </div>
        </div>
        <div class="multiDiv" style="padding: 0px;">
            <div class="leftDiv">
                <div class="imgDiv">
                    <img src="{{asset('frontend/assets/img/eggMilk.png')}}" alt="">
                </div>
                <p>Sell milk and you will get gold(real money)</p>
            </div>
            <div class="rightDiv">
                <div class="imgDiv">
                    <img src="{{asset('frontend/assets/img/cow-2.png')}}" alt="">
                </div>
                <p>Invite frineds, excahnge resource for real money and buy more cow to get more income!</p>
            </div>
        </div>
        <p class="startNow">EARN MONEY BY PLAYING</p>
        <div class="multiDiv startNowView">
            <div class="leftDiv" style="width: 100%;">
                <p>Sign Up right now and get <<Green>> cow +300 silver coins as a gift</p>
                <div class="imgDiv">
                    <img src="{{asset('frontend/assets/img/Group 291.png')}}" alt="">
                </div>

            </div>
        </div>
        <p class="startNow">OVER ADVANTAGE</p>
        <div class="advantagesList">
            <ul>
                <li>
                    <img src="{{asset('frontend/assets/img/locker.png')}}" alt="">
                    <p>Reverse Fund</p>
                </li>
                <li>
                    <img src="{{asset('frontend/assets/img/Vector Smart Object-2.png')}}" alt="">
                    <p>Payments</p>
                </li>
                <li>
                    <img src="{{asset('frontend/assets/img/plant.png')}}" alt="">
                    <p>Stability</p>
                </li>
                <li>
                    <img src="{{asset('frontend/assets/img/Vector Smart Object-3.png')}}" alt="">
                    <p>Support 24/7</p>
                </li>
            </ul>
        </div>

        @include('Frontend.includes.menues')

    </div>
    <div class="stairDiv" style="height: 800px;">
        <div class="listContent">
            <div class="firstChild">
                <p>1 Cow At the</p>
                <p>replenishment above 10 USD - FREE BONUS</p>
            </div>
            <div class="secondChild">
                <p>1 Cow At the</p>
                <p>replenishment above 50 USD - FREE BONUS</p>
            </div>
            <div class="thirdChild">
                <p>1 Cow At the</p>
                <p>replenishment above 100 USD - FREE BONUS</p>
            </div>
            <div class="forthChild">
                <p>2 Cow At the replenishment</p>
                <p>above 250 USD - FREE BONUS</p>
            </div>
            <div class="fifthChild">
                <p>20 Cow At the replenishment</p>
                <p>above 500 USD - FREE BONUS</p>
            </div>
        </div>
    </div>
</section>
@endsection