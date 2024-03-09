@extends('admin.layouts.layout')

@section('title',__('keyword.backup'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.backup') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.backup') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-backups') }}</h5>
                                        @can('create-backup')
                                        <a href="{{ route('create-backup') }}" class="btn btn-outline-primary">
                                            <i class="feather me-2 icon-plus"></i>
                                            {{ __('keyword.create-new-backup') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-create-download-or-delete-backup') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.backup-name') }}</th>
                                                    <th>{{ __('keyword.size') }}</th>
                                                    <th>{{ __('keyword.date') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach ($backups as $backup)
                                                <tr>
                                                    <td>
                                                        {{ $i++ }}
                                                    </td>
                                                    <td>
                                                        {{ $backup['file_name'] }}
                                                    </td>
                                                    <td>
                                                        {{ \App\Helpers\Helper::humanFilesize($backup['file_size']) }}
                                                    </td>
                                                    <td>
                                                        {{ Carbon\Carbon::parse($backup['last_modified'])->diffForHumans()}}
                                                    </td>

                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('download-backup')
                                                                <a class="dropdown-item" href="{{ route('download-backup',$backup['file_name']) }}" >
                                                                        <i class="feather  icon-download"></i>
                                                                        {{ __('keyword.download') }}
                                                                </a>
                                                                @endcan
                                                                @can('delete-backup')
                                                                <form
                                                                    action="{{ route('delete-backup',$backup['file_name'])  }}"
                                                                    method="post"
                                                                    class="d-inline form-{{ substr($backup['file_name'],0,-4)}}">
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
