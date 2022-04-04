@extends('layouts.frontend.master')
@section('title')
Payments
@endsection
@section('css')
<style>
    .cursor-pointer {
        cursor: pointer;
    }
    .bgColor{
        overflow:hidden;
    }
</style>
@endsection

@section('content')
<section id="startRightNow">
    <div class="midDiv" style="min-height: 220px">
        <p class="rightNow">PAYMENTS</p>
        <div class="paymentTable">
            <table>
                <thead>
                    <tr>
                        <td>User</td>
                        <td>Sum</td>
                        <td>PS</td>
                        <td>Purse</td>
                        <td>Date</td>
                    </tr>
                </thead>
                <tbody>
                    @if(count($payments)>0)
                     @foreach($payments as $payment)
                      @php
                        if($payment->currency==1)
                        {
                            $currency='USD';
                        }
                        elseif($payment->currency==2)
                        {
                            $currency='EUR';
                        }
                        else{
                            $currency='RUB';
                        }
                      @endphp
                        <tr>
                            <td>{{$payment->user->name ?? ''}}</td>
                            <td>{{$payment->sum ?? ''}} {{$currency}}</td>
                            <td> <p style="width: 19px;height: 19px;border-radius: 100%;background-color: #00669b;margin: auto;font-size: 14px;color: #fff;">{{$payment->gateway ?? ''}}</p></td>
                            <td>{{substr($payment->wallet, 0, -3) . ''}} <span style="color:red">xxx</span></td>
                            <td>{{$payment->created_at->toDateString() ?? ''}}</td>
                        </tr>
                     @endforeach
                    @else
                    <tr>
                        <td colspan="5">No Record Found!</td>
                    </tr>
                    @endif
                    
                </tbody>
            </table>
        </div>
        <p style="text-align: right; color: #000; font-size: 12px;">Displayed last 20 payments</p>

        @include('Frontend.includes.menues')

    </div>
</section>
@endsection