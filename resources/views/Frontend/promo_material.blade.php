@extends('layouts.frontend.master')
 @section('title')
Promo Materials
 @endsection
 @section('css')
 <style>
     .cursor-pointer {
         cursor: pointer;
     }
     .bgColor{
         height: 93%;
     }
     .active{
         background-color: #fff !important;
     }
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv promoMaterial">
         <div class="bgColor">
             <div class="descriptionDiv" style="padding: 60px 20px;">
                 <p class="rightNow">PROMO MATERIALS</p>

                 <div class="multiSelect">
                    <div class="selectOption active">
                         <p>728x90</p>
                     </div>
                     <div class="selectOption">
                         <p>468x60</p>
                     </div>
                     <div class="selectOption">
                         <p>240x400</p>
                     </div>
                     <div class="selectOption">
                         <p>200x300</p>
                     </div>
                 </div>
                 <div class="multiSelect">
                     <div class="selectOption">
                         <p>250x250</p>
                     </div>
                     <div class="selectOption">
                         <p>160x600</p>
                     </div>
                     <div class="selectOption">
                         <p>100x100</p>
                     </div>
                     <div class="selectOption">
                         <p>125x125</p>
                     </div>
                 </div>
                 <div class="multiSelect">
                     <div class="selectOption">
                         <p>320x50</p>
                     </div>
                     <div class="selectOption">
                         <p>120x600</p>
                     </div>
                     <div class="selectOption">
                         <p>125x125</p>
                     </div>
                     <div class="selectOption">
                         <p>180x150</p>
                     </div>
                 </div>
                 <div class="multiSelect">
                     <div class="selectOption">
                         <p>200x200</p>
                     </div>
                     <div class="selectOption">
                         <p>300x250</p>
                     </div>
                     <div class="selectOption">
                         <p>336x280</p>
                     </div>
                     <div class="selectOption">
                         <p>970x90</p>
                     </div>
                 </div>
                <div class="htmlDiv">
                    <p>HTML code for yout referral image (SizeL 728x90)</p>
                    <div class="box">
                        <textarea name="" id="" cols="30" rows="7"><a href="">https://coin-farm.net/?en=johndoe" target="_blank"</a>
                        <img src="https://coin-farm.net/images/proma/en/728x90.gif" alt="Profit every 10 minutes"></a></textarea>
                        
                    </div>
                </div>
                <div class="htmlDiv">
                    <p>HTML code for yout referral image (SizeL 728x90)</p>
                    <div class="box">
                        <textarea name="" id="" cols="30" rows="7"><a href="">https://coin-farm.net/?en=johndoe" target="_blank"</a>
                        <img src="https://coin-farm.net/images/proma/en/728x90.gif" alt="Profit every 10 minutes"></a></textarea>
                        
                    </div>
                </div>
             </div>
         </div>
         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection