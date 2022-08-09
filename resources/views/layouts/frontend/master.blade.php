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
  <link rel="stylesheet" href="{{asset('css/tour-default.css')}}">
  <style>
    .cursor-pointer {
      cursor: pointer;
    }
    #first{
      left: 82px;
      top: 94px;
    }
    #second{
    top: 180px;
    left: 80px;

    }
    #third{
      top: 120px;
    left: 80px;
    }
    #fourth{
      top: 150px;
    left: 75px;
    }
    #sixth{
      top: 10px;
    left: 10px;
    }
    #seventh{
      top: 90px;
    left: 72px;
    z-index: 99999999999;
    }
  </style>
  @toastr_css
  @yield('css')
</head>

<body class="mainContent">
<div class="backDrop"></div>
  @include('Frontend.includes.header')
  @yield('content')
  @include('Frontend.includes.footer')
  @php
  $packages=\App\Models\Packages::get();
  @endphp
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
            <button id="data-price-{{$pkg->id}}" value="{{$pkg->amount}}">{{$pkg->amount}} {{'USD'}}</button>
          </div>
          @endforeach
        </div>
        <div class="horizontalLine">
          <p>OR</p>
        </div>
        <div class="customAmount">
          <div class="inputDiv">
            <label for="">Enter custom amount ({{'USD'}}) minimum $1:</label>
            <input type="number" value="1" class="form-control customcal" min="1">
            <label for="">=</label>
            <label for="">
              <img src="{{asset('images/1121.png')}}" alt="">
              <span id="customcoins">8244</span> silver coins
            </label>
          </div>
        </div>
        <div class="twoThreeStep">
          <div class="checkoutOrder" disable style="opacity:0.5;">
            <div class="inputDiv">
              <label for="">2. Checkout order:</label>
              <input class="form-control" type="number" value="1" id="checkoutqty" min="1">
              <img src="{{asset('images/1121.png')}}" alt="">
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
                    <td><b id="checkoutprice" value="1">1.00</b><b> {{'USD'}}</b></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <button type="button" class="commonBtn purchase cursor-pointer" id="purchase">Purchase</button>
            <!-- payeer payement -->
            <form id="checkout-submit" method="POST" action="{{url('/createPayment')}}" target="_blank">
              @csrf
              <input type="hidden" name="purchase_sum" value="10" id="checkout-sum-val">
              <input type="hidden" name="purchase_currency" value="{{'USD'}}" id="checkout-currency">
              <input type="hidden" value="10" name="package_id" id="package_id">
              <input type="hidden" name="pkgqty" id="pkgqty" value="1">
            </form>
             <!-- Faucet payement -->
            <form style="display: none" id="faucetform" action="https://faucetpay.io/merchant/webscr" method="post">
                <input type="text" name="merchant_username" value="cowcashbtc">
                <br>
                <input type="text" name="amount1"  id="amount1" class="fcheckout-sum-val">
                <br>
                <input type="text" name="item_description" value="Payment for merchant">
                <input type="text" name="currency1" value="USD">
                <input type="text" name="currency2" value="BTC">
                <input type="text" name="custom" value="" class="fpackage_id">
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
              
               <!-- click payment for faucet-->
              <div class="paymentDiv cursor-pointer" onclick="pay_fs()">
                  <div style="color:green;font-family: Nexa-Bold !important;text-align: center;font-size: 12px;">Active</div>
                <img src="{{asset('images/faucet.png')}}" alt="">
              </div>
              <div class="paymentDiv">
                  <div style="color:#000;text-align: center;font-family: Nexa-Bold !important;font-size: 12px;">Coming Soon</div>
                <img src="{{asset('images/Group 39.png')}}" alt="">
              </div>
              <!--onclick="pay_ps()"-->
              <div class="paymentDiv cursor-pointer" >
                  <div style="color:#000;text-align: center;font-family: Nexa-Bold !important;font-size: 12px;">Coming Soon</div>
                <img src="{{asset('images/Payeer1.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="buyCow" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <span class="close">&times;</span>
      <div class="modalHeader">
        <h1>Insufficient Balance</h1>
      </div>
      <div class="modalBody commonDiv">
        <p>You don't have enough silver coin for purchasing this cow.</p>
        <br>
        <button class="cursor-pointer" style="float:none !important" id="myBtn">Add Fund</button>
      </div>
    </div>
  </div>
  <div id="welcomeModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modalHeader">
        <h5>Welcome, <b>{{Auth::user()->name ?? ''}}</b></h5>
      </div>
      <div class="modalBody">
        <p>We boldly declare that our project is stable and always fulfills its commitments. This can be confirmed by thousands of users who are consistently earning money in our project. Nevertheless, the administration of the project does not guarantee the derivation of profit from participation in the project. Your income depends entirely on you and on the deepness of participation in the project!</p>
      </div>
      <div class="modalFooter">
        <button>Great</button>
      </div>
    </div>
  </div>
  <div id="congratulationModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
      <div class="modalHeader">
        <h5>Congratulations, <b>{{Auth::user()->name ?? ''}}</b></h5>
      </div>
      <div class="modalBody">
        <p>You have successfully accomplished the tour! Accept these <b style='color:#763202 !important;font-family: Nexa-Bold !important;'>20 silver coins</b> and begin an exciting adventure in the big world of Coin Farm!</p>
      </div>
      <div class="modalFooter">
        <form method="post" action="{{route('servey')}}">
         @csrf
         <input type="hidden" name="servey">
        <button type="submit">Great</button>
        </form>
      </div>
    </div>
  </div>
  {!! NoCaptcha::renderJs() !!}
  <script src="{{asset('js/jquery.guide.js')}}"></script>
  <script src="{{asset('js/tour.js')}}"></script>
  <script>
    $(document).ready(function(){
      var screenWidth=$(window).width();
      
      var is_servey='{{Auth::user()->is_servey ?? ''}}';
      var path=window.location.pathname;
      if(path=="/home"){
        if(screenWidth>=992){
          if(is_servey!='1')
          {
          $("#welcomeModal").css("display","block");
          }

        }
      }
    })
    const tour = new Tour("Demo");
    $(document).on("click", "#welcomeModal .modalFooter button",function(){
      $("#welcomeModal").css("display","none")
      console.log("Hello")
      tour.start();
      $(".backDrop").css("display","block")
    })
    tour.style({
        accentColor: "#2478b5"
    });
    tour.addStep("first", {
        title: "How to Buy Cow",
        text: "In this section you can buy Cows!<br>You have 300 silver coins on the balance, go to the section «Buy Cow» and make your first purchase.",
        hook: ".buyCows",
        onShow: function() {
            // Function
        },
        buttons: [
            {
                text: "Next",
                action: "buyCowPage()"
            }
        ],
        links: [
           
        ]
    });
    tour.addStep("second", {
        title: "Buy Cow",
        text: "You can click here to Buy cows",
        hook: ".cowShop .multipleDiv .commonDiv",
        onShow: function() {
            // Function
        },
        buttons: [
            {
                text: "Back",
                action: "tour.previous()"
            },
            {
                text: "Next",
                action: "tour.next()"
            }
        ],
        links: [
           
        ]
    });
    function stop(){
      tour.stop()
      $(".backDrop").css("display","none")
    }
    function buyCowPage(){
      window.location='account/farm';
    }
    
  </script>
  @yield('script')
</body>
</html>