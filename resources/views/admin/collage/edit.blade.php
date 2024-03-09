@extends('admin.layouts.layout')

@section('title',__('keyword.collages'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.collages') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('collages.index') }}">{{ __('keyword.collages') }}</a></li>
                                <li class="breadcrumb-item active"><a href="#!">{{ __('keyword.edit-collage') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.edit-collage') }}</h5>
                                        <a href="{{ route('collages.index') }}" class="btn btn-outline-primary">
                                            <i class="feather me-2 icon-file-text"></i>
                                            {{ __('keyword.collages-list') }}
                                        </a>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.enter-all-required-information') }} & (<span class="text-danger">*</span>) {{ __("keyword.required") }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <form method="POST" action="{{ route('collages.update',$collage->id) }}">
                                                @csrf
                                                @method('patch')
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <x-admin.form-components.select-province :provinceId='$collage->province_id'/>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">English <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name_en" value="{{ $collage->name_en}}" placeholder="Enter English Name">
                                                            @if ($errors->has('name_en'))
                                                                <small id="helpId" class="form-text text-danger">{{ $errors->first('name_en') }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">پښتو <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name_pa" value="{{ $collage->name_pa}}" placeholder="پښتو نوم ولیکئ">
                                                            @if ($errors->has('name_pa'))
                                                                <small id="helpId" class="form-text text-danger">{{ $errors->first('name_pa') }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">دری <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="name_dr" value="{{ $collage->name_dr}}" placeholder="دری نوم ولیکئ">
                                                            @if ($errors->has('name_en'))
                                                                  <small id="helpId" class="form-text text-danger">{{ $errors->first('name_en') }}</small>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <x-admin.form-components.select-departments :departments='$collage->departments'/>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">{{ __('keyword.remarks') }}</label>
                                                            <textarea name="remarks" class="form-control" rows="5" placeholder="{{ __('keyword.enter-remark') }}">{{ $collage->remark }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <a href="{{ route('collages.index') }}" class="btn btn-outline-secondary"> <i class="feather me-2 icon-x"></i>{{ __('keyword.cancel') }}</a>
                                                            <button type="submit" class="btn btn-outline-primary shadow-2 submit-form">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
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
