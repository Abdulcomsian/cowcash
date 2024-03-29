@extends('layouts.master')
@section('title')
ALL Users
@endsection
@section('css')
@include('layouts.sweetalert.sweetalert_css')
@endsection
@section('content')

<!-- Table section -->
<div style="width: calc(100% - 240px); margin-left: auto;">
    <div>
        <main class="main-content p-0">
            <div class="page-header py-1 justify-content-center">
                <div>
                    <div class="card card-small clinic-card d-flex">
                        <div class="card-header border-bottom">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <h2>User List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mb-4">
                            <table id="dtMaterialDesignExample" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Silver Coins</th>
                                        <th class="th-sm">Gold Coins</th>
                                        <th class="th-sm">Referal Link</th>
                                        <th class="th-sm">Referal User</th>
                                        <th class="th-sm">Referal Coins</th>
                                        <th class="th-sm">Affiliate Id</th>
                                        <th class="th-sm">Parent</th>
                                        <th class="th-sm">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users)>0)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$user->email ?? ''}}</td>
                                        <td>{{$user->silver_coins ?? ''}}
                                            <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                        </td>
                                        <td>{{$user->gold_coins ?? ''}}
                                            <img src="{{asset('images/goldcoin.png')}}" class="img" width="15px" height="15px" />
                                        </td>
                                        <td>{{$user->referal_link ?? ''}}</td>
                                        <td>{{count($user->totalaffiliate)}}</td>
                                        <td>{{$user->referal_coins ?? ''}}
                                            <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" />
                                        </td>
                                        <td>{{$user->affiliate_id ?? ''}}</td>
                                        <td>{{$user->referred_by ?? 'NULL'}}</td>
                                        <td>
                                            @if($user->status==0)
                                            <a href="{{route('user.unblock',$user->id)}}" class="confirm btn btn-danger">
                                                <i class="fa fa-unlock"></i> UnBlock
                                            </a>
                                            @else
                                            <a href="{{route('user.block',$user->id)}}" class="confirm btn btn-success">
                                                <i class="fa fa-ban"></i> Block
                                            </a>
                                            @endif
                                            <a href="{{route('user.cow.details',$user->id)}}"><i class="fa fa-eye"></i></a>
                                            <a href="{{route('user.referral.details',$user->id)}}" title="User Referals"><i class="fa fa-user-plus"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">No User Found!</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                             <div class="col-md-6" style="margin-bottom:10px">
                                      {{$users->links("pagination::bootstrap-4")}}
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