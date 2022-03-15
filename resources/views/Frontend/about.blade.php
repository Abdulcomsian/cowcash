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
                 <p class="rightNow">ABOUT PROJECT</p>
                 <p>Cows price starts with 35 silver coins.</p>
                 <p>Automatic system of eggs collecting! Collecting eggs without losses and restrictions in time! collect eggs as it's convenient for you!</p>
                 <p>Even once an hour, even once a day, even once a month! The eggs don't disappear or get rotten! Well organized market allows to sell all the eggs for silver coins and silver blocks immediately!</p>
                 <p>In the process of the game new blocks will be added which will allow to fill up reserve for buying the eggs that will give additional guarantee to the players!</p>
                 <p>Maximal fast payoffs of money to your wallet!</p>
                 <p>You will find a lot of birds, each bird has its own price and its productivity, each subsequent bird will bring more income than the previous one.<br>
                 There are several types of resources in the project - gold bars and gold, there are 2 types of gold: «silver coins» (for purchases) and «silver blocks» (for withdrawal). For silver coins (for purchases), you can buy new cows. Silver blocks for the withdrawal and gold bars you can exchange for real money, and withdraw them to your electronic wallet automatically.
                 </p>
                 <hr>
                 <p>To buy cows you have to <a href="">replenish</a> your balance for purchases on the amount you need.</p>
                 <p>After replenishing your account, go to <a href="">«Cow shop»</a> And buy the cows you want.</p>
                 <p>Right after the purchase of cows you will automatically receive milk from them, you can see their number in the section «Milk warehouse» and collect them for further <a href="">sale</a> for silver and use silver blocks to <a href="">withdraw real money.</a></p>
                 <p>Still have questions related to Cow-Farm? To solve the problem it is enough to apply for help in support of our project and you will be answered by our <a href="">support</a> service, which works 24/7 especially for you!</p>
             </div>
         </div>
         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection