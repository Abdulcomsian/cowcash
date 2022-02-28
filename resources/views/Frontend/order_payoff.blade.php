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
                            <label for="">You give resources [Min. <b>388</b> Gold Bars]:</label>
                            <input type="text" name="sum" id="sum" class="form-control" value="388" required>
                        </div>
                        <div class="inputDiv">
                            <label for="">Sum <b>USD [With fee of 5%]:</b></label>
                            <select name="currency" id="currency" class="form-control">
                                <option value="USD">USD</option>
                            </select>
                            <input type="text" class="form-control" value="0.4" disabled>
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