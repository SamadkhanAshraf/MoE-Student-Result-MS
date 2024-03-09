@extends('admin.layouts.layout')

@section('title',__('keyword.user-profile'))

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title d-flex justify-content-between ">
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.user-profile') }}</h5>
                                <a href="{{ route('dashboard') }}" class="btn btn-link">
                                    <i class="feather me-2 icon-arrow-left"></i>
                                    {{ __('keyword.go-back') }}
                                </a>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="#">{{ __('keyword.profile') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <!-- [ Main Content ] start -->
                    <div class="row">
                        <!-- [ basic-table ] start -->
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between ">
                                        <h5 class="align-self-center">{{ __('keyword.user-profile') }}</h5>
                                        <button type="button" class="btn btn-primary btn-sm rounded m-0 float-end" data-bs-toggle="collapse" data-bs-target=".pro-det-edit" aria-expanded="false" aria-controls="pro-det-edit-1 pro-det-edit-2">
                                            <i class="feather icon-edit"></i>
                                            {{ __('keyword.edit-profile') }}
                                        </button>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-edit-user-information-by-clicking-edit-button') }}</span>
                                    <hr>
                                </div>
                                <div class="card-body  pro-det-edit collapse {{ $errors->count()==0?'show':'' }}" id="pro-det-edit-1">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{ __('keyword.name') }}</label>
                                            <div class="col-sm-6">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{ __('keyword.email') }}</label>
                                            <div class="col-sm-6">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{ __('keyword.username') }}</label>
                                            <div class="col-sm-6">
                                                {{ $user->username }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{ __('keyword.role') }}</label>
                                            <div class="col-sm-6">
                                                @foreach($roles as $role)
                                                    {{ in_array($role->name, $userRole) ? $role->name:'' }}
                                                @endforeach
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-body  pro-det-edit collapse {{ $errors->count()>0?'show':'' }} " id="pro-det-edit-2">
                                    <form method="post" action="{{route('users.update-user-profile',$user->id)}}">
                                        @method('PATCH')
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.name') }}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" placeholder="{{__('keyword.name') }}" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.email') }}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" placeholder="{{__('keyword.email') }}" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.username') }}</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control {{ $errors->has('username')?'is-invalid':'' }}" name="username" placeholder="{{__('keyword.username') }}" value="{{ $user->username }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.old-password') }}</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control {{ $errors->has('old_password')?'is-invalid':'' }}" name="old_password"  placeholder="{{__('keyword.old-password') }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.new-password') }}</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }} " name="password" placeholder="{{__('keyword.new-password') }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label font-weight-bolder">{{__('keyword.confirm-new-password') }}</label>
                                            <div class="col-sm-6">
                                                <input type="password" class="form-control {{ $errors->has('password_confirmation')?'is-invalid':'' }}" name="password_confirmation" placeholder="{{__('keyword.confirm-new-password') }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-6">
                                                <button type="submit" class="btn btn-primary"><i
                                                    class="feather me-2 icon-save"></i>{{ __("keyword.save-changes") }}</button>
                                                <a href="{{ route('dashboard') }}" class="btn btn-danger"> <i
                                                    class="feather me-2 icon-x"></i>{{ __("keyword.cancel") }}</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- [ basic-table ] end -->
                    </div>
                    <!-- [ Main Content ] end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
