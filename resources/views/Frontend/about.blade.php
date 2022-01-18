 @extends('layouts.frontend.master')
 @section('title')
 About Us
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
     <div class="midDiv aboutSection">
         <div class="bgColor">
             <div class="descriptionDiv" style="padding: 20px;">
                 <p class="rightNow">ABOUT PROJECT</p>
                 <p>Cow price start with 35 gold coins.</p>
                 <p>Automatic system of milk collecting! Collecting milk 4 without losses and restrictions in time! collect milk as it's convenient for you!</p>
                 <p>Even once an hour, even once a day, even once a month! The milk don't disappear or get rotten! Well organized market allows to sell all the milk for gold coins and gold bars immediately!</p>
                 <p>In the process of the game ne blocks will be added which will allow to fill up reserve for buying the ilk that will give additional guarantee to the players!</p>
                 <p>Maximal fast payoffs of money to your wallet!</p>
                 <p>You will find a lot of cow each cow has its own price and its productivity, each subsequent bird will bring more income then the previous one.<br>
                     There are several types of resources in the project - crystals and gold, there are 2 types of gold: <<gold coins>> (for purchase) and <<gold bars>> (for withdrawal). For gold coins (for purchase), you can buy new cows.<br>
                             Gold bars for the withdrawal and crystals you can exchange for real money, and withdraw them to your electronic wallet automaticaly.<br>
                             to buy cows you have to replenish your balance for purchases on the amount you nedd.<br>
                             After replenishing your account, go to <<cow shop>> And buy the cows you want.<br>
                 </p>
             </div>
         </div>
         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection