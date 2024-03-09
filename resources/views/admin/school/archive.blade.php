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
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.archive') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.archived-schools') }}</h5>
                                        <div>
                                            @can('schools.index')
                                            <a href="{{ route('schools.index') }}" class="btn btn-outline-primary" >
                                                <i class="feather me-1 icon-file-text"></i>
                                                {{ __('keyword.schools-list') }}
                                            </a>
                                            @endcan
                                            @if($schools->count()>0)
                                                @can('schools.restore-all')
                                                    <form action="{{ route('schools.restore-all') }}" class="d-inline" method="post">
                                                        @method('post')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-success" >
                                                            <i class="feather me-1 icon-refresh-ccw"></i>
                                                            {{ __('keyword.restore-all-schools') }}
                                                        </button>
                                                    </form>
                                                @endcan
                                            @endif
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-delete-or-restore-schools') }}</span>
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
                                                    <th>{{ __('keyword.deleted-date') }}</th>
                                                    <th>{{ __('keyword.deleted-by') }}</th>
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
                                                    <td>{{ date('m/d/Y',strtotime($school->deleted_at)) }}</td>
                                                    <td>{{ $school->deletedBy->name }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('schools.restore')
                                                                <form action="{{ route('schools.restore', $school->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('post')
                                                                    @csrf
                                                                    <button type="submit" class="dropdown-item">
                                                                        <i class="feather icon-refresh-ccw"></i>
                                                                        {{ __('keyword.restore') }}
                                                                    </button>
                                                                </form>
                                                                @endcan

                                                                @can('schools.destroy')
                                                                <form action="{{ route('schools.destroy', $school->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="dropdown-item"
                                                                        onclick="deleteRecord(this);">
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
