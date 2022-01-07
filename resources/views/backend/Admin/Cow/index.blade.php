@extends('layouts.master')
@section('title')
ALL Cows List
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
                                    <h2>Cows List</h2>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{route('cow.create')}}" class="btn btn-primary btn-add float-right"><img class="plus" src="{{asset ('images/png/add.png')}}" alt="">Add Cow</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th class="th-sm">Cow Name
                                        </th>
                                        <th class="th-sm">Color
                                        </th>
                                        <th class="th-sm">Price
                                        </th>
                                        <th class="th-sm">Type
                                        </th>
                                        <th class="th-sm">Per Hour Litters
                                        </th>
                                        <th>Image</th>
                                        <th class="th-sm">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cowslist as $cow)
                                    <tr>
                                        <td>{{$cow->cowName}}</td>
                                        <td>{{$cow->color}}</td>
                                        <td>{{$cow->price}}</td>
                                        <td>
                                            Milk Per Hour
                                        </td>
                                        <td>{{$cow->litters}} Litters</td>
                                        <td><img src="{{asset($cow->image)}}" width="80px" height="80px" /></td>
                                        <td class="d-flex">
                                            <a data-toggle="tooltip" href="{{route('cow.edit',$cow->id)}}" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form id="form_{{$cow->id}}" action="{{route('cow.destroy',$cow)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="{{$cow->id}}" class="confirm"><span class=" text-danger fa fa-trash"></span></button>
                                            </form>
                                        </td>
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