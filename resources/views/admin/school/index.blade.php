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
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.schools') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-schools') }}</h5>
                                        <div>
                                            @can('schools.create')
                                            <a href="{{ route('schools.create') }}" class="btn btn-outline-primary">
                                                <i class="feather me-2 icon-plus"></i>
                                                {{ __('keyword.add-new-school') }}
                                            </a>
                                            @endcan
                                            @can('schools.archive')
                                            <a href="{{ route('schools.archive') }}" class="btn btn-outline-danger" >
                                                <i class="feather me-1 icon-box"></i>
                                                {{ __('keyword.show-archive') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-schools') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>English</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th>{{ __('keyword.province') }}</th>
                                                    <th>{{ __('keyword.district') }}</th>
                                                    <th>{{ __('keyword.created-date') }}</th>
                                                    <th>{{ __('keyword.added-by') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($schools->isNotEmpty())
                                                @foreach ($schools as $key=>$school)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $school->name_en }}</td>
                                                    <td>{{ $school->name_pa }}</td>
                                                    <td>{{ $school->name_dr }}</td>
                                                    <td>{{ $school->province?($locale==='en'?$school->province->name_en:($locale==='pa'?$school->province->name_pa:$school->province->name_dr)):'' }}</td>
                                                    <td>{{ $school->district?($locale==='en'?$school->district->name_en:($locale==='pa'?$school->district->name_pa:$school->district->name_dr)):'' }}</td>
                                                    <td>{{ date('m/d/Y',strtotime($school->created_at)) }}</td>
                                                    <td>{{ $school->addedBy->name }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('schools.show')
                                                                <a class="dropdown-item" href="{{ route("schools.show",$school->id) }}">
                                                                        <i class="feather icon-eye"></i>
                                                                        {{ __('keyword.show') }}
                                                                </a>
                                                                @endcan
                                                                @can('schools.edit')
                                                                <a class="dropdown-item" href="{{ route("schools.edit",$school->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit') }}
                                                                </a>
                                                                @endcan

                                                                @can('schools.add-to-archive')
                                                                <form action="{{ route('schools.add-to-archive', $school->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="dropdown-item"
                                                                        onclick="addtoArchive(this);">
                                                                        <i class="feather icon-trash-2"></i>
                                                                        {{ __('keyword.delete') }}
                                                                    </button>
                                                                </form>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
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
