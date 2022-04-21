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
        <div class="bgColor">
            <div class="descriptionDiv" style="padding: 20px 20px;">
                <p class="rightNow">ORDER PAYOFF</p>
                <div class="payoffHeader">
                    <p>{{ $title}}</p>
                </div>
                 
                <div class="formDiv">
                    @if ($errors->any())
                     @foreach ($errors->all() as $error)
                         <div class="text-danger" style="color: red">{{$error}}</div>
                     @endforeach
                     @endif
                     <br>
                    @if($id==1)
                    <form action="{{url('payoff')}}" method="post" id="payeerpayoff">
                    @elseif($id==3)
                    <form action="{{url('btc')}}" method="post">
                    @else
                     <form action="{{url('send')}}" method="post">
                    @endif
                        @csrf
                        @if($id==1)
                        @php
                         $goldbars=388;
                         $value=(1/7834)*(388);
                         $value=bcdiv($value,1,2);
                        @endphp
                        <div class="inputDiv">
                            <label for="">Wallet [Example: P12345678]:</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                        @elseif($id==3)
                        <div class="inputDiv">
                            <label for="">Enter Your BTC Address</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                        @php
                         $goldbars=1175100;
                         $value=150;
                        @endphp
                        @else
                        @php
                         $goldbars=39170;
                         $value=5;
                        @endphp
                        <div class="inputDiv">
                            <label for="">Enter Your Faucet Username</label>
                            <input type="text" name="wallet" class="form-control" required>
                        </div>
                        @if($errors->has('pp'))
                                <div class="error">{{ $errors->first('pp') }}</div>
                            @endif
                        @endif
                        <div class="inputDiv">
                            <label for="">You give resources [Min. <b>{{$goldbars}}</b> Silver Block]:</label>
                            <input type="number" name="silverblocks" id="sum" class="form-control" value="{{$goldbars}}" required>
                            @if($errors->has('silverblocks'))
                                <div class="error">{{ $errors->first('silverblocks') }}</div>
                            @endif
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" name="amount" id="amount" class="form-control" value="{{$value}}" readonly>
                        </div>
                         @if($id==1)
                         <button type="button" class="commonBtn cursor-pointer payeerpayoff">Order Payoff</button>
                         @else
                        <button type="submit" class="commonBtn cursor-pointer">Order Payoff</button>
                        @endif
                    </form>
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
                                <td>{{$pay->wallet}}</td>
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
        value = +value;
        console.log(value);
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
        console.log(serebro_usd);
        $('#amount').val(serebro_usd);
        var sum11 = ($silverblocks / 1);
        $('#sum').val( ((sum11).toFixed(0) ));
        $('#sum').val($('#sum').val().replace(/[^0-9]/g,''));
        // if ($silverblocks < 0 || $silverblocks == 0) {
        //     $("#sum").val(0);
        //     $("#amount").val(0);
        // } else {
        //     $converttodolar = 1 / 7834 * $silverblocks;
        //     $("#amount").val($converttodolar.toFixed(2));
        // }


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
        $("#payeerpayoff").submit();
        
    })
</script>
@endsection