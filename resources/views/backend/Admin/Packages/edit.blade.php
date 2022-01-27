@extends('layouts.master')
@section('title')
Update Package
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
                        <div class="page-heading"> Edit Package</div>
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
                            <form method="post" action="{{route('packages.update',$pkg->id)}}">
                                @method('PUT')
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label class="mb-2 formlabel">Package Name</label>
                                        <input type="text" class="form-control" id="Pkgname" name="Pkgname" placeholder="Enter Pkgname" value="{{$pkg->Pkgname ?? ''}}" required>
                                        @if($errors->has('Pkgname'))
                                        <div class="error">{{ $errors->first('Pkgname') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2 formlabel">Amount</label>
                                        <input type="integer" class="form-control" id="amount" name="amount" placeholder="Enter Amount" value="{{$pkg->amount ?? ''}}" required>
                                        @if($errors->has('amount'))
                                        <div class="error">{{ $errors->first('amount') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="mb-2 formlabel">Discount</label>
                                        <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter Discount %" value="{{$pkg->discount ?? ''}}">
                                        @if($errors->has('discount'))
                                        <div class="error">{{ $errors->first('discount') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Coins</label>
                                        <input type="number" class="form-control" id="coins_to_get" name="coins_to_get" placeholder="Enter Coins to Get" value="{{$pkg->coins_to_get ?? ''}}" required>
                                        @if($errors->has('coins_to_get'))
                                        <div class="error">{{ $errors->first('coins_to_get') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ $pkg->status === "1" ? "selected" : "" }}>Active</option>
                                            <option value="0" {{ $pkg->status === "0" ? "selected" : "" }}>InActive</option>
                                        </select>
                                        @if($errors->has('status'))
                                        <div class="error">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-add">Update</button>
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