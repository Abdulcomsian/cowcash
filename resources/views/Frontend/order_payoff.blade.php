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
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv orderPayoff">
        <div class="bgColor">
            <div class="descriptionDiv" style="padding: 20px 20px;">
                <p class="rightNow">ORDER PAYOFF</p>
                <div class="payoffHeader">
                    <p>Payeer</p>
                </div>
                <div class="formDiv">
                    <form action="{{url('payoff')}}" method="post">
                        @csrf
                        <div class="inputDiv">
                            <label for="">Wallet [Example: P12345678]:</label>
                            <input type="text" name="pp" class="form-control" required>
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
                            <input type="text" name="amount" id="amount" class="form-control" value="0.04" disabled>
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
                            <tr>
                                <td colspan="5">No Data</td>
                            </tr>
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