@extends('layouts.app', ['title' => __('Role Management')])

@section('content')
    @include('Roles.partials.header', ['title' => __('Edit Role')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Role Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('roles.update', encrypt($role->id)) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Role information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $role->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                @if(count($permissions) > 0)
                                    <h4>Select Permissions</h4>
                                    @if ($errors->has('permissions'))
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $errors->first('permissions') }}</strong>
                                        </span>
                                    @endif

                                    <div class="row">
                                        @foreach($permissions as $item)
                                            <div class="col-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input {{in_array($item->id,$rolePermissions) ? 'checked' : ''}} type="checkbox" name="permissions[]" class="custom-control-input" id="checkbox_{{$item->id}}" value="{{$item->id}}">
                                                    <label class="custom-control-label" for="checkbox_{{$item->id}}">{{$item->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>No permission found</p>
                                @endif

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
