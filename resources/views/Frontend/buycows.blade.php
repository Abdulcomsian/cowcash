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

      .cowShop .multipleDiv {
          height: 325px;
          overflow: scroll;
      }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv cowShop">
          <div class="bgColor">
              <p class="rightNow">COW SHOP</p>
              <br><br><br><br>
              <div class="detailDiv">
                  <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for gold coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
                  <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for gold coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
                  <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for gold coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
                  <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for gold coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
                  <p>At the shop you can buy different cows. Each cow gives special milk, which can be sold at the market and exchanged for gold coins that are required for the real money withdrawal. Every type of cow has different productivity - the more expensive the cow is, the more milk it gives. You can buy unlimited amount of cows. Our cows don't die and will always produce milk!</p>
              </div>
              <div class="alreadyPurchased">
                  <p>You have already purchased: <b>{{$perchasecows ?? 0}} cow</b></p>
                  <img src="{{asset('frontend/assets/img/coinsCow.png')}}" alt="">
              </div>
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
                              <p>Productivity: {{$cow->litters ?? ''}} Litters Milk a day</p>
                              <p>Cost: {{$cow->price ?? ''}} Gold Coins</p>
                              <p>Already boughtL {{\App\Utils\HelperFunctions::boughtcows($cow->id)}}</p>
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
                  <!-- <div class="commonDiv">
                      <div class="imgDiv">
                          <img src="{{asset('frontend/assets/img/cow3.png')}}" alt="">
                      </div>
                      <div class="detailCowDiv">
                          <h5>Butter Cup</h5>
                          <p>Productivity: 2kg Milk a day</p>
                          <p>Cost: 35 Gold Coins</p>
                          <p>Already boughtL 0</p>
                          <div class="inputDiv">
                              <input type="text" name="" id="">
                              <label for="">Pcs.</label>
                              <button>Buy</button>
                          </div>
                      </div>
                  </div>
                  <div class="commonDiv">
                      <div class="imgDiv">
                          <img src="{{asset('frontend/assets/img/cow2.png')}}" alt="">
                      </div>
                      <div class="detailCowDiv">
                          <h5>Brownie</h5>
                          <p>Productivity: 2kg Milk a day</p>
                          <p>Cost: 35 Gold Coins</p>
                          <p>Already boughtL 0</p>
                          <div class="inputDiv">
                              <input type="text" name="" id="">
                              <label for="">Pcs.</label>
                              <button>Buy</button>
                          </div>
                      </div>
                  </div> -->
              </div>
          </div>
          <!-- <button class="signUpBtn cursor-pointer" type="submit">Collect All</button> -->
          

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection