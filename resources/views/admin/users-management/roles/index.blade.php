@extends('admin.layouts.layout')

@section('title',__('keyword.roles'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.roles') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.roles') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-roles') }}</h5>
                                        <a href="{{ route('roles.create') }}" class="btn btn-outline-primary" >
                                            <i class="feather me-2 icon-plus"></i>
                                            {{ __('keyword.add-new-role') }}
                                        </a>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-create-edit-or-delete-role') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width:10%">#</th>
                                                    <th style="width:60%">{{ __('keyword.name') }}</th>
                                                    <th >{{ __('keyword.created-date') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=1;
                                                @endphp
                                                @foreach ($roles as $role)
                                                    <tr>
                                                        <td style="width:10%" scope="row">{{  $i++ }}</td>
                                                        <td style="width:60%">{{ $role->name }}</td>
                                                        <td>{{ date('m/d/Y',strtotime($role->created_at)) }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    @can('roles.show')
                                                                    <a class="dropdown-item" href="{{ route('roles.show', $role->id) }}">
                                                                        <i class="feather icon-eye"></i>
                                                                        {{ __('keyword.show') }}
                                                                    </a>
                                                                    @endcan
                                                                    @can('roles.edit')
                                                                    <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit') }}
                                                                    </a>
                                                                    @endcan
                                                                    @can('roles.destroy')
                                                                    <form action="{{ route('roles.destroy', $role->id) }}"
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
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th style="width:10%">#</th>
                                                    <th style="width:60%">{{ __('keyword.name') }}</th>
                                                    <th >{{ __('keyword.created-date') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </tfoot>
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
