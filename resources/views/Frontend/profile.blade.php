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
  </style>
  @endsection

  @section('content')
  <section id="startRightNow">
      <div class="midDiv">
          <div class="bgColor">
              <p class="rightNow">MY PROFILE</p>
              <div class="profileDetails">
                  <img style="margin-bottom: 20px;" src="../assets/img/securityBadge.png" alt="">
                  <p class="title"><b>Security Tip</b></p>
                  <p>Set a strong and unique account password and do not use it in other websites.</p>
                  <div class="profileTable">
                      <table>
                          <thead>
                              <tr>
                                  <td>Username:</td>
                                  <td>{{\Auth::user()->name ?? ''}}</td>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td>Email:</td>
                                  <td>{{\Auth::user()->email ?? ''}}</td>
                              </tr>
                              <tr>
                                  <td>Silver Coins(for purchases):</td>
                                  <td>{{\Auth::user()->silver_coins ?? ''}} coins</td>
                              </tr>
                              <tr>
                                  <td>Silver Coins(for withdrawal):</td>
                                  <td>{{\Auth::user()->withdraw ?? ''}} coins </td>
                              </tr>
                              <tr>
                                  <td>Got from referrals:</td>
                                  <td>{{\Auth::user()->referal_coins ?? ''}} bars</td>
                              </tr>
                              <tr>
                                  <td>Paid out:</td>
                                  <td>0.00  @if(Auth::user()->currency=='1')
                                            USD
                                            @elseif(Auth::user()->currency=='2')
                                            EUR
                                            @else
                                            RUB
                                            @endif
                                  </td>
                              </tr>
                              <tr>
                                  <td>Total milk:</td>
                                  <td>{{$totalmilk ?? ''}} Liters</td>
                              </tr>
                              
                              @if(isset($invitedby->name))
                              <tr>
                                  <td>You are invited by</td>
                                  <td>
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