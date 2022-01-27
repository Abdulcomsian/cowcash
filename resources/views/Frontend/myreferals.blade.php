   @extends('layouts.frontend.master')
   @section('title')
   Account Referal
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
       <div class="midDiv">
           <div class="bgColor">
               <p class="rightNow">AFFILIATE PROGRAM</p>
               <div class="affiliateProgram">
                   <p><b>Invite your friends to the game !</b></p>
                   <div class="tabeDiv">
                       <p class="active">For earning gold coins</p>
                       <p>For earning crystal</p>
                   </div>
                   <p style="margin: 20px 0px; color: #000 !important;">You will get <b>gold coins</b> for purchase from every replenishment or the
                       old coins account ov the person invited ov vou.
                       Affiliate income is unlimited. Even several invited people car
                       bring you more than IOC
                       000 gold coins</p>
                   <div class="patnerDiv">
                       <p style="background-color: #e6ceaf;padding: 5px;">Partners Program</p>
                       <table>
                           <tbody>
                               <tr>
                                   <td>For each replenishment by a referral of †he 1st level:</td>
                                   <td><b>20%</b> of the repenishment sum</td>
                               </tr>
                               <tr>
                                   <td>For each replenishment by a referral of †he 2nd level:</td>
                                   <td><b>10%</b> of the repenishment sum</td>
                               </tr>
                               <tr>
                                   <td>For each replenishment by a referral of †he 3rd level:</td>
                                   <td><b>5%</b> of the repenishment sum</td>
                               </tr>
                               <!-- <tr>
                                   <td>For each replenishment by a referral of †he 4th level:</td>
                                   <td><b>1%</b> of the repenishment sum</td>
                               </tr> -->
                               <tr>
                                   <td>For referral with unique IP address (0/20 per day):</td>
                                   <td><b>250</b> Gold coins</td>
                               </tr>
                           </tbody>
                       </table>
                   </div>
                   <p style="margin-top: 20px;">Your referral link:</p>
                   <p class="linkText"><a href="">{{\Auth::user()->referal_link ?? ''}}</a></p>
                   <div class="amountDiv">
                       <p>Amount of your referrals: {{count($userreferal ?? 0)}} users</p>
                       <table>
                           <thead style="background-color: #e6ceaf;padding: 5px;">
                               <tr>
                                   <td>Username</td>
                                   <td>Sign up date</td>
                                   <td>Income in gold coins</td>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach($userreferal as $referal)
                               <tr>
                                   <td>{{$referal->name ?? ''}}</td>
                                   <td>{{$referal->created_at ?? ''}}</td>
                                   <td>30 coins</td>
                               </tr>
                               @endforeach
                           </tbody>
                       </table>
                   </div>
               </div>
           </div>

           @include('Frontend.includes.menues')

       </div>
   </section>
   @endsection