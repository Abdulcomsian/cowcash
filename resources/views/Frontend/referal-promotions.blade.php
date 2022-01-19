    @extends('layouts.frontend.master')
    @section('title')
    Referal Promotions
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
        <div class="midDiv referralPromotion">
            <div class="bgColor">
                <p class="rightNow">REFERRAL PROMOTION</p>
                <div class="detailBox">
                    <p class="title text-center"><span>Referral link promotion</span></p>
                    <p>In this section, our marketing partners order banner ads for your <b>referral link</b>. Top up your advertising balance and
                        wait for referrals on your account.</p>
                </div>
                <div class="referralLink">
                    <p>Referral link promotion status: <b>Insufficient funds</b></p>
                    <div class="advertisingBalance">
                        <p>Your advertising balance:</p>
                        <span>0.00 USD</span>
                    </div>
                </div>
                <button class="commonBtn">
                    Replenish Balance
                </button>
                <div class="totalReferrals">
                    <p>Total referrals attracted by promotion: 0 users</p>
                    <table>
                        <thead>
                            <tr>
                                <td>Username</td>
                                <td>Sign up date</td>
                                <td>Income in gold coins</td>
                            </tr>
                        </thead>

                    </table>
                    <p>You haven't ordered an advertisement yet</p>
                </div>
            </div>

            @include('Frontend.includes.menues')

        </div>
    </section>
    @endsection