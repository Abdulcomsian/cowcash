 @extends('layouts.frontend.master')
 @section('title')
 Daily Bonus
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
     <div class="midDiv dailyBonustwo">
         <div class="poly"></div>
         <p class="rightNow">DAILY BONUS</p>
         <div class="bgColor">
             <p>You can receive bonus every 12 hours.<br>Bonus is credited in gold coins to the account for purchases. The sum of the bonus is generated randomly form 10 to 100 gold coins.</p>
             <button class="commonBtn">Get a Bonus</button>
         </div>

         <div class="menuBox">
             <div class="menuList">
                 <div class="listView">
                     <div class="listdiv">
                         <img src="../assets/img/main.png" alt="">
                         <p>Main</p>
                     </div>
                     <div class="listdiv">
                         <img src="../assets/img/paymentMenu.png" alt="">
                         <p>Payments</p>
                     </div>
                     <div class="listdiv">
                         <img src="../assets/img/rules.png" alt="">
                         <p>Rules</p>
                     </div>
                 </div>
                 <div class="listView">
                     <div class="listdiv">
                         <img src="../assets/img/about.png" alt="">
                         <p>About</p>
                     </div>
                     <div class="listdiv">
                         <img src="../assets/img/calculate.png" alt="">
                         <p>Calculate</p>
                     </div>
                     <div class="listdiv">
                         <img src="../assets/img/support.png" alt="">
                         <p>Support</p>
                     </div>
                 </div>
             </div>
         </div>

     </div>
 </section>
 @endsection