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
     #startRightNow .midDiv .detailBox p{
         width: 100%;
         max-width: 90%;
     }
     /* @media (min-width: 1600px) {
        #startRightNow .midDiv .detailBox p{
            padding-right: 80px;
        }
     } */
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv">
         <div class="bgColor">
             <p class="rightNow">MILK SELLING</p>
             <div class="detailBox">
                 <!-- <p>Here you can see eggs and get silver that is required for  the real money withdrawal. The silver got after selling are divided between two of your accounts - Silver coins (for purchase) and silver blocks (for withdrawal) in proportion: 70% to the Silver coins (account for purchases) and 30% to the silver blocks (account for withdrawal).</p> -->
                 <p>From your farm, milk is sent to the warehouse. Collect it and sell. You can do it once per 1 minute. Milk is always stored in a safe place so you can collect it every minute or even once a month.</p>
                 <p>Sale rate of milk: 100 liter milk = 1 Silver Coin</p>
             </div>
             <p class="notePara">
                 <span>You have at the warehouse {{$totalmilkforsale ?? ''}} liter milk for sale</span>
                 <span></span>
             </p>
             <form method="post" action="{{url('account/sold-milk')}}">
                 @csrf
                 <div class="dailyBonusTable">
                     <table class="table-responsive">
                         <thead>
                             <tr>
                                 <td>Image</td>
                                 <td>You have at the warehouse</td>
                                 <td>Worth (Silver Coins)</td>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($milkforsell as $sell)
                             <tr>
                                 <td>
                                      <div class="imgDiv">
                                        <img src="{{asset($sell->cow->image)}}" width="50px" height="50px" alt="">
                                    </div>
                                 </td>
                                 <td>{{$sell->total_milk ?? ''}} liter milk</td>
                                 @php
                                 $goldbar=$sell->total_milk/100;
                                 @endphp
                                 <td> <img src="{{asset('images/112.png')}}" class="img" width="15px" height="15px" /> {{$goldbar ?? ''}}</td>
                             </tr>
                             <input type="hidden" name="item[]" value="{{$sell->id}}" readonly />
                             @endforeach
                         </tbody>
                     </table>
                 </div>
                 <button class="commonBtn cursor-pointer" type="submit">Sell All</button>
             </form>
         </div>

         @include('Frontend.includes.menues')
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
            <ins class="635148731dca4635dfdc0233" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>

     </div>
 </section>
 @endsection