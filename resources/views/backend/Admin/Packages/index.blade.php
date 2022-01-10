@extends('layouts.master')
@section('title')
ALL Packages List
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
                                    <h2>Packages List</h2>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('packages.create')}}" class="btn btn-primary btn-add float-right"><img class="plus" src="{{asset ('images/png/add.png')}}" alt="">Add Package</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">#S-No</th>
                                        <th class="th-sm">Package Name</th>
                                        <th class="th-sm">Price</th>
                                        <th class="th-sm">Coins To Get</th>
                                        <th class="th-sm">Status</th>
                                        <th class="th-sm">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($packages)>0)
                                    @foreach($packages as $pkg)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pkg->Pkgname}}</td>
                                        <td>{{$pkg->amount}}</td>
                                        <td>{{$pkg->coins_to_get}} <img src="{{asset('images/silvercoin.png')}}" class="img" width="15px" height="15px" /></td>
                                        <td>{{'Active'}}</td>
                                        <td class="d-flex">
                                            <a data-toggle="tooltip" href="{{route('packages.edit',$pkg->id)}}" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form id="form_{{$pkg->id}}" action="{{route('packages.destroy',$pkg)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="{{$pkg->id}}" class="confirm"><span class=" text-danger fa fa-trash"></span></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="8" class="text-center">No Packages Found!</td>
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