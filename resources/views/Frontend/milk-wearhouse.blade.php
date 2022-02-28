  @extends('layouts.frontend.master')
  @section('title')
  Milk Wearhouse
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
      <div class="midDiv milkWhareHouse">
          <div class="bgColor">
              <p class="rightNow">MILK WHAREHOUSE</p>
              <div class="scroll-rtl-milkWhareHouse">
                <div class="milkWhareHouse">
                    <p style="text-align: left;">From your container milk sent to the warehouse. <br> Collect them and sell. You can do it once per 1 minute. Milk <br> are always stored in a safe place so you can collect them every minute or even once a month.</p>
                </div>
              </div>
              <p class="notePara">
                  <span>Cows gives: <b>{{ $total_laid_milk ?? ''}} Litters Milk</b></span>
                  <span></span>
              </p>
              <div class="scroll-rtl-milkWhareSec">
                <form class="milkWhareSec" method="post" action="{{url('account/collect-milk')}}">
                    @csrf
                    @foreach( $per_hour_collection as $perhour)
                    <div class="commonBox">
                        <div class="imgDiv">
                            <img src="{{asset('frontend/assets/img/main.png')}}" alt="">
                        </div>
                        <div class="detailDiv">
                            <p class="title">{{$perhour->cowName ?? ''}}</p>
                            <p>Productivity: <span><b>{{$perhour->litters ?? ''}} Litters Per Hour</b></span></p>
                            <p>Bought: <span><b>{{$perhour->bought}}</b></span></p>
                            <hr>
                            <p>= {{$perhour->laidmilk ?? ''}}</p>
                            <input type="hidden" name="item[]" value="{{$perhour->id}}" />
                        </div>
                    </div>
                    @endforeach
                    <button class="commonBtn cursor-pointer" type="submit">Collect All</button>
                </form>
              </div>
              
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection