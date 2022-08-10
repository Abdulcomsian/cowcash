@extends('layouts.master')
@section('title')
ALL Payments List
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
<style type="text/css">
    .pagination
       {
        display: flex;
        list-style: none;
       }
       .pagination li{
        padding:10px;
       }
</style>
@endsection
@section('content')

<!-- Table section -->
<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-11 col-md-1 col-sm-12 p-0 offset-lg-1">
            <div class="page-header row py-1 justify-content-center">
                <div class="col-md-9" style=" margin: 70px">
                    <div class="card card-small clinic-card d-flex">
                        <div class="card-header border-bottom">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <h2>Withdraw List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#S-No</th>
                                        <th class="th-sm">User</th>
                                        <th class="th-sm">Wallet</th>
                                        <th class="th-sm">Balance</th>
                                        <th class="th-sm">Payment Method</th>
                                        <th class="th-sm">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if(count($payments)>0)
                                         @foreach($payments as $payment)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$payment->user->name ?? ''}}</td>
                                                <td>{{substr($payment->wallet, 0, 3) . ''}}<span style="color:red;vertical-align: sub">******</span>{{substr($payment->wallet, 7, 2) . ''}}</td>
                                                <td>{{$payment->sum ?? ''}} {{$payment->currency}}</td>
                                                <td> <p style="width: 18px;height: 19px;border-radius: 100%;background-color: #00669b;margin: auto;font-size: 14px;color: #fff;text-align: center;">{{$payment->gateway ?? ''}}</p></td>
                                                <td>{{$payment->created_at ?? ''}}</td>
                                            </tr>
                                         @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6">No Record Found!</td>
                                        </tr>
                                        @endif
                                </tbody>
                            </table>
                             <div class="col-md-6" style="margin-bottom:10px">
                                      {{$payments->links("pagination::bootstrap-4")}}
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection
@section('script')
@include('layouts.sweetalert.sweetalert_js')
@endsection