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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('roles.index') }}">{{ __('keyword.roles') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.role-details') }}</h5>
                                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary">
                                            <i class="feather me-2 icon-file-text"></i>
                                            {{ __('keyword.roles-list') }}
                                        </a>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-see-role-name-and-permisons') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <h5 class="text-dark">{{ __('keyword.role-name') }}: {{ ucfirst($role->name) }}</h5>

                                    <div class="table-responsive">
                                        <table class="table" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width:5%">#</th>
                                                    <th style="width:80%">{{ __('keyword.name') }}</th>
                                                    <th class="text-center">{{ __('keyword.guard') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $i=1;
                                                @endphp
                                                @foreach($rolePermissions as $permission)
                                                <tr>
                                                    <td style="width:5%">{{ $i++ }}</td>
                                                    <td style="width:80%">{{ $permission->name }}</td>
                                                    <td class="text-center">{{ $permission->guard_name }}</td>
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
