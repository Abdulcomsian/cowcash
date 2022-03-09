  @extends('layouts.frontend.master')
  @section('title')
  Buy Cows
  @endsection
  @section('css')
  <style>
      .cursor-pointer {
          cursor: pointer;
      }

      .bgColor {
          overflow: hidden;
      }

      /* .cowShop .multipleDiv {
          height: 240px;
          overflow: scroll;
      } */
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv cowShop">
          <div class="bgColor">
              <p class="rightNow">COW SHOP</p>
              <div class="scroll-rtl">
                  <div class="detailDiv">
                      <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for silver coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
                  </div>
              </div>
              <div class="alreadyPurchased">
                  <p>You have already purchased: <b>{{$perchasecows ?? 0}} cow</b></p>
                  <img src="{{asset('frontend/assets/img/coinsCow.png')}}" alt="">
              </div>
              <div class="detail-scroll-rtl">
                  <div class="multipleDiv">
                      @foreach($cows as $cow)
                      <div class="commonDiv">
                          <div class="imgDiv">
                              <img src="{{asset('frontend/assets/img/cow1.png')}}" alt="">
                          </div>
                          <form method="post" action="{{url('account/take-order')}}">
                              @csrf
                              <div class="detailCowDiv">
                                  <h5>{{$cow->cowName ?? ''}}</h5>
                                  <p>Productivity: {{$cow->litters ?? ''}} litter milk per hour</p>
                                  <p>Cost: {{$cow->price ?? ''}} Silver Coins</p>
                                  <p>Already bought: {{\App\Utils\HelperFunctions::boughtcows($cow->id)}}</p>
                                  <div class="inputDiv">
                                      <input type="number" name="qty" id="qty" value="1" required>
                                      <input type="hidden" name="item" id="item" value="{{$cow->id}}" />
                                      <label for="">Pcs.</label>
                                      <button class="cursor-pointer">Buy</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                      @endforeach
                  </div>
              </div>
          </div>
          <p style="font-family: Nexa-Regular !important;font-size: 14px;font-weight: bold;color: #000;">You will be able to buy much more cows if you<br> <a id="myBtn" type="button"><b style="color: #7d3701;">replenish the account</b></a>. “</p>
          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection