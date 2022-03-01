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
                        <b>Silver block (for withdrawal) and Gold Bars are resources that are required for ordering withdrawals.</b>
                    </p>
                    <p>
                        <b>1 gold bars allows to withdraw 1 USD. For withdrawal of 10 USD you need to have 10 gold bars and 73874 silver block on your account.</b>
                    </p>
                </div>
                <div class="multiCrystalDiv">
                    <div class="commonDiv">
                        <p>Silver coins on your account instead of silver blocks:</p>
                        <p>00.0</p>
                    </div>
                    <div class="commonDiv">
                        <p>Silver block on your account instead of crystal:</p>
                        <p>00.0</p>
                    </div>
                </div>
                <div class="crystalInstruction">
                    <p><b>Gold Bars are credited for silver coins purchases (account replenishments):</b></p>
                    <p>- Your own silver coins purchases (account replenishment), 40% is credited to gold bars.</p>
                    <p>- Purchases made by referrals of the 1st level - you get 20% of the paid sum to gold bars.</p>
                    <p>- Purchases made by referrals of the 2nd level - you get 5% of the paid sum to gold bars.</p>

                </div>
                <div class="questionDiv">
                    <p><b>Question:</b> Active referral - who is it?</p>
                    <p><b>Answere:</b> Active referrals is a user who has replenished the account or who has referrals who have replenished the account.</p>
                </div>
                <p><b>You can also use our <span>Referrals promotion</span> section to get referals.</b></p>
                <p><b>A lot of players feel no need in gold bars after having invited only 5 -7 active referrals. Paragraphs 4.2.1.5 of the <span>rules</span>.</b></p>
             </div>
         </div>



        @include('Frontend.includes.menues')

    </div>
</section>
@endsection