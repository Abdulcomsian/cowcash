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
    <div class="midDiv">
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
                   <!--  <tr>
                        <td>DOZEY</td>
                        <td>0.55 USD</td>
                        <td>
                            <p style="width: 19px;height: 19px;border-radius: 100%;background-color: #00669b;margin: auto;font-size: 14px;color: #fff;">
                                P</p>
                        </td>
                        <td>P17327XXX</td>
                        <td>1-1-2022</td>
                    </tr> -->
                    @if(count($payments)>0)
                     @foreach($payments as $payment)
                        <tr>
                            <td>{{$payment->user->name ?? ''}}</td>
                            <td>{{$payment->balance ?? ''}}</td>
                            <td> <p style="width: 19px;height: 19px;border-radius: 100%;background-color: #00669b;margin: auto;font-size: 14px;color: #fff;">{{$payment->payment_method ?? ''}}</p></td>
                            <td></td>
                            <td>{{$payment->created_at ?? ''}}</td>
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