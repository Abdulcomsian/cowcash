<!doctype html>
<html class="no-js h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Outfit:wght@100;200;300;400;500;600;700;800;900&family=Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">
  <style>
    .cursor-pointer {
      cursor: pointer;
    }
  </style>
  @toastr_css
  @yield('css')
</head>

<body class="mainContent">
  @include('Frontend.includes.register-header')
  @yield('content')
  @include('Frontend.includes.footer')
  @php
  $packages=\App\Models\Packages::get();
  @endphp
  <div id="registrationModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modalHeader">
        <h1>Rules of the project</h1>
      </div>
      <div class="modalBody">
        <h3>Rules</h3>
        <p>Generalities.</p>
        <p>1.1. Present User's Agreement (hereinafter referred to as "Agreement") regulates the order and terms of rendering of service by the site <a href="">cow cash</a>, hereinafter referred to as "Coordinator", and is addressed to an individual who desires to get service from the stated site (hereinafter referred to as "Participant".)</p>
        <p>1.2. To start getting the service a participant accepts all the rules of the present agreement fully and unconditionally and if you do not agree with any of the terms of the present agreement, the coordinator advises you to disclaim using the service.</p>
        <p>1.3. The coordinator and the participant accept the order and form of concluding of the present agreement as equivalent in legal validity to an agreement made in a written form.</p>
        <p>1.4. Administration of coin-farm.net reserves the right to make any changes and additions to the User's agreement and to the site without noticing the users.</p>
        <br>
        <br>
        <p>2.1 Terms and definitions.</p>
        <p>Game is an activity aimed at satisfying a person's needs in entertainment, pleasure, stress relieving and also at the development of specified skills in the form of free self-expression which doesn't concern achieving utilitarian aims and which bring gladness per se.</p>
        <p>Playing ground is a hardware-software complex located in the global network Internet aimed for organizing of leisure time.</p>
        <p>Game "coin-farm.net" is an on-line game - isolated and unique name of the playing ground owned by the coordinator and located at the addresses on the Internet coin-farm.net, on which the Coordinator provides the service for the participant in organizing his/her leisure time in the order and on terms stated in the present agreement.</p>
        <p>Game inventory is a conditional playing units which are called "gold" for playing the game, the place of accounting and storing of which is game account of the participant in a computer in the format of accounting system of the playing ground "coin-farm.net".</p>
        <p>Game account is a virtual account of the participant of the game which is provided by the coordinator to every participant on the playing ground for accounting the game inventory (gold coins, gold bars and crystals).</p>
        <br>
        <br>
        <p>3.1. The subject of the present Agreement is providing service by the Coordinator for the Participant to organize leisure time in the game "coin-farm.net" according to the terms of the present Agreement. Under such service, particularly, the following ones are meant: service at buying - selling game inventory, accounting significant information: actions on the game account, providing arrangements for identification and security of the participants, development software which is integrated in the playing ground and external appliances, informational and other service necessary for organizing the game and providing service for the participant during the game on the playing ground of the coordinator.</p>
        <p>3.2. The game in general as all it's elements and any other conjugate external playing appliances are made solely for entertaining. The participant admits that all activities in the game on the playing ground are entertainment. The participant agrees that according to the characteristics of the account his/her extent of involving in the game will be accessible in different degree.</p>
        <p>3.3. The participant agrees that he/she is personally responsible for all the actions done with the game inventory (gold coins, gold bars and crystals): buying, selling, input and output and also for any actions on the playing ground: creating, buying-selling, operations with all playing objects and other game attributes and objects used for the playing process.</p>
        <p>3.4. The participant agrees that extent and possibility of participating in entertainment on the server of the Game are the main characteristics of the rendered service.</p>
      </div>
      <p class="acceptText" style="font-family: Nexa-Regular !important;font-size: 14px; margin-top: 20px;"><input type="checkbox" name="" id="" required="required" checked> I have read and accept the &nbsp; <a style="display:contents; color: #ffd9a9;" href="https://accrualhub.com/public/rules">rules</a> of the project: </p>
      <div class="modalFooter">
        <button>I have read and accept the rules of the project</button>
      </div>
    </div>
  </div>
  <div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modalBody">
        <p>1. Select your pack</p>
        <div class="multiPackage">
          @foreach($packages as $pkg)
          <div class="packageDiv cursor-pointer" data-id="{{$pkg->id}}">
            <p class="percentText">+{{$pkg->discount}}%</p>
            @php
            $afterdisccoins=$pkg->coins_to_get/100*$pkg->discount+$pkg->coins_to_get;
            @endphp
            <p><b id="data-coins-{{$pkg->id}}">{{round($afterdisccoins)}}</b></p>
            <span>{{$pkg->coins_to_get}}</span>
            <p class="title">Silver Coins</p>
            <img src="{{asset('images/112.png')}}" alt="">
            <button id="data-price-{{$pkg->id}}" value="{{$pkg->amount}}">{{$pkg->amount}} {{Auth::user()->currency ?? 'USD'}}</button>
          </div>
          @endforeach
        </div>
        <div class="horizontalLine">
          <p>OR</p>
        </div>
        <div class="customAmount">
          <div class="inputDiv">
            <label for="">Enter custom amount ({{Auth::user()->currency ?? 'USD'}}) minimum $1:</label>
            <input type="number" value="1" class="form-control customcal" min="1">
            <label for="">=</label>
            <label for="">
              <img src="{{asset('images/silver-01.png')}}" alt="">
              <span id="customcoins">8244</span> silver coins
            </label>
          </div>
        </div>
        <div class="twoThreeStep">
          <div class="checkoutOrder" disable style="opacity:0.5;">
            <div class="inputDiv">
              <label for="">2. Checkout order:</label>
              <input class="form-control" type="number" value="1" id="checkoutqty" min="1">
              <img src="{{asset('images/silver-01.png')}}" alt="">
            </div>
            <div class="imgTable">
              <img src="{{asset('images/basket.png')}}" alt="">
              <table>
                <thead>
                  <tr>
                    <td>Pack:</td>
                    <td><span id="checkoutcoins" value="8244">8244</span> Silver Coins</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><b>Amount:</b></td>
                    <td><b id="checkoutprice" value="1">1.00</b><b> {{Auth::user()->currency ?? 'USD'}}</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="button" class="commonBtn purchase cursor-pointer" id="purchase">Purchase</button>
            <!-- payeer payement -->
            <form id="checkout-submit" method="POST" action="{{url('/createPayment')}}" target="_blank">
              @csrf
              <input type="hidden" name="purchase_sum" value="10" id="checkout-sum-val">
              <input type="hidden" name="purchase_currency" value="{{Auth::user()->currency ?? 'USD'}}" id="checkout-currency">
              <input type="hidden" value="10" name="package_id" id="package_id">
            </form>
             <!-- Faucet payement -->
            <form style="display: none" id="faucetform" action="https://faucetpay.io/merchant/webscr" method="post">
                <input type="text" name="merchant_username" value="obaidjani">
                <br>
                <input type="text" name="item_description" value="Purchase Silver Coins and Crystals">
                <br>
                <input type="text" name="amount1"  id="amount1" class="fcheckout-sum-val">
                <br>
                <input type="text" name="currency1" value="USD">

                <input type="text" name="custom" value="" class="fpackage_id">
                <br>
                <input type="text" name="callback_url" value="{{url('faucet-callback')}}">
                <br>
                <input type="text" name="success_url" value="{{url('faucet-success')}}">
                <br>
                <input type="text" name="cancel_url" value="{{url('faucet-cancel')}}">
                <br>
            </form>
            
          </div>
          <div class="paymentMethod" disable style="opacity:0.5;">
            <label for="">3. Select the payment method:</label>
            <div class="paymentMulti">
                <!-- click payment for payyer -->
              <div class="paymentDiv cursor-pointer" onclick="pay_ps()">
                <img src="{{asset('images/Group42.png')}}" alt="">
              </div>
               <!-- click payment for faucet-->
              <div class="paymentDiv cursor-pointer" onclick="pay_fs()">
                <img src="{{asset('images/faucetpay.jpg')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group 39.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
{!! NoCaptcha::renderJs() !!}
<script>
    $("#termCondition").click(function(){
            $("#registrationModal").css("display","block");
            $("#termCondition").prop("checked", true);
            $(".modal-content .acceptText input").prop("checked", true)
        })
        $("#registrationModal .modalFooter button").click(function(){
            $("#registrationModal").css("display","none");
        })
        $(".modal-content .acceptText input").click(function(){
          if($(".modal-content .acceptText input").attr("checked")=="checked"){
            console.log("hello")
            $(".modal-content .acceptText input").prop("checked", false)
            $("#termCondition").prop("checked", false);
          } else{
            console.log("hello2")
            $(".modal-content .acceptText input").prop("checked", true)
            $("#termCondition").prop("checked", true)
          }
        })
</script>
<script>!function(e,n,c,t,o,r,d){!function e(n,c,t,o,r,m,d,s,a){s=c.getElementsByTagName(t)[0],(a=c.createElement(t)).async=!0,a.src="https://"+r[m]+"/js/"+o+".js?v="+d,a.onerror=function(){a.remove(),(m+=1)>=r.length||e(n,c,t,o,r,m)},s.parentNode.insertBefore(a,s)}(window,document,"script","635148731dca4635dfdc0233",["cdn.bmcdn4.com"], 0, new Date().getTime())}();</script>
</html>