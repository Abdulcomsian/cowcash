 @extends('layouts.frontend.master')
 @section('title')
 Sell Milk
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
     <div class="midDiv">
         <div class="bgColor">
             <p class="rightNow">MILK SELLING</p>
             <div class="detailBox">
                 <p>Here you can see eggs and get gold that is required for <br> the real money withdrawal. The gold got after selling are divided between two of your accounts - Silver coins (for purchase) and gold bars (for withdrawal) in proportion: 70% to the Silver coins (account for purchases) and 30% to the gold bars (account for withdrawal).</p>
                 <p>Sale rate of milk: 100 liter milk = 1 Silver Coin</p>
             </div>
             <p class="notePara">
                 <span>You have at the warehouse {{$totalmilkforsale ?? ''}} liter milk for sale</span>
                 <span></span>
             </p>
             <form method="post" action="{{url('account/sold-milk')}}">
                 @csrf
                 <div class="dailyBonusTable">
                     <table>
                         <thead>
                             <tr>
                                 <td>Name</td>
                                 <td>You have at the warehouse</td>
                                 <td>Worth (Silver Coins)</td>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($milkforsell as $sell)
                             <tr>
                                 <td>{{$sell->cow->cowName ?? ''}}</td>
                                 <td>{{$sell->total_milk ?? ''}} liter milk</td>
                                 @php
                                 $goldbar=$sell->total_milk/100;
                                 @endphp
                                 <td> <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" /> {{$goldbar ?? ''}}</td>
                             </tr>
                             <input type="hidden" name="item[]" value="{{$sell->id}}" readonly />
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                 <button class="signUpBtn cursor-pointer" type="submit">Sell All</button>
             </form>
         </div>

         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection