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
    @toastr_css
    @yield('css')
</head>

<body class="mainContent">
    @include('Frontend.includes.header')
    @yield('content')

    @include('Frontend.includes.footer')



<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="middleHeader">PURCHASE GOLD COIN</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>1. Select your pack</p>
        <div class="multiPackage">
            <div class="commonPackage">
                <span></span>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->


<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modalBody">
      <p>1. Select your pack</p>
      <div class="multiPackage">
        <div class="packageDiv">
          <p class="percentText">+19%</p>
          <p><b>88204</b></p>
          <span>82433</span>
          <p class="title">Gold Coins</p>
          <img src="{{asset('images/12.png')}}" alt="">
          <button>10 USD</button>
        </div>
        <div class="packageDiv">
        <p class="percentText">+19%</p>
          <p><b>88204</b></p>
          <span>82433</span>
          <p class="title">Gold Coins</p>
          <img src="{{asset('images/12.png')}}" alt="">
          <button>10 USD</button>
        </div>
        <div class="packageDiv">
        <p class="percentText">+19%</p>
          <p><b>88204</b></p>
          <span>82433</span>
          <p class="title">Gold Coins</p>
          <img src="{{asset('images/12.png')}}" alt="">
          <button>10 USD</button>
        </div>
        <div class="packageDiv">
        <p class="percentText">+19%</p>
          <p><b>88204</b></p>
          <span>82433</span>
          <p class="title">Gold Coins</p>
          <img src="{{asset('images/12.png')}}" alt="">
          <button>10 USD</button>
        </div>
        <div class="packageDiv">
        <p class="percentText">+19%</p>
          <p><b>88204</b></p>
          <span>82433</span>
          <p class="title">Gold Coins</p>
          <img src="{{asset('images/12.png')}}" alt="">
          <button>10 USD</button>
        </div>
      </div>
      <div class="horizontalLine">
        <p>OR</p>
      </div>
      <div class="customAmount">
        <div class="inputDiv">
          <label for="">Enter custom amount (USD):</label>
          <input type="text">
          <label for="">=</label>
          <label for=""><img src="{{asset('images/silver-01.png')}}" alt=""> 8244 silver coins</label>
        </div>
      </div>
      <div class="twoThreeStep">
        <div class="checkoutOrder">
          <div class="inputDiv">
            <label for="">2. Checkout order:</label>
            <input type="text">
            <img src="{{asset('images/silver-01.png')}}" alt="">
          </div>
          <div class="imgTable">
            <img src="{{asset('images/basket.png')}}" alt="">
            <table>
              <thead>
                <tr>
                  <td>Pack:</td>
                  <td>8244 gold coins</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><b>Amount:</b></td>
                  <td><b>1.00 USD</b></td>
                </tr>
              </tbody>
            </table>
            
          </div>
          <button class="commonBtn">Purchase</button>
        </div>
        <div class="paymentMethod">
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