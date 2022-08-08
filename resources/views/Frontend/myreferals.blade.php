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
   </style>
   @endsection

@section('content')
    <section id="startRightNow">
        <div class="midDiv">
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
                                        <p>Amount of your referrals: {{count($userreferal ?? 0)}} users</p>
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
                                                <tr>
                                                    <td>{{$referal->name ?? ''}}</td>
                                                    <td>{{$referal->created_at ?? ''}}</td>
                                                    <td>
                                                        @php $res=\App\Models\UserReferal::where('referred_by',$referal->referred_by)->first();
                                                        @endphp
                                                        {{$res->referal_coins ?? ''}}
                                                   </td>
                                                </tr>
                                                @endforeach
                                            
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6" style="margin-bottom:10px">
                                      {{$userreferal->links("pagination::bootstrap-4")}}
                                   </div>
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
                                        <p>Amount of your referrals: {{count($userreferal ?? 0)}} users</p>
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
                                                <tr>
                                                    <td>{{$referal->name ?? ''}}</td>
                                                    <td>{{$referal->created_at ?? ''}}</td>
                                                    <td>250 coins</td>
                                                </tr>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                
            </div>
           @include('Frontend.includes.menues')
        </div>
    </section>
    
@endsection