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
                                <p>120x600</p>
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
                    </div>
                </div>
                <br><br>
                <p class="publicpath" style="display: none">@php echo public_path();@endphp</p>
                 
                <div class="main-htmlDiv">
                    <div class="child-htmlDiv">
                        <div class="htmlDiv">
                            <img src="{{asset('images/banners/728x90.png')}}">
                            <p>HTML code for yout referral image (SizeL 728x90)</p>
                            <div class="box">
                                <textarea name="" id="" cols="30" rows="7"><a href="{{auth()->user()->referal_link}}" target="_blank">>                          <img src="{{asset('images/banners/728x90.png')}}" alt="Profit every 10 minutes">
                                </a>
                                </textarea>
                                
                            </div>
                        </div>
                        <!-- {{auth()->user()->referal_link}} " -->
                       <!--  <div class="htmlDiv">
                            <p>HTML code for yout referral image (SizeL 728x90)</p>
                            <div class="box">
                                <textarea name="" id="" cols="30" rows="7"><a href="">https://coin-farm.net/?en=johndoe" target="_blank"</a>
                                <img src="https://coin-farm.net/images/proma/en/728x90.gif" alt="Profit every 10 minutes"></a></textarea>
                                
                            </div>
                        </div> -->
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
        var imagename=$(this).children().text();
        $(".main-htmlDiv").html(`<div class="child-htmlDiv">
                        <div class="htmlDiv">
                            <img src="{{asset('images/banners/`+imagename+`.png')}}">
                            <p>HTML code for yout referral image (SizeL `+imagename+`)</p>
                            <div class="box">
                                <textarea name="" id="" cols="30" rows="7"><a href="{{auth()->user()->referal_link}}">{{auth()->user()->referal_link}} target="_blank"</a>
                                <img src="{{asset('images/banners/`+imagename+`.png')}}" alt="Profit every 10 minutes"></a></textarea>
                                
                            </div>
                        </div>
                    </div>`);
     })
 </script>
 @endsection