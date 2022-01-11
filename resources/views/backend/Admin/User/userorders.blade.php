@extends('layouts.master')
@section('title')
User Cows
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
                                    <h2>User Cows Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#No</th>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Cow Name</th>
                                        <th class="th-sm">Color</th>
                                        <th class="th-sm">Total Milk</th>
                                        <th class="th-sm">Available Milk</th>
                                        <th class="th-sm">Sold Milk</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($userOrders)>0)
                                    @foreach($userOrders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->user->name ?? ''}}</td>
                                        <td>{{$order->cow->cowName ?? ''}}</td>
                                        <td>{{$order->cow->color ?? ''}}</td>
                                        <td>{{$order->total_milk ?? ''}}</td>
                                        <td>{{$order->available_milk ?? ''}}</td>
                                        <td>{{$order->sold_milk ?? ''}}</td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="7" class="text-center">No Record Found!</td>
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