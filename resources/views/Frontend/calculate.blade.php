  @extends('layouts.frontend.master')
  @section('title')
  Calculate Income
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
      <div class="midDiv calculateIncome">
          <div class="bgColor">
              <p class="rightNow">CALCULATE INCOME</p>
              <p class="title">Here you can calculate your income</p>
              <p style="text-align: left;">Enter a number of cows to see how much gold they will bring you.</p>
              <p style="text-align: left;">* Please note that you earning will increase exponentially, if you buy new cows
                  for earned gold.</p>
              <p class="yourIncome"><span>Your income:</span> 00.0 per 24 hrs.</p>
              <div class="multiBox">
                  <div class="imgBoxInput">
                      <img src="../assets/img/cow1.png" alt="">
                      <input type="text" name="" id="">
                  </div>
                  <div class="imgBoxInput">
                      <img src="../assets/img/rules.png" alt="">
                      <input type="text" name="" id="">
                  </div>
                  <div class="imgBoxInput">
                      <img src="../assets/img/about.png" alt="">
                      <input type="text" name="" id="">
                  </div>
                  <div class="imgBoxInput">
                      <img src="../assets/img/cow3.png" alt="">
                      <input type="text" name="" id="">
                  </div>
              </div>
              <button class="commonBtn">Sign Up</button>

              <p style="color: #5e3700; text-align: center; font-weight: 600;">Sign Up right now and get Brown cow<br> +300 gold coins as a gift</p>
              <img style="width: 300px" src="../assets/img/Group 291.png" alt="">
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection