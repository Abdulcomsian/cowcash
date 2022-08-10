@extends('layouts.master')
@section('title')
ALL Payments List
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
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
                                    <h2>Payments List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#S-No</th>
                                        <th class="th-sm">User</th>
                                        <th class="th-sm">Sum</th>
                                        <th class="th-sm">Wallet</th>
                                        <th class="th-sm">Payment Method</th>
                                        <th class="th-sm">Date</th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @if(count($payments)>0)
                                         @foreach($payments as $payment)
                                            <tr>
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$payment->user->name ?? ''}}</td>
                                                <td>{{$payment->balance ?? ''}} {{$payment->currency}}</td>
                                                <td>{{$payment->purse ?? ''}}</td>
                                                <td> <p style="width: 18px;height: 19px;border-radius: 100%;background-color: #00669b;margin: auto;font-size: 14px;color: #fff;text-align: center;">{{$payment->payment_method ?? ''}}</p></td>
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