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
          overflow: hidden;
          background-size: 100% 100%;
      }
     .active{
         background-color: #fff !important;
     }
     #startRightNow .midDiv p{cursor:pointer;}
 </style>
 @endsection

 @section('content')
 <section id="startRightNow">
     <div class="midDiv promoMaterial">
         <div class="bgColor">
             <div class="descriptionDiv" style="padding: 60px 7px !important;">
                 <p class="rightNow">PROMO MATERIALS</p>
                <div class="main-promoDiv">
                    <div class="promoDiv">
                        <div class="multiSelect">
                            <div class="selectOption active">
                                <p>728x90</p>
                            </div>
                            <div class="selectOption">
                                <p>468x60</p>
                            </div>
                            <div class="selectOption thirdOption">
                                <p>240x400</p>
                            </div>
                            <div class="selectOption forthOption">
                                <p>200x300</p>
                            </div>
                            <div class="selectOption">
                                <p>250x250</p>
                            </div>
                            <!-- <div class="selectOption sixthOption">
                                <p>120x600</p>
                            </div> -->
                            <div class="selectOption seventhOption">
                                <p>100x100</p>
                            </div>
                            <!-- <div class="selectOption eigthOption">
                                <p>125x125</p>
                            </div> -->
                            <div class="selectOption">
                                <p>320x50</p>
                            </div>
                            <div class="selectOption seventhOption">
                                <p>120x600</p>
                            </div>
                            <div class="selectOption seventhOption">
                                <p>125x125</p>
                            </div>
                            <div class="selectOption 12Option">
                                <p>180x150</p>
                            </div>
                            <div class="selectOption 13Option">
                                <p>200x200</p>
                            </div>
                            <div class="selectOption 14Option">
                                <p>300x250</p>
                            </div>
                            <div class="selectOption 15Option">
                                <p>336x280</p>
                            </div>
                            <div class="selectOption 16Option">
                                <p>970x90</p> 
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
                <p class="publicpath" style="display: none">@php echo public_path();@endphp</p>
                 
                <div class="main-htmlDiv">
                    <div class="child-htmlDiv">
                        <div class="htmlDiv">
                            <img style="width:100%" src="{{asset('images/banners/728x90.png')}}">
                            <p>HTML code for yout referral image (SizeL 728x90)</p>
                            <div class="box">
                                <textarea name="" id="" cols="30" rows="7"><a href="{{auth()->user()->referal_link}}" target="_blank"><img style="width:100%" src="{{asset('images/banners/728x90.png')}}" alt="Profit every 10 minutes"></a>
                                </textarea>
                            </div>
                        </div>
                    </div>

                    
                </div>
             </div>
         </div>
         @include('Frontend.includes.menues')

     </div>
 </section>
 @endsection
 @section('script')
 <script type="text/javascript">
     $(".selectOption").click(function(){
         var size= $(this).text();
         var sizes= size.split(" ")
         console.log(sizes)
        var imagename=$(this).children().text();
        $(".main-htmlDiv").html(`<div class="child-htmlDiv">
                        <div class="htmlDiv">
                            <img style="width:100%" src="{{asset('images/banners/`+imagename+`.png')}}">
                            <p>HTML code for yout referral image (Size: `+imagename+`)</p>
                            <div class="box">
                                <textarea name="" id="" cols="30" rows="7"><a href="{{auth()->user()->referal_link}}">{{auth()->user()->referal_link}} target="_blank"</a>
                                <img style="width:100%" src="{{asset('images/banners/`+imagename+`.png')}}" alt="Profit every 10 minutes"></a></textarea>
                                
                            </div>
                        </div>
                    </div>`);
     })
     $(".promoMaterial .multiSelect .selectOption").click(function(){
         $(".promoMaterial .multiSelect .selectOption").removeClass("active");
         $(this).addClass("active")
     })
     $(".thirdOption").click(function(){
         $(".htmlDiv img").css("width","240px")
         $(".htmlDiv img").css("height","400px")
     })
     $(".forthOption").click(function(){
         $(".htmlDiv img").css("width","200px")
         $(".htmlDiv img").css("height","300px")
     })
     $(".sixthOption").click(function(){
         $(".htmlDiv img").css("width","120px")
         $(".htmlDiv img").css("height","600px")
     })
     $(".seventhOption").click(function(){
         $(".htmlDiv img").css("width","100px")
         $(".htmlDiv img").css("height","100px")
     })
     $(".eigthOption").click(function(){
         $(".htmlDiv img").css("width","125px")
         $(".htmlDiv img").css("height","125px")
     })
     $(".12Option").click(function(){
         $(".htmlDiv img").css("width","180px")
         $(".htmlDiv img").css("height","150px")
     })
     $(".13Option").click(function(){
         $(".htmlDiv img").css("width","200px")
         $(".htmlDiv img").css("height","200px")
     })
     $(".14Option").click(function(){
         $(".htmlDiv img").css("width","300px")
         $(".htmlDiv img").css("height","250px")
     })
     $(".15Option").click(function(){
         $(".htmlDiv img").css("width","336px")
         $(".htmlDiv img").css("height","280px")
     })
     $(".16Option").click(function(){
         $(".htmlDiv img").css("width","970px")
         $(".htmlDiv img").css("height","90px")
     })
 </script>
 @endsection