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
         background-size: 100% 100%;
         padding: 10px;
     }
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv">
         <div class="bgColor">
             <p class="rightNow">FAQ</p>
             <div class="detailBox">
                 <!-- <p>Here you can see milk and get silver that is required for  the real money withdrawal. The silver got after selling are divided between two of your accounts - Silver coins (for purchase) and silver blocks (for withdrawal) in proportion: 70% to the Silver coins (account for purchases) and 30% to the silver blocks (account for withdrawal).</p> -->
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> How to start playing?<br><b style="font-family: 'Poppins', sans-serif !important">Answer:</b> After registration in the project you go to the section <a href="" style="color: #ffd9a9;">«Buy cows»</a>, where you make necessary buyings. Then <a href="" style="color: #ffd9a9;">collect milk, sell</a> them and get gold coins and gold bars.</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> If I didn't replenish the account, can I start playing? <br><b style="font-family: 'Poppins', sans-serif !important">Answer:</b> Yes, you can! Daily bonus will allow you to collect some gold coins to buy cows.</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> How to replenish the account? <br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> You can replenish your account in the section <a href="" style="color: #ffd9a9;">«Replenish account»</a> in any convenient way for you.</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> How to withdraw earnings?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> You can withdraw what you have earned in the section <a href="" style="color: #ffd9a9;">«Withdraw funds»</a>.</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> How soon can I start withdraw the money?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> Right away after replenishment and buying cows, in the section <a href="" style="color: #ffd9a9;">«Withdraw money»</a>. Before withdrawal of the means you need to collect all the milk to the warehouse and exchange them to gold!</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> I replenished the account, but the money didn't come - what to do?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> Wait. The speed of the replenishment depends on the chosen way of payment. That's why the time of payment can vary from 1 second till 2 minutes. If the money still didn't come to your account then and only write an application to the support service with full information about the payment (Paying system, date, sum, E-mail that you entered when you replenished your account).</p>
                 <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> I replenished the account, but the money didn't come - what to do?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> You need to send your referral link <a href="" style="color: #ffd9a9;">(https://coin-farm.net/?en=username)</a> to the user whom you want to invite. As soon as this person replenishes the account - he/she will be considered your active referral, and you'll get bonuses for him/her! You can also order a promotion of your referral link in the section <a href="" style="color: #ffd9a9;">«Referral promotion»</a>. <a href="" style="color: #ffd9a9;">«My referrals»</a> - here you can track the activity of your referrals!</p>
                <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> I want to change my referrer/referral, how to do that?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> Unfortunately this data is impossible to be changed! If your friend didn't become your referral after registration, it means that he registered by not your link.</p>
                <p><b style="font-family: 'Poppins', sans-serif !important">Question:</b> Levels of referrals - what is that?<br> <b style="font-family: 'Poppins', sans-serif !important">Answer:</b> 1 level is your referral. 2 level is a referral of your referral. 3 level is a referral of your referral's referral.</p>
                </div>
             <p class="notePara">
                 <span>You have at the warehouse {{$totalmilkforsale ?? ''}} liter milk for sale</span>
                 <span></span>
             </p>
         </div>

         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection