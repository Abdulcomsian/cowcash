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
                    @if($id==1)
                    <form action="{{url('payoff')}}" method="post">
                    @elseif($id==3)
                    <form action="{{url('btc')}}" method="post">
                    @else
                     <form action="{{url('send')}}" method="post">
                    @endif
                        @csrf
                        @if($id==1)
                        @php
                         $goldbars=388;
                         $value=0.04;
                        @endphp
                        <div class="inputDiv">
                            <label for="">Wallet [Example: P12345678]:</label>
                            <input type="text" name="pp" class="form-control" required>
                        </div>
                        @elseif($id==3)
                        <div class="inputDiv">
                            <label for="">Enter Your BTC Address</label>
                            <input type="text" name="pp" class="form-control" required>
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
                            <input type="text" name="pp" class="form-control" required>
                        </div>
                        @endif
                        <div class="inputDiv">
                            <label for="">You give resources [Min. <b>{{$goldbars}}</b> Silver Block]:</label>
                            <input type="number" name="silverblocks" id="sum" class="form-control" value="{{$goldbars}}" required>
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" name="amount" id="amount" class="form-control" value="{{$value}}" readonly>
                        </div>
                        <button type="submit" class="commonBtn cursor-pointer">Order Payoff</button>
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
    $("#sum").on('keyup', function() {
        $silverblocks = $("#sum").val();
        if ($silverblocks < 0 || $silverblocks == 0) {
            $("#sum").val(0);
            $("#amount").val(0);
        } else {
            $converttodolar = 1 / 7834 * $silverblocks;
            $("#amount").val(parseFloat($converttodolar).toFixed(2));
        }


    })
</script>
@endsection