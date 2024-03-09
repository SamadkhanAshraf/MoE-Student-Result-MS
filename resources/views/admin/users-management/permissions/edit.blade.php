
@extends('admin.layouts.layout')

@section('title',__('keyword.permissions'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.permissions') }}</h5>
                                <a href="{{ route('permissions.index') }}" class="btn btn-link">
                                    <i class="feather me-2 icon-arrow-left"></i>
                                    {{ __('keyword.go-back') }}
                                </a>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('permissions.index') }}">{{ __('keyword.permissions') }}</a></li>
                                <li class="breadcrumb-item active"><a href="#!">{{ __('keyword.edit') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.edit-permission') }}</h5>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.enter-all-required-information') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <form method="POST" action="{{ route('permissions.update',$permission->id)}}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="mb-2">
                                                    <label for="name"
                                                        class="form-label">{{ __("keyword.name") }}</label>
                                                    <input value="{{ $permission->name }}" type="text"
                                                        class="form-control" name="name"
                                                        placeholder="{{ __("keyword.name") }}" required>
                                                    @if ($errors->has('name'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                                <button type="submit" class="btn btn-primary"><i
                                                        class="feather me-2 icon-save"></i>{{ __("keyword.save-changes") }}</button>
                                                <a href="{{ route('permissions.index') }}" class="btn btn-danger"> <i
                                                        class="feather me-2 icon-x"></i>{{ __("keyword.cancel") }}</a>
                                            </form>
                                        </div>
                                    </div>
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

