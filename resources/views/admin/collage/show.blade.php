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
                                <li class="breadcrumb-item"><a href="{{ route('collages.index') }}">{{ __('keyword.collages') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.collage-details') }}</h5>
                                        @can('collages.index')
                                        <a href="{{ route('collages.index') }}" class="btn btn-outline-primary" >
                                            <i class="feather me-1 icon-file-text"></i>
                                            {{ __('keyword.collages-list') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-see-collage-details') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="row justify-content-center">
                                        <div class="col-md-5">
                                            <h6>{{ __("keyword.collage-name") }}</h6>
                                            <ul>
                                                <li><span>{{ $collage->name_en }}</span></li>
                                                <li><span>{{ $collage->name_pa }}</span></li>
                                                <li><span>{{ $collage->name_dr }}</span></li>
                                            </ul>
                                            <h6>{{ __("keyword.departments") }}:</h6>
                                            @forelse ($collage->departments as $dep)
                                                <span class="badge bg-primary f-12">
                                                    {{$locale==='en'?$dep->name_en:($locale==='pa'?$dep->name_pa:$dep->name_dr)}}
                                                </span>
                                            @empty
                                            @endforelse
                                            <h6 class="mt-4">{{ __("keyword.province") }}:</h6>
                                            <p class="text-start mt-0">{{ $collage->province?($locale==='en'?$collage->province->name_en:($locale==='pa'?$collage->province->name_pa:$collage->province->name_dr)):'' }}</p>
                                        </div>

                                        <div class="col-md-5">
                                            <h6>{{ __("keyword.created-date") }}:</h6>
                                            <p class="text-start mt-0">{{ date('m/d/Y',strtotime($collage->created_at)) }}</p>

                                            <h6 class="mb-0">{{ __("keyword.added-by") }} :</h6>
                                            <p class="text-start mt-0">{{ $collage->addedBy->name }}</p>
                                            @if ($collage->editedBy)
                                                <h6>{{ __("keyword.edited-by") }}:</h6>
                                                <p class="text-start mt-0">{{ $collage->editedBy->name }}</p>
                                            @endif

                                        </div>
                                        <div class="col-md-10">
                                            <hr>
                                            <h6>{{ __("keyword.remarks") }}</h6>
                                            <p>{{ $collage->remark }}</p>
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
