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
            <img src="{{asset('images/12.png')}}" alt="">
            <button id="data-price-{{$pkg->id}}" value="{{$pkg->amount}}">{{$pkg->amount}} USD</button>
          </div>
          @endforeach
          <!-- <div class="packageDiv ">
            <p class="percentText">+19%</p>
            <p><b>88204</b></p>
            <span>82433</span>
            <p class="title">Silver Coins</p>
            <img src="{{asset('images/12.png')}}" alt="">
            <button>10 USD</button>
          </div> -->
          <!-- <div class="packageDiv">
            <p class="percentText">+19%</p>
            <p><b>88204</b></p>
            <span>82433</span>
            <p class="title">Silver Coins</p>
            <img src="{{asset('images/12.png')}}" alt="">
            <button>10 USD</button>
          </div>
          <div class="packageDiv">
            <p class="percentText">+19%</p>
            <p><b>88204</b></p>
            <span>82433</span>
            <p class="title">Silver Coins</p>
            <img src="{{asset('images/12.png')}}" alt="">
            <button>10 USD</button>
          </div>
          <div class="packageDiv">
            <p class="percentText">+19%</p>
            <p><b>88204</b></p>
            <span>82433</span>
            <p class="title">Silver Coins</p>
            <img src="{{asset('images/12.png')}}" alt="">
            <button>10 USD</button>
          </div> -->
        </div>
        <div class="horizontalLine">
          <p>OR</p>
        </div>
        <div class="customAmount">
          <div class="inputDiv">
            <label for="">Enter custom amount (USD):</label>
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
                    <td><b id="checkoutprice" value="1">1.00</b><b> USD</b></td>
                  </tr>
                </tbody>
              </table>

            </div>
            <button class="commonBtn purchase">Purchase</button>
          </div>
          <div class="paymentMethod" disable style="opacity:0.5;">
            <label for="">3. Select the payment method:</label>
            <div class="paymentMulti">
              <div class="paymentDiv">
                <img src="{{asset('images/Group42.png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group40.png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group 39 (2).png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group 38 (2).png')}}" alt="">
              </div>
            </div>
            <div class="paymentMulti">
              <div class="paymentDiv">
                <img src="{{asset('images/Group42.png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group40.png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group 39 (2).png')}}" alt="">
              </div>
              <div class="paymentDiv">
                <img src="{{asset('images/Group 38 (2).png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>