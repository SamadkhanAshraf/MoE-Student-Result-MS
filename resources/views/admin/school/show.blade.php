@extends('admin.layouts.layout')

@section('title',__('keyword.schools'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.schools') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('schools.index') }}">{{ __('keyword.schools') }}</a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.details') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.school-details') }}</h5>
                                        @can('schools.index')
                                        <a href="{{ route('schools.index') }}" class="btn btn-outline-primary" >
                                            <i class="feather me-1 icon-file-text"></i>
                                            {{ __('keyword.schools-list') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-see-school-details') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <h6>{{ __("keyword.school-name") }}</h6>
                                            <ul>
                                                <li><span>{{ $school->name_en }}</span></li>
                                                <li><span>{{ $school->name_pa }}</span></li>
                                                <li><span>{{ $school->name_dr }}</span></li>
                                            </ul>
                                            <h6>{{ __("keyword.province") }}</h6>
                                            <p>{{ $school->province?($locale==='en'?$school->province->name_en:($locale==='pa'?$school->province->name_pa:$school->province->name_dr)):'' }}</p>

                                            <h6>{{ __("keyword.district") }}</h6>
                                            <p>{{ $school->district?($locale==='en'?$school->district->name_en:($locale==='pa'?$school->district->name_pa:$school->district->name_dr)):'' }}</p>

                                        </div>

                                        <div class="col-md-5">
                                            <h6>{{ __("keyword.created-date") }}</h6>
                                            <p>{{ date('m/d/Y',strtotime($school->created_at)) }}</p>

                                            <h6>{{ __("keyword.added-by") }}</h6>
                                            <p>{{ $school->addedBy->name }}</p>
                                            @if ($school->editedBy)
                                                <h6>{{ __("keyword.edited-by") }}</h6>
                                                <p>{{ $school->editedBy->name }}</p>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <hr>
                                            <h6>{{ __("keyword.remarks") }}</h6>
                                            <p>{{ $school->remark }}</p>
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
