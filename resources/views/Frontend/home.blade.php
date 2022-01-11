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
<section id="header">
    <table>
        <tbody>
            <td class="logo commonWooden">
                <h2><span>CASH</span> <br>COW</h2>
            </td>
            <td class="loginForm commonWooden">
                <span class="signInText">SIGN IN ACCOUNT</span>
                <div class="formDiv">
                    <form id="login" method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="inputView">
                            <div class="inputDiv">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="inputDiv">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="multiBtn">
                            <button type="submit" class="cursor-pointer">Login</button>
                            <button type="button" class="cursor-pointer Registerbtn">Register</button>
                        </div>
                    </form>
                    <!-- Register Form -->
                    <form id="register" style="display: none;" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="inputView">
                            <div class="inputDiv">
                                <label for="">Name</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="inputDiv">
                                <label for="">Email</label>
                                <input type="text" name="email" id="email" required>
                            </div>
                            <div class="inputDiv">
                                <label for="">Password</label>
                                <input type="text" name="password" id="password" required>
                            </div>
                            <div class="inputDiv">
                                <label for="">Password</label>
                                <input type="text" name="password_confirmation" id="password_confirmation" required>
                            </div>
                        </div>
                        <div class="multiBtn">
                            <button type="submit" class="cursor-pointer">Register</button>
                            <button type="button" class="cursor-pointer Loginbtn">Login</button>
                        </div>
                    </form>
                </div>
            </td>
            <td class="statistics commonWooden">
                <span class="statisticsText">statistics</span>
                <p><span>All Participants:</span> <span><b>{{ $allusers ?? '0'}} Users</b></span></p>
                <p><span>New for 24 Hours:</span> <span><b>{{ $newuser ?? 0}} Users</b></span></p>
                <p><span>Active Today:</span> <span><b>{{ $todayActive ?? ''}} Users</b></span></p>
                <button>Create Account</button>

            </td>
            <td class="payment commonWooden">
                <span class="paymentText">Payment System</span>

            </td>
            <td class="board commonWooden">
                <div class="multiBtn">
                    <img src="{{asset('frontend/assets/img/Euro Coin.png')}}" alt="" class="img-fluid">
                    <img src="{{asset('frontend/assets/img/Layer 5.png')}}" alt="" class="img-fluid">
                    <img src="{{asset('frontend/assets/img/USD Coin.png')}}" alt="" class="img-fluid">
                </div>
                <div class="multiBtn">
                    <img src="{{asset('frontend/assets/img/dogecoin.png')}}" alt="" class="img-fluid">
                    <img src="{{asset('frontend/assets/img/bitcoin.png')}}" alt="" class="img-fluid">
                    <img src="{{asset('frontend/assets/img/eth.png')}}" alt="" class="img-fluid">
                </div>

            </td>
        </tbody>
    </table>
</section>
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

        <div class="menuBox">
            <div class="menuList">
                <div class="listView">
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/main.png')}}" alt="">
                        <p>Main</p>
                    </div>
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/paymentMenu.png')}}" alt="">
                        <p>Payments</p>
                    </div>
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/rules.png')}}" alt="">
                        <p>Rules</p>
                    </div>
                </div>
                <div class="listView">
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/about.png')}}" alt="">
                        <p>About</p>
                    </div>
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/calculate.png')}}" alt="">
                        <p>Calculate</p>
                    </div>
                    <div class="listdiv">
                        <img src="{{asset('frontend/assets/img/support.png')}}" alt="">
                        <p>Support</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="stairDiv">
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
@section('script')
<script>
    $(document).on('click', '.Registerbtn', function() {
        $("#login").fadeOut(500);
        $("#register").fadeIn(1000);
    })

    $(document).on('click', '.Loginbtn', function() {
        $("#register").fadeOut(500);
        $("#login").fadeIn(1000);

    })
</script>
@endsection