  @php
  use Stichoza\GoogleTranslate\GoogleTranslate;
  $tr = new GoogleTranslate(); // Translates to 'en' from auto-detected language by default
  $tr->setSource('en'); // Translate from English
  $tr->setSource(); // Detect language automatically
  $tr->setTarget(Config::get('app.locale')); // Translate to Georgian
  @endphp
  @extends('layouts.frontend.master')
  @section('title')
  Milk warehouse
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
              <p class="rightNow">{{$tr->translate('MILK WHAREHOUSE')}}</p>
              <div class="scroll-rtl-milkWhareHouse">
                  <div class="milkWhareHouse">
                      <p style="text-align: left;">From your container milk sent to the warehouse. <br> Collect them and sell. You can do it once per 1 minute. Milk <br> are always stored in a safe place so you can collect them every minute or even once a month.</p>
                  </div>
              </div>
              <p class="notePara">
                  @php
                  $total_milks=0;
                  foreach( $per_hour_collection as $perhour)
                  {
                   if($perhour->cronjobtime != NULL)
                   {
                      $nowtime=Carbon\Carbon::now()->format('Y-m-d H:i:s');
                      $to=Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$perhour->cronjobtime);
                       $minutes = $to->diffInMinutes($nowtime);
                      $minutesmilk=$perhour->litters*$perhour->bought/60*$minutes;
                      $total_milks=$total_milks+$minutesmilk;
                    }
                  }
                  $total_laid_milk =$total_laid_milk+ $total_milks;
                  @endphp
                  <span>Cows gives: <b id="overalltotalmilk" data-val="{{$total_laid_milk}}">{{number_format((float)$total_laid_milk , 2, '.', '');}} Litters Milk</b></span>
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
                              @php
                              $minutesmilk=0;
                              if($perhour->cronjobtime != NULL)
                             {
                              $nowtime=Carbon\Carbon::now()->format('Y-m-d H:i:s');
                              $to=Carbon\Carbon::createFromFormat('Y-m-d H:i:s',$perhour->cronjobtime);
                              $minutes = $to->diffInMinutes($nowtime);
                              $minutesmilk=$perhour->litters*$perhour->bought/60*$minutes;
                               }
                                @endphp
                             <!--  Minutes: <span class="minutes">{{$minutes}}</span> -->
                              <p class="laidmilkperhour" data-perminut="{{number_format((float)$perhour->litters/60*$perhour->bought, 2, '.', '');}}">{{number_format((float)$perhour->laidmilk+$minutesmilk , 2, '.', '');}}</p>
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
  @section('script')
  <script>
      setInterval(function() {
          var overalltotalmilk = parseFloat($("#overalltotalmilk").attr('data-val'));
          $(".laidmilkperhour").each(function(i, obj) {
              var perminutmlk= $(this).attr('data-perminut');
              var laidmilk = parseFloat($(this).text());
              var totalmilkadded = parseFloat(perminutmlk);
              overalltotalmilk = parseFloat(overalltotalmilk + totalmilkadded);
              var cowmilk=laidmilk+totalmilkadded;
              $(this).text(cowmilk.toFixed(2));
              // var minutes=parseInt($(".minutes").text());
              // $(".minutes").text(minutes+1);
          });
          $("#overalltotalmilk").html(overalltotalmilk.toFixed(2)+ " Litters Milk");
         
      }, 60000);
  </script>
  @endsection