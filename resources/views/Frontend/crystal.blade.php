@extends('layouts.frontend.master')
@section('title')
Crystal Coins
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .bgColor {
        height: 93%;
    }

    .active {
        background-color: #fff !important;
    }
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv crystalDiv">
        <div class="bgColor">
            <div class="descriptionDiv" style="padding: 20px 20px;">
                <p class="rightNow">RESOURCES</p>
                <div class="instructionDiv">
                    <p>
                        <b>Silver bars (for withdrawal) and Crystals are resources that are required for ordering withdrawals.</b>
                    </p>
                    <p>
                        <b>1 crystal allows to withdraw 1 USD. For withdrawal of 10 USD you need to have 10 crystals and 73874 Silver bars on your account.</b>
                    </p>
                </div>
                <div class="multiCrystalDiv">
                    <div class="commonDiv">
                        <p>Silver bars on your<br> account</p>
                        <p>{{number_format((float)auth()->user()->withdraw, 2, '.', '');}}</p>
                    </div>
                    <div class="commonDiv">
                        <p>Crystals on your <br> account:</p>
                        <p>{{number_format((float)auth()->user()->crystals, 2, '.', '');}}</p>
                    </div>
                </div>
                <div class="crystalInstruction">
                    <p><b>Crystal are credited for gold coins purchases (account replenishments):</b></p>
                    <p>- Your own gold coins purchases (account replenishment), 40% is credited to crystals.</p>
                    <p>- Purchases made by referrals of the 1st level - you get 20% of the paid sum to crystals.</p>
                    <p>- Purchases made by referrals of the 2nd level - you get 5% of the paid sum to crystals.</p>

                </div>
                <div class="questionDiv">
                    <p><b>Question:</b> Active referral - who is it?</p>
                    <p><b>Answere:</b> Active referrals is a user who has replenished the account or who has referrals who have replenished the account.</p>
                </div>
                <p><b>You can also use our <span>Referrals promotion</span> section to get referals.</b></p>
                <p><b>A lot of players feel no need in crystals after having invited only 5 -7 active referrals. Paragraphs 4.2.1.5 of the <span>rules</span>.</b></p>
            </div>
        </div>



        @include('Frontend.includes.menues')

    </div>
</section>
@endsection