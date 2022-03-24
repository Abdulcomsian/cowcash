  @extends('layouts.frontend.master')
  @section('title')
  Calculate Income
  @endsection
  @section('css')
  <style>
      .cursor-pointer {
          cursor: pointer;
      }

      .bgColor {
          overflow: hidden;
          padding: 10px;
      }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv calculateIncome">
          <div class="bgColor">
              <p class="rightNow">CALCULATE INCOME</p>
              <p class="title" style="margin-top:30px; font-family: Nexa-Bold !important; margin-bottom: 10px;">Here you can calculate your income</p>
              <p>Enter a number of cows to see how much silver they will bring you.</p>
              <p>* Please note that you earning will increase exponentially, if you buy new cows
                  for earned silver.</p>
              @php
              $totalcowsbought=0;
              $cowsmilkperhour=0;
              foreach($cows as $cow)
              {
              if(\App\Utils\HelperFunctions::boughtcows($cow->id))
              {
              $totalcowsbought = \App\Utils\HelperFunctions::boughtcows($cow->id);
              $cowsmilkperhour += $totalcowsbought*$cow->litters;
              }
              }
              $perdayincome= $cowsmilkperhour*24/100;
              $onblanaceper=$perdayincome/100*70;
              $onblncewithdraw=$perdayincome/100*30;
              @endphp
              <br>
              @auth
              <center>
                  <span id="userlogin"></span>
                  <div class="form-control-main break_word bg_white block-calculate text-center">

                      <font style="margin-left:0px; font-weight:500;font-size: 16px;"></font>
                      <div style="">
                          <font style="margin-left:0px; font-weight:500;font-size: 10px;font-family: Nexa-Regular !important;">On balance for purchases: <span style="font-weight:600;" id="res_sum2">{{number_format((float)$onblanaceper, 2, '.', '');}}</span> <img src="{{asset('images/12.png')}}" class="img" width="15px" height="15px" /> Silver coins per 24 hours.<br>
                              On balance for withdrawals: <span style="font-weight:600;" id="res_sum4">{{number_format((float)$onblncewithdraw , 2, '.', '');}}</span> <img src="{{asset('images/12.png')}}" class="img" width="15px" height="15px" /> Silver blocks per 24 hours.
                          </font>
                      </div>

                  </div>
              </center>
              <br>
              @endauth
              @guest
              <p class="yourIncome"><span>Your income:</span>
                  <span id="calperday">{{number_format((float)$perdayincome, 2, '.', '');}}</span> per 24 hrs.
              </p>
              @endguest
              <div class="multiBox">
                  @foreach($cows as $cow)
                  <div class="imgBoxInput">
                      <img src="{{asset($cow->image)}}" alt="">
                      <br>
                      <label style="font-size:10px;font-family: Nexa-Regular !important;">{{$cow->cowName}}</label>
                      <br>
                      <p style="font-size:10px;color:red !important" id="price{{$cow->id}}">{{$cow->litters ?? ''}} Litters</p>
                      <input class="claculateinput" type="text" name="item" id="{{$cow->id}}" value="{{\App\Utils\HelperFunctions::boughtcows($cow->id)}}">
                  </div>
                  @endforeach
              </div>
              @guest
              <button class="commonBtn">
                  <a href="{{url('account/registration')}}" style="color: #fff; text-align: center; font-weight: 600;">Sign Up</a>
              </button>
              <p style="color: #5e3700; text-align: center; font-weight: 600;">Sign Up right now and get Brown cow<br> +300 silver coins as a gift</p>
              <img style="width: 300px" src="../assets/img/Group 291.png" alt="">
              @endguest
          </div>
          <!-- <button class="signUpBtn cursor-pointer" type="submit">Buy Cows</button> -->
          @auth
            <div class="collectBtn">
                  <button class="commonBtn">
                      <a href="{{url('account/farm')}}" style="color: #fff; text-align: center; font-weight: 600;">Buy Cows</a>
                  </button>
              </div>
              @endauth

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection
  @section('script')
  <script>
      $(".claculateinput").bind('keyup mouseup', function() {
          var totalvalue = 0;
          var newvalue = 0;
          $('#startRightNow .midDiv .multiBox .imgBoxInput input ').each(function(i, obj) {
              var $id = $(this).attr('id');
              var value = $(this).val();
              var perhour = parseInt($("#price" + $id + "").text());
              var newvalue = value * perhour;
              console.log(newvalue);
              totalvalue = totalvalue + newvalue;
          })
          var perdayincome = totalvalue * 24 / 100;
          //for login user
          if ($("#userlogin").length > 0) {
              $("#res_sum2").html(parseFloat(perdayincome / 100 * 70).toFixed(2));
              $("#res_sum4").html(parseFloat(perdayincome / 100 * 30).toFixed(2));
          } else { //guest
              $("#calperday").html(parseFloat(perdayincome).toFixed(2));
          }
      })
  </script>
  @endsection