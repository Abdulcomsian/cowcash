@extends('layouts.master')
@section('title')
Create Package
@endsection
@section('css')
<style>
    .error {
        height: auto;
        color: red;
    }
</style>

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

            <div class="clinic-s">
                <div class="row py-4 container-fluid ">
                    <div class="col-md-12">
                        <div class="page-heading"> Add Package</div>
                    </div>
                </div>
            </div>
            <div class="page-header row py-4 justify-content-center">
                <div class="col-md-9" style=" margin: 70px">

                    <div class="card card-small clinic-card">
                        <div class="card-header border-bottom">
                            Package
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('packages.store')}}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Package Name</label>
                                        <input type="text" class="form-control" id="Pkgname" name="Pkgname" placeholder="Enter Pkgname" required>
                                        @if($errors->has('Pkgname'))
                                        <div class="error">{{ $errors->first('Pkgname') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Amount</label>
                                        <input type="integer" class="form-control" id="amount" name="amount" placeholder="Enter Amount" required>
                                        @if($errors->has('amount'))
                                        <div class="error">{{ $errors->first('amount') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Coins</label>
                                        <input type="number" class="form-control" id="coins_to_get" name="coins_to_get" placeholder="Enter Coins to Get" required>
                                        @if($errors->has('coins_to_get'))
                                        <div class="error">{{ $errors->first('coins_to_get') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
                                        </select>
                                        @if($errors->has('coins_to_get'))
                                        <div class="error">{{ $errors->first('coins_to_get') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-add">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</div>

@endsection

@section('script')

@endsection