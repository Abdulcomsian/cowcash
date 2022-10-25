  @extends('layouts.frontend.master')
  @section('title')
  Account Setting
  @endsection
  @section('css')
  <style>
      .cursor-pointer {
          cursor: pointer;
      }

      .bgColor {
          overflow: hidden;
      }
      .tdp{
         padding: 8px 20px;
        border: 1px solid #5e3700 ;
    }
    .trd{
        background: #fffcf5;
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
              <p class="rightNow">MY PROFILE</p>
              <div class="profileDetails">
                  <img style="margin-bottom: 20px;" src="../assets/img/securityBadge.png" alt="">
                  <p class="title"><b>Security Tip</b></p>
                  <p>Set a strong and unique account password and do not use it in other websites.</p>
                  <div class="profileTable">
                      <table>
                          <thead>
                              <tr class="trd">
                                  <td class="tdp">Username:</td>
                                  <td class="tdp">{{\Auth::user()->name ?? ''}}</td>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="trd">
                                  <td class="tdp">Email:</td>
                                  <td class="tdp">{{\Auth::user()->email ?? ''}}</td>
                              </tr>
                              <tr class="trd">
                                  <td class="tdp">Silver Coins <br> (for purchases):</td>
                                  <td class="tdp">{{\Auth::user()->silver_coins ?? ''}} coins</td>
                              </tr>
                              <tr class="trd">
                                  <td class="tdp">Silver Coins <br> (for withdrawal):</td>
                                  <td class="tdp">{{\Auth::user()->withdraw ?? ''}} coins </td>
                              </tr>
                              <tr class="trd">
                                  <td class="tdp">Got from referrals:</td>
                                  <td class="tdp">{{\Auth::user()->referal_coins ?? ''}} bars</td>
                              </tr>
                              <tr class="trd">
                                  <td class="tdp">Paid out:</td>
                                  <td class="tdp">{{$totalpaidout ?? '0.00'}}  {{Auth::user()->currency}}
                                  </td>
                              </tr>
                              <tr class="trd">
                                  <td class="tdp">Total milk:</td>
                                  <td class="tdp">{{$totalmilk ?? ''}} Liters</td>
                              </tr>
                              
                              @if(isset($invitedby->name))
                              <tr class="trd">
                                  <td class="tdp">You are invited by</td>
                                  <td class="tdp">
                                     {{$invitedby->name ?? ''}}
                                  </td>
                              </tr>
                              @endif
                              
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          @include('Frontend.includes.menues')
      </div>
  </section>
  @endsection