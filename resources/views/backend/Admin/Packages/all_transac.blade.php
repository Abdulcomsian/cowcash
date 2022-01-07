@extends('layouts.master')
@section('title')
Transaction List
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
                                    <h2>Package Transaction List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#S-No</th>
                                        <th class="th-sm">Package Name</th>
                                        <th class="th-sm">User</th>
                                        <th class="th-sm">Price</th>
                                        <th class="th-sm">Coins</th>
                                        <th class="th-sm">Payment Method</th>
                                        <th class="th-sm">Transaction Date</th>
                                        <th class="th-sm">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $allpkgtrans as $trnsac)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$trnsac->package->Pkgname ?? ''}}</td>
                                        <td>{{$trnsac->user->name ?? ''}}</td>
                                        <td>{{$trnsac->package->amount ?? ''}}</td>
                                        <td>{{$trnsac->package->coins_to_get ?? ''}} <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" /></td>
                                        <td>{{$trnsac->payment_method ?? ''}}</td>
                                        <td>{{$trnsac->created_at->format('M-d-Y') }}</td>
                                        <td>
                                            <form id="form_{{$trnsac->id}}" action="{{route('packages.delete-transc',$trnsac)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="{{$trnsac->id}}" class="confirm"><span class=" text-danger fa fa-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6 d-flex" style="margin-bottom:10px">
                            {{$allpkgtrans->links("pagination::bootstrap-4")}}
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