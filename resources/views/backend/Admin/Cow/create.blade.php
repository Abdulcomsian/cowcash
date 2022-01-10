@extends('layouts.master')
@section('title')
Create Cows
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
                        <div class="page-heading"> Add Cows</div>
                    </div>
                </div>
            </div>
            <div class="page-header row py-4 justify-content-center">
                <div class="col-md-9" style=" margin: 70px">

                    <div class="card card-small clinic-card">
                        <div class="card-header border-bottom">
                            Cows
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('cow.store')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Cow Name</label>
                                        <input type="text" class="form-control" id="cowName" name="cowName" placeholder="Enter Cow Name" required>
                                        @if($errors->has('cowName'))
                                        <div class="error">{{ $errors->first('cowName') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Color</label>
                                        <select class="form-control" id="color" name="color" required>
                                            <option value="">Select Color</option>
                                            <option value="Bhite">White</option>
                                            <option value="Black">Black</option>
                                            <option value="Brown">Brown</option>
                                        </select>
                                        @if($errors->has('color'))
                                        <div class="error">{{ $errors->first('color') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Price</label>
                                        <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                                        @if($errors->has('price'))
                                        <div class="error">{{ $errors->first('price') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Milk Per Hour</label>
                                        <selec class="form-control" name="milk_type" id="milk_type">
                                            <option value="0">Milk Per Hour</option>
                                        </selec>
                                        @if($errors->has('milk_type'))
                                        <div class="error">{{ $errors->first('milk_type') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Litters</label>
                                        <input class="form-control" type="number" name="litters" id="litters" required />
                                        @if($errors->has('litters'))
                                        <div class="error">{{ $errors->first('litters') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="mb-2 formlabel">Image</label>
                                        <input class="form-control" type="file" name="image" id="image" />
                                        @if($errors->has('image'))
                                        <div class="error">{{ $errors->first('image') }}</div>
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