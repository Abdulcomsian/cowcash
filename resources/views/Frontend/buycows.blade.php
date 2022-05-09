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
          background-size: 99% 100%;
          height: 100% !important;
          padding-bottom: 50px;
      }
      .cowShop .scroll-rtl, #startRightNow .midDiv{height:auto;}
      .cowShop .detail-scroll-rtl{height:auto; overflow:auto;}
      /* .cowShop .multipleDiv {
          height: 240px;
          overflow: scroll;
      } */
      #startRightNow .midDiv{
          max-width: 40%;
      }
      #startRightNow .midDiv .menuBox{
          right: -350px;
      }
      #startRightNow .midDiv .menuBox .listView .listdiv{
          margin: 22px;
      }
      .cowShop .multipleDiv {
            direction: ltr;
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: space-around;
        }
        .cowShop .multipleDiv .commonDiv {
            display: flex;
            justify-content: space-around;
            border: 1px solid #ffd9a9;
            width: 44%;
        }
        .cowShop .multipleDiv .commonDiv .imgDiv img{
            width: 50px;
        }
        .commonDiv button{
            width: 100%;
            max-width: 56%;
            /* margin-left: 0px; */
            float: left;
            margin-top: 10px;
            background: #00669b;
            border-radius: 5px;
            border: none;
            padding: 5px;
            color: #fff;
        }
        .cowShop .scroll-rtl{
            overflow: hidden;

        }
        .cowShop .detailDiv{
            padding: 0px 15px 0px 10px;
        }
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
                              <img src="{{asset($cow->image)}}" alt="">
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

                                  </div>
                              </div>
                              <button class="cursor-pointer @if(Auth::user()->silver_coins < $cow->price){{'errorMessage'}}@endif">Buy</button>
                          </form>
                      </div>
                      @endforeach
                  </div>
              </div>
              <p style="font-family: Nexa-Regular !important;font-size: 14px;font-weight: 300;color: #000;">You will be able to buy much more cows if you<br>
              <a id="myBtnModal" style="cursor: pointer;"><b style="color: #7d3701;">replenish the account</b></a>.
            </p>
          </div>
          @include('Frontend.includes.buyCowMenu')

      </div>
  </section>
  @endsection
  @section('script')
  <script>
         $("#myBtnModal").on("click", function() {
         if ($("#myModal").css("display") == "none") {
                $("#myModal").css("display", "block")
         }
     })
         $('.errorMessage').click(function (event) {
             event.preventDefault();
             $('#buyCow').css('display','flex')
         });
  </script>
  @endsection
