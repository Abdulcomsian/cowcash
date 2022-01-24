 @extends('layouts.frontend.master')
 @section('title')
 Rules
 @endsection
 @section('css')
 <style>
     .cursor-pointer {
         cursor: pointer;
     }
     .bgColor{
         overflow: initial;
     }
     .title{
         padding: 20px 20px 0px;
     }
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv rulesProgram">
         <div class="bgColor">
             <p class="rightNow">RULES OF PROJECT</p>
             <div class="rulesDiv">
                 <p class="title">Rules</p>
                 <p style="padding: 0px 20px;">Generalities.</p>
                 <div class="rulesPara">
                     <p>1.1. Present User's Agreement (hereinafter referred to as "Agreement") regulates the order and terms of rendering of service by the site <a href="">coin-farm.net</a>, hereinafter referred to as "Coordinator", and us addressed to an individual who desires to get service from the stated site (hereinafter referred to as "Participant".)</p>
                     <p>1.2. To start getting the service a participant accepts all the rules of the present agreement fully and unconditionally and if you do not agree with any of the terms of the present agreement, the coordinator advise you to disclaim using the service.</p>
                     <p>1.3. The coordinator and the participant accept the order and form of concluding of the present agreement as equivalent in legal validity to an agreement made in a written form.</p>
                     <p>1.4. Administration of coin-farm.net reserves the right to make any changes and additions to the User's agreement and to the site without noticing the users.</p>
                     <p>2.1 Terms and definitions.</p>
                     <p>Game is an activity aimed at satisfying a person's needs in entertainment, pleasure, stress relieving and also at the developemnt of specified skills in the form of free self-expression which doesn't concern achieving utilitarian aims and which bring gladness per se.</p>
                     <p>Playing ground is a hardware-software complex located in the global network Internet aimed for organizing of leisure time.</p>
                 </div>
             </div>
         </div>

         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection