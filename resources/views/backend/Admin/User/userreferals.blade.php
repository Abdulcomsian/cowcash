@extends('layouts.master')
@section('title')
User Referals
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
                                    <h2>User Referals Details</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#No</th>
                                        <th class="th-sm">Reffered By</th>
                                        <th class="th-sm">User Name</th>
                                        <th class="th-sm">Email</th>
                                        <th class="th-sm">Phone No</th>
                                        <th class="th-sm">Created Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($userreferal)>0)
                                    @foreach($userreferal as $referal)
                                    <tr>
                                        <td>{{$loop->iteration ?? ''}}</td>
                                        <td>{{$user->name ?? ''}}</td>
                                        <td>{{$referal->name ?? ''}}</td>
                                        <td>{{$referal->email ?? ''}}</td>
                                        <td>{{$referal->phone_number ?? ''}}</td>
                                        <td>{{$referal->created_at->format('M-d-Y')}}</td>

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