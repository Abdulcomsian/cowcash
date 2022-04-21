 @extends('layouts.frontend.master')
 @section('title')
 About Us
 @endsection
 @section('css')
 <style>
     .cursor-pointer {
         cursor: pointer;
     }
     .bgColor{
         overflow: initial;
         background-size: 100% 100%;
     }
     .descriptionDiv p{
         margin-bottom: 10px;
     }
     .descriptionDiv p a{
        color: #ffd9a9;
     }
 </style>
 @endsection
 @section('content')
 <section id="startRightNow">
     <div class="midDiv aboutSection">
         <div class="bgColor">
             <div class="descriptionDiv" style="padding: 20px; text-align: left;">
                 <p class="rightNow">ABOUT</p>
                 <p>Cows price starts with 150 Silver coins.</p>
                 <p>Automatic system of milk collecting! Collecting milk without losses and restrictions in time! collect milk as it's convenient for you!</p>
                 <p>Even once an hour, even once a day, even once a month! The milk doesn't disappear or get rotten! Well organized market allows to sell all the milk for silver coins and gold blocks immediately!</p>
                 <p>In the process of the game new blocks will be added which will allow to fill up reserve for buying the blik that will give additional guarantee to the players!</p>
                 <p>Maximal fast payoffs of money to your wallet!</p>
                 <p>You will find a lot of cows, each cow has its own price and its productivity, each subsequent cow will bring more income than the previous one.</p>
                 <p>There are several types of resources in the project - gold bars and silver, there are 2 types of silver: «silver coins» (for purchases) and «silver blocks» (for withdrawal). For silver coins (for purchases), you can <a href="account/farm">buy new</a> cows. Silver blocks for the withdrawal and Gold bars you can <a href="account/swap">exchange</a> for real money, and withdraw them to your electronic wallet automatically.</p>
                 <hr>
                 <p>To buy cows you have to <span style="color: #ffd9a9; cursor: pointer;" id="myBtnReplenish">replenish</span> your balance for purchases on the amount you need.</p>
                 <p>After replenishing your account, go to <a href="account/farm">«Cow shop»</a> And buy the cows you want.</p>
                 <p>Right after the purchase of cows you will automatically receive milk from them, you can see their number in the section «Milk warehouse» and collect them for further <a href="account/market">sale</a> for silver and use silver blocks to <a href="account/payment">withdraw real money.</a></p>
                 <p>Still have questions related to Cow-Farm? To solve the problem it is enough to apply for help in <a href="support">support</a> of our project and you will be answered by our support service, which works 24/7 especially for you!</p>
             </div>
         </div>
         @include('Frontend.includes.menues')
     </div>
 </section>
 @endsection