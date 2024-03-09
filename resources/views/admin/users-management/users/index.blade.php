@extends('admin.layouts.layout')

@section('title',__('keyword.users'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.users') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.users') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-users') }}</h5>
                                        <div>
                                            @can('users.create')
                                            <a href="{{ route('users.create') }}" class="btn btn-outline-primary" >
                                                <i class="feather me-1 icon-plus"></i>
                                                {{ __('keyword.add-new-user') }}
                                            </a>
                                            @endcan
                                            @can('users.archive')
                                            <a href="{{ route('users.archive') }}" class="btn btn-outline-danger" >
                                                <i class="feather me-1 icon-box"></i>
                                                {{ __('keyword.show-archive') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-create-edit-or-delete-user') }}</span>
                                    <hr>
                                </div>
                                <div class="card user-profile-list">
                                    <div class="card-body">
                                        <div class="dt-responsive table-responsive">
                                            <table id="datatable" class="table nowrap ">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('keyword.name') }}</th>
                                                        <th>{{ __('keyword.username') }}</th>
                                                        <th>{{ __('keyword.phone') }}</th>
                                                        <th>{{ __('keyword.position') }}</th>
                                                        <th>{{ __('keyword.user-type') }}</th>
                                                        <th>{{ __('keyword.service') }}</th>
                                                        <th>{{ __('keyword.role') }}</th>
                                                        <th>{{ __('keyword.status') }}</th>
                                                        <th>{{ __('keyword.created-date') }}</th>
                                                        <th>{{ __('keyword.action') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($users as  $key=>$user)
                                                    <tr>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <img src="{{ asset($user->profile_image??asset('uploads/avatars/avatar.png')) }}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
                                                                <div class="d-inline-block">
                                                                    <h6 class="m-b-0">{{ $user->name }}</h6>
                                                                    <p class="m-0 f-14">{{ $user->email }}</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ $user->username??'--' }}</td>
                                                        <td>{{ $user->phone??'--' }}</td>
                                                        <td>{{ $user->position??'--' }}</td>
                                                        <td>{{ $user->type===1?__('keyword.governmental'):($user->type===2?__('keyword.private'):'--') }}</td>
                                                        <td>{{ $user->service===1?__('keyword.in-service'):($user->service===2?__('keyword.free-service'):'--') }}</td>
                                                        <td>
                                                            @forelse ($user->roles as $role)
                                                                {{ $role->name }}
                                                            @empty
                                                            {{ '--' }}
                                                            @endforelse
                                                        </td>
                                                        <td>
                                                            <span class="badge f-12 {{ $user->status===1?'bg-success':'bg-danger' }}"> {{ $user->status===1?__('keyword.active'):__('keyword.suspended') }}</span>
                                                        </td>
                                                        <td>{{ date('m/d/Y',strtotime($user->created_at)) }}</td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    {{-- @can('users.show')
                                                                    <a class="dropdown-item" href="{{ route('users.show', $user->id) }}">
                                                                        <i class="feather icon-eye"></i>
                                                                        {{ __('keyword.show') }}
                                                                    </a>
                                                                    @endcan --}}
                                                                    @can('users.edit')
                                                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit') }}
                                                                    </a>
                                                                    @endcan

                                                                    @can('users.change-status')
                                                                    <form action="{{ route('users.change-status', $user->id) }}"
                                                                        method="post" class="d-inline">
                                                                        @method('patch')
                                                                        @csrf
                                                                        <button type="submit" class="dropdown-item ">
                                                                            @if ($user->status===1)
                                                                            <i class="feather icon-shield"></i>
                                                                                {{ __('keyword.suspend') }}
                                                                            @else
                                                                            <i class="feather icon-check"></i>
                                                                                {{ __('keyword.active') }}
                                                                            @endif
                                                                        </button>
                                                                    </form>
                                                                    @endcan

                                                                    @can('users.add-to-archive')
                                                                    <form action="{{ route('users.add-to-archive', $user->id) }}"
                                                                        method="post" class="d-inline">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="button" class="dropdown-item"
                                                                            onclick="addtoArchive(this);">
                                                                            <i class="feather icon-box"></i>
                                                                            {{ __('keyword.archive') }}
                                                                        </button>
                                                                    </form>
                                                                    @endcan
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>{{ __('keyword.name') }}</th>
                                                        <th>{{ __('keyword.username') }}</th>
                                                        <th>{{ __('keyword.phone') }}</th>
                                                        <th>{{ __('keyword.position') }}</th>
                                                        <th>{{ __('keyword.user-type') }}</th>
                                                        <th>{{ __('keyword.service') }}</th>
                                                        <th>{{ __('keyword.role') }}</th>
                                                        <th>{{ __('keyword.status') }}</th>
                                                        <th>{{ __('keyword.created-date') }}</th>
                                                        <th>{{ __('keyword.action') }}</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
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
