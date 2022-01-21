  @extends('layouts.frontend.master')
  @section('title')
  Milk Wearhouse
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
      <div class="midDiv milkWhareHouse">
          <div class="bgColor">
              <p class="rightNow">Order PayOff</p>
              <div class="milkWhareHouse" style="padding: 30px 10px 10px;">
                  <p style="text-align: left;">Choose the payment system suitable for you from the list of available
                      Payoffs are made in automatic mode.</p>
              </div>
              <p class="notePara">
                  <span>Withdraw your gold bars</span>
                  <span></span>
              </p>
              <div class="commonBox">
                  <a href="">
                      <div class="imgDiv">
                          <img src="{{asset('images/Payeer.png')}}">
                      </div>
                  </a>
              </div>
              <div class="commonBox">
                  <a href="">
                      <div class="imgDiv">
                          <img src="{{asset('images/Paypal.png')}}">
                      </div>
                  </a>
              </div>

          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection