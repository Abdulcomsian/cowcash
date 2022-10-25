   @extends('layouts.frontend.master')
   @section('title')
   Account Referal
   @endsection
   @section('css')
   <style>
       .cursor-pointer {
           cursor: pointer;
       }
       .bgColor{
           overflow: hidden !important;
       }
       .linkCopy{
           display: flex;
           align-items: center;
       }
       .copyText{
           cursor: pointer;
           position: relative;
            right: 0px;
       }
       .hoverText{
           display: none;
           position: absolute;
            right: -24px;
            top: 3px;
            font-size: 10px;
            transition: all .5s;
            font-family: Nexa-Regular !important;

       }
       .copiedText{display:none;}
       .copyText:hover .hoverText{
           display: block;
       }
       .pagination
       {
        display: flex;
        list-style: none;
       }
       .pagination li{
        padding:10px;
       }

       button{
            width: 100%;
            max-width: 25%;
            margin-top: 10px;
            background: #00669b;
            border-radius: 5px;
            border: none;
            padding: 5px;
            color: #fff;
       }

       
   </style>
   @endsection

@section('content')
    <section id="startRightNow">
        <div class="midDiv">
             <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
           <ins class="6357f5a99fae580a7534d3f1" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
            <div class="bgColor">
                <p class="rightNow">AFFILIATE PROGRAM</p>
                    <div class="main-affiliateProgram">
                            <div class="affiliateProgram ">
                                <p><b>Invite your friends to the game !</b></p>
                                <div class="tabeDiv">
                                    <p class="active silverCoinsTab">For earning Silver Coins</p>
                                    <p class="silverBlockTab">For earning Gold Bars
                                        
                                    </p>
                                </div>
                                <div class="silverCoins">
                                    <p style="margin: 20px 0px; color: #000 !important;">You will get <b style="font-family: Nexa-Bold;">Silver coins</b> for purchases from every replenishment of the silver coins account by the person invited by you.<b style="font-family: Nexa-Bold;">Affiliate income is unlimited.</b> Even several invited people can bring you more than 100 000 silver coins.</p>
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
                                               
                                                <tr>
                                                    <td>For referral with unique IP address ({{$referalcount}}/20 per day):</td>
                                                    <td>250  Silver coins (for purchases)</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <p style="margin-top: 20px;">Your referral link:</p>
                                    <div class="linkCopy">
                                        <p id="linked" class="linkText"><a href="">{{\Auth::user()->referal_link ?? ''}}</a></p> 
                                        <span class="copyText" onclick="copyFunction()"><i class="fa fa-copy"></i>  
                                        <span class="copiedText">copied</span></span>
                                        <span class="hoverText">copy</span></span>
                                       
                                    </div>
                                   
                                    <div class="amountDiv">
                                        <p>Amount of your referrals: {{$userreferaltotal}} users</p>
                                        <table>
                                            <thead style="background-color: #e6ceaf;padding: 5px;">
                                                <tr>
                                                    <td>Username</td>
                                                    <td>Sign up date</td>
                                                    <td>Income in Silver Blocks</td>
                                                </tr>
                                            </thead>
                                            <tbody id="referals">
                                                @foreach($userreferal as $referal)
                                                @if($referal->user != null)
                                                <tr>
                                                    <td>{{$referal->user->name ?? ''}}</td>
                                                    <td>{{$referal->user->created_at ?? ''}}</td>
                                                    <td>
                                                        {{$referal->referal_coins ?? ''}}
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    @if(count($userreferal)>0)
                                     <button class="cursor-pointer see-more" data-page="2" data-link="{{url('account/referal')}}?page=" data-div="#referals">show more</button>
                                     @endif
                                    
                                   <!--  <div class="col-md-6" style="margin-bottom:10px">
                                      {{$userreferal->links("pagination::bootstrap-4")}}
                                   </div> -->
                                </div>
                                <div class="silverBlock">
                                    <p style="margin: 20px 0px; color: #000 !important;">You will get <b style="font-family: Nexa-Bold;">Gold bars</b> from every replenishment of the Silver coins account by the person invited by you. <b style="font-family: Nexa-Bold;">Affiliate income is unlimited.</b> Even several invited people can bring you more than 1000 Gold bars.</p>
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
                                                    <td><b>5%</b> of the repenishment sum</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <p style="margin-top: 20px;">Your referral link:</p>
                                    <div class="linkCopy">
                                        <p class="linkText"><a href="">{{\Auth::user()->referal_link ?? ''}}</a></p>
                                        <span class="copyText" onclick="copyFunction()"><i class="fa fa-copy"></i> <span class="hoverText">copy</span></span>
                                        
                                    </div>
                                    <div class="amountDiv">
                                       <p>Amount of your referrals: {{$userreferaltotal}} users</p>
                                        <table>
                                            <thead style="background-color: #e6ceaf;padding: 5px;">
                                                <tr>
                                                    <td>Username</td>
                                                    <td>Sign up date</td>
                                                    <td>Income in Silver Blocks</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                 @foreach($userreferal as $referal)
                                                @if($referal->user != null)
                                                <tr>
                                                    <td>{{$referal->user->name ?? ''}}</td>
                                                    <td>{{$referal->user->created_at ?? ''}}</td>
                                                    <td>
                                                        {{$referal->referal_coins ?? ''}}
                                                   </td>
                                                </tr>
                                                @endif
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                     @if(count($userreferal)>0)
                                     <button class="cursor-pointer see-more" data-page="2" data-link="{{url('account/referal')}}?page=" data-div="#referals">show more</button>
                                     @endif
                                </div>
                            </div>
                    </div>
                
            </div>
           @include('Frontend.includes.menues')

    </div>
        </div>
    </section>
    
@endsection
@section('script')
<script type="text/javascript">
    $(document).unbind().on("click",".see-more",function() {
        console.log("here");
      $link = $(this).data('link'); //current URL
      $page = $(this).data('page'); //get the next page #
      $href = $link + $page; //complete URL
        $.ajax({
                url: $href,
                datatype: "html",
                type: "get",
                beforeSend: function () {
                    
                }
            })
            .done(function (response) {
                if (response.length == 0) {
                    alert("We don't have more data to display :(");
                    return;
                }
                 $("#referals").append(response);
                 $("html, body").animate({ scrollTop: $(document).height() }, 1000);
            })
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occured');
            });
     
      $(this).data('page', (parseInt($page) + 1)); //update page #
    });
</script>
@endsection