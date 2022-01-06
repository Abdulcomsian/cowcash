@extends('layouts.master')
@section('title')
ALL Users
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
                                    <h2>User List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Phone Number</th>
                                        <th>Silver Coins</th>
                                        <th>Gold Coins</th>
                                        <th>Image</th>
                                        <th class="th-sm">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_Number}}</td>
                                        <td>{{$user->silver_coins}}
                                            <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                        </td>
                                        <td>{{$user->gold_coins}}
                                            <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" />
                                        </td>
                                        <td>
                                            @if($user->image)
                                            <img src="{{asset($user->image)}}" width="80px" height="80px" />
                                            @endif
                                        </td>
                                        @if($user->status==0)
                                        <td class="d-flex">
                                            <a href="{{route('user.unblock',$user->id)}}" class="confirm btn btn-danger">
                                                UnBlock
                                            </a>
                                        </td>
                                        @else
                                        <td class="d-flex">
                                            <a href="{{route('user.block',$user->id)}}" class="confirm btn btn-success">
                                                Block
                                            </a>
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach

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