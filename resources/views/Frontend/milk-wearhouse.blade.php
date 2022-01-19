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
              <p class="rightNow">MILK WHAREHOUSE</p>
              <div class="milkWhareHouse" style="padding: 30px 10px 10px;">
                  <p style="text-align: left;">From your container milk sent to the warehouse. Collect them and sell. You can do it once per 1 minute. Milk are always stored in a safe place so you can collect them every minute or even once a month.</p>
              </div>
              <p class="notePara">
                  <span>Cows gives: <b>{{ $total_laid_milk ?? ''}} kg Milk</b></span>
                  <span></span>
              </p>
              <form method="post" action="{{url('account/collect-milk')}}">
                  @csrf
                  @foreach( $per_hour_collection as $perhour)
                  <div class="commonBox">
                      <div class="imgDiv">
                          <img src="{{asset('frontend/assets/img/main.png')}}" alt="">
                      </div>
                      <div class="detailDiv">
                          <p class="title">{{$perhour->cowName ?? ''}}</p>
                          <p>Productivity: <span><b>{{$perhour->litters ?? ''}} kg Per Day</b></span></p>
                          <p>Bought: <span><b>{{$perhour->bought}}</b></span></p>
                          <hr>
                          <p>= {{$perhour->laidmilk ?? ''}}</p>
                          <input type="hidden" name="item[]" value="{{$perhour->id}}" />
                      </div>
                  </div>
                  @endforeach
                  <button class="commonBtn" type="submit">Collect All</button>
              </form>
          </div>

          @include('Frontend.includes.menues')

      </div>
  </section>
  @endsection