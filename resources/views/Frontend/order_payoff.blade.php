@extends('layouts.frontend.master')
@section('title')
About Us
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }

    .bgColor {
        height: 93%;
        background-size: 100% 100%;
        overflow: hidden;
    }
    .active {
        background-color: #fff !important;
    }
    td{
        font-size: 13px !important;
    }
    .notify-warning {
    color: #8a6d3b !important;
    background-color: #fff1d5 !important;
    border-color: #f7e6c2 !important;
}

</style>
@endsection
@php
 if($id==1)
 {
    $title="Payeer";
 }
 elseif($id==3)
 {
    $title="Bitcoins";
 }
 else{
    $title="Faucet";
}
@endphp

@section('content')

<section id="startRightNow">
    <div class="midDiv orderPayoff">
         <div class="onlyDesktop" style="position:absolute; top:100px;left:-298px;">
            <ins class="6357f5a99fae580a7534d3f1" style="display:inline-block;width:250px;height:250px;"></ins>
        </div>
        
        <div class="bgColor">
            <div class="descriptionDiv" style="padding: 20px 20px;">
                <p class="rightNow">ORDER PAYOFF</p>
                <div class="payoffHeader">
                    <p>{{ $title}}</p>
                </div>
                <br>
                @if( session()->get('error')=='goldbarerror')
                <p class="notify-warning">You dont have enough <a href="#" class="addFunds">Silver Blocks</a> to complete this withdrawal</p>
                @elseif(session()->get('error')=='crystalerror')
                <p class="notify-warning">You dont have enough <a href="#" class="addFunds">Crystals</a> to complete this withdrawal</p>
                @endif
                <div class="formDiv">
                    @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div class="text-danger" style="color: red">{{$error}}</div>
                     @endforeach
                     @endif

                     <br>
                    @if($id==1)
                    <form action="{{url('payoff')}}" method="post" class="withdrawform">
                        @csrf
                        <div class="inputDiv">
                            <label for="">Wallet [Example: P12345678]:</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                        <div class="inputDiv">
                            <label for="">You give resources [Min. <b>388</b> Silver Block]:</label>
                            <input type="number" name="silverblocks" id="sum" class="form-control" value="388" required>
                            
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" name="amount" id="amount" class="form-control" value="0.04" readonly>
                        </div>
                        <div class="inputDiv ">
                          {!! NoCaptcha::display() !!}
                          @error('g-recaptcha-response')
                          <span class="invalid-feedback" style="display: block !important" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                        <button type="button" class="commonBtn cursor-pointer payeerpayoff">Order Payoff</button>
                         
                       <!--  <button type="submit" class="commonBtn cursor-pointer">Order Payoff</button> -->
                       
                    </form>
                    @elseif($id==3)
                    <form action="{{url('btc')}}" method="post" class="withdrawform">
                        @csrf
                        <div class="inputDiv">
                            <label for="">Enter Your BTC Address</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                         <div class="inputDiv">
                            <label for="">You give resources [Min. <b>1175100</b> Silver Block]:</label>
                            <input type="number" name="silverblocks" id="sum2" class="form-control" value="1175100" required>
                            
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" name="amount" id="btcamount" class="form-control" value="0.00358734" readonly>
                        </div>
                        <div class="inputDiv ">
                          {!! NoCaptcha::display() !!}
                          @error('g-recaptcha-response')
                          <span class="invalid-feedback" style="display: block !important" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <button type="button" class="commonBtn cursor-pointer payeerpayoff">Order Payoff</button>
                         
                       <!--  <button type="submit" class="commonBtn cursor-pointer">Order Payoff</button> -->
                       
                    </form>

                    @else
                     <form action="{{url('send')}}" method="post" class="withdrawform">
                        @csrf
                        <div class="inputDiv">
                            <label for="">Enter Your Faucet Username</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                        <div class="inputDiv">
                            <label for="">You give resources [Min. <b>388</b> Silver Block]:</label>
                            <input type="number" name="silverblocks" id="sum" class="form-control" value="388" required>
                            
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" name="amount" id="amount" class="form-control" value="0.04" readonly>
                        </div>
                        <div class="inputDiv ">
                          {!! NoCaptcha::display() !!}
                          @error('g-recaptcha-response')
                          <span class="invalid-feedback" style="display: block !important" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <button type="button" class="commonBtn cursor-pointer payeerpayoff">Order Payoff</button>
                         
                       <!--  <button type="submit" class="commonBtn cursor-pointer">Order Payoff</button> -->
                       
                    </form>
                    @endif
                          
                </div>
                <div class="tableDiv">
                    <p><b>Last 10 payoffs</b></p>
                    <table>
                        <thead>
                            <tr>
                                <td>Sum</td>
                                <td>Wallet</td>
                                <td>Gateway</td>
                                <td>Date</td>
                                <td>Status</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lasttenpayments)>0)
                             @foreach($lasttenpayments as $pay)
                              <tr>
                                <td>{{$pay->sum}}</td>
                                <td>{{substr($pay->wallet, 0, 3) . ''}}<span style="color:red;vertical-align: sub;">******</span>{{substr($pay->wallet, 7, 2) . ''}}</td>
                                <td>{{$pay->gateway}}</td>
                                <td>{{$pay->created_at->toDateString();}}</td>
                                <td>{{$pay->status==1 ? 'Success':'Failed'}}</td>
                              </tr>
                             @endforeach
                            @else
                            <tr>
                                <td colspan="5">No Data</td>
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
@section('script')

<script>
    (function(){

    function decimalAdjust(type, value, exp) {
        // If the exp is undefined or zero...
        if (typeof exp === 'undefined' || +exp === 0) {
            return Math[type](value);
        }
        console.log("first "+ value);
        value = +value;
        console.log("second " +value);
        exp = +exp;
        // If the value is not a number or the exp is not an integer...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
            return NaN;
        }
        // Shift
        value = value.toString().split('e');
        console.log(value);
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
    }

    // Decimal round
    if (!Math.round10) {
        Math.round10 = function(value, exp) {
            return decimalAdjust('round', value, exp);
        };
    }
    // Decimal floor
    if (!Math.floor10) {
        Math.floor10 = function(value, exp) {
            return decimalAdjust('floor', value, exp);
        };
    }
    // Decimal ceil
    if (!Math.ceil10) {
        Math.ceil10 = function(value, exp) {
            return decimalAdjust('ceil', value, exp);
        };
    }
})();
    var fee = 0.95;
    var fee2 = 0;
    var ser_usd = 7387.3873873874;
    $("#sum").on('keyup', function() {
        $silverblocks = $("#sum").val();
        var serebro_usd_1 = Math.floor10($silverblocks / 7387, -2);
        var serebro_usd_2 = Math.floor10(((serebro_usd_1 * fee) - fee2), -2);
        var serebro_usd = Math.floor10(serebro_usd_2, -2);
        $('#amount').val(serebro_usd);
        var sum11 = ($silverblocks / 1);
        $('#sum').val( ((sum11).toFixed(0) ));
        $('#sum').val($('#sum').val().replace(/[^0-9]/g,''));
    })

    var m_btc = 0.015;
    var fee = 0.95;
    var fee2 = 0;
    var ser_btc = 311189198;
    $("#sum2").on('keyup', function() {
        console.log("here");
        $silverblocks = $("#sum2").val();
        var serebro_btc_1 = Math.floor10($silverblocks/ ser_btc, -8);
        var serebro_btc_2 = Math.floor10(((serebro_btc_1 * fee) - fee2), -8);
        $('#btcamount').val(serebro_btc_2);
    })

    $(document).on('click','.payeerpayoff',function(){
        var fee = 0.95;
        var fee2 = 0;
        var ser_usd = 7387.3873873874;
        $silverblocks = $("#sum").val();
        var serebro_usd_1 = Math.floor10($silverblocks / 7387, -2);
        var serebro_usd_2 = Math.floor10(((serebro_usd_1 * fee) - fee2), -2);
        var serebro_usd = Math.floor10(serebro_usd_2, -2);
        $('#amount').val(serebro_usd);
        $("#sum").val($silverblocks);
        $(".withdrawform").submit();
        
    })
</script>
@endsection