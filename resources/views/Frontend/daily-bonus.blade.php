 @extends('layouts.frontend.master')
 @section('title')
 Daily Bonus
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
     <div class="midDiv dailyBonustwo">
         <div class="poly"></div>
         <p class="rightNow">DAILY BONUS</p>
         <div class="bgColor">
             <p style="margin-top:70px">You can receive bonus every 12 hours.<br>Bonus is credited in silver coins to the account for purchases. The sum of the bonus is generated randomly form 10 to 100 silver coins.</p>
             @if(\Auth::user()->bonus_status==1)
             <br>
             <span>You will be able to receive next bonus in </span>
             <div class="counter" style='color: green;'>

                 @php
                 $nowtime=Carbon\Carbon::now()->format('Y-m-d H:i:s');
                 $to=Carbon\Carbon::createFromFormat('Y-m-d H:i:s', \Auth::user()->bonus_time);
                 $difference = $to->diff($nowtime);
                 @endphp
                 <span class='e-m-days' style="display: none;">0 Days |</span>
                 <span class='e-m-hours'>{{$difference->h}}</span> Hours |
                 <span class='e-m-minutes'>{{$difference->i}}</span> Minutes |
                 <span class='e-m-seconds'>{{$difference->s}}</span> Seconds

             </div>
             @endif
             @if(\Auth::user()->bonus_status==0)
             <form method="post" action="{{url('account/collect-bonus')}}">
                 @csrf
                 <button class="commonBtn cursor-pointer" type="submit">Get a Bonus</button>
             </form>
             @endif
         </div>
         @include('Frontend.includes.menues')

     </div>
 </section>

 @endsection
 @section('script')
 <script>
     $(function() {
         function getCounterData(obj) {
             var days = parseInt($('.e-m-days', obj).text());
             var hours = parseInt($('.e-m-hours', obj).text());
             var minutes = parseInt($('.e-m-minutes', obj).text());
             var seconds = parseInt($('.e-m-seconds', obj).text());
             console.log(days + " " + hours + " " + minutes + " " + seconds);
             return seconds + (minutes * 60) + (hours * 3600) + (days * 3600 * 24);
         }

         function setCounterData(s, obj) {
             var days = Math.floor(s / (3600 * 24));
             var hours = Math.floor((s % (60 * 60 * 24)) / (3600));
             var minutes = Math.floor((s % (60 * 60)) / 60);
             var seconds = Math.floor(s % 60);
             $('.e-m-days', obj).html(days);
             $('.e-m-hours', obj).html(hours);
             $('.e-m-minutes', obj).html(minutes);
             $('.e-m-seconds', obj).html(seconds);
         }

         var count = getCounterData($(".counter"));
         var timer = setInterval(function() {
             count--;
             if (count == 0) {
                 clearInterval(timer);
                 return;
             }
             setCounterData(count, $(".counter"));
         }, 1000);
     });
 </script>

 @endsection