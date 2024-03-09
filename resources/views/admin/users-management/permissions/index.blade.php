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
                                <a href="{{ route('dashboard') }}" class="btn btn-link">
                                    <i class="feather me-2 icon-arrow-left"></i>
                                    {{ __('keyword.go-back') }}
                                </a>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.permissions') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-permissions') }}</h5>
                                        @can('permissions.create')
                                        <a href="{{ route('permissions.create') }}" class="btn btn-primary" >
                                            <i class="feather me-2 icon-plus"></i>
                                            {{ __('keyword.add-new') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-create-edit-or-delete-permission') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.name') }}</th>
                                                    <th>{{ __('keyword.guard') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i=1;
                                                @endphp
                                                 @foreach($permissions as $permission)
                                                    <tr>
                                                        <td scope="row">{{ $i++ }}</td>
                                                        <td>{{ $permission->name }}</td>
                                                        <td>{{ $permission->guard_name }}</td>
                                                        <td class="text-center">
                                                            {{-- <a href="{{ route('users.show', $user->id) }}" class="btn btn-lg p-1" >
                                                                <i class="feather text-success icon-eye"></i>
                                                            </a> --}}
                                                            @can('permissions.edit')
                                                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-lg p-1" >
                                                                <i class="feather text-primary icon-edit"></i>
                                                            </a>
                                                            @endcan
                                                            @can('permissions.destroy')
                                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                                method="post" class="d-inline form-{{ $permission->id}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="button" class="btn  btn-lg p-1"
                                                                    onclick="deleteRecord('{{ $permission->id }}');">
                                                                    <i class="feather text-danger icon-trash-2"></i>
                                                                </button>
                                                            </form>
                                                            @endcan
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

