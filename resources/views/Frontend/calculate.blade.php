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
      }
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv calculateIncome">
          <div class="bgColor">
              <p class="rightNow">CALCULATE INCOME</p>
              <p class="title" style="margin-top:60px">Here you can calculate your income</p>
              <p>Enter a number of cows to see how much gold they will bring you.</p>
              <p>* Please note that you earning will increase exponentially, if you buy new cows
                  for earned gold.</p>
              @php
              $totalcowsbought=0;
              foreach($cows as $cow)
              {
              $totalcowsbought+=\App\Utils\HelperFunctions::boughtcows($cow->id);
              }
              $perdayincome= $totalcowsbought*24/100;
              @endphp

              <p class="yourIncome"><span>Your income:</span>
                  <span id="calperday">{{$perdayincome}}</span> per 24 hrs.
              </p>
              <div class="multiBox">
                  @foreach($cows as $cow)
                  <div class="imgBoxInput">
                      <img src="{{asset('frontend/assets/img/coinsCow.png')}}" alt="">
                      <br>
                      <label style="font-size:10px">{{$cow->cowName}}</label>
                      <br>
                      <p style="font-size:10px;color:red !important" id="price{{$cow->id}}">{{$cow->litters ?? ''}} Litters</p>
                      <input class="claculateinput" type="text" name="item" id="{{$cow->id}}" value="{{\App\Utils\HelperFunctions::boughtcows($cow->id)}}">
                  </div>
                  @endforeach
              </div>
              @guest
              <button class="commonBtn">Sign Up</button>
              <p style="color: #5e3700; text-align: center; font-weight: 600;">Sign Up right now and get Brown cow<br> +300 gold coins as a gift</p>
              <img style="width: 300px" src="../assets/img/Group 291.png" alt="">
              @endguest
          </div>

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
          $("#calperday").html(perdayincome);
      })
  </script>
  @endsection