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
                                <a href="{{ route('users.index') }}" class="btn btn-link">
                                    <i class="feather me-2 icon-arrow-left"></i>
                                    {{ __('keyword.go-back') }}
                                </a>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('users.index') }}">{{ __('keyword.users') }}</a></li>
                                <li class="breadcrumb-item active"><a href="#!">{{ __('keyword.edit') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.edit-user') }}</h5>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.enter-all-required-information') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <form method="post" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                                                @method('patch')
                                                @csrf
                                                <div class='row'>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="name" class="form-label">{{ __('keyword.name') }}</label>
                                                        <input value="{{ $user->name }}"
                                                            type="text"
                                                            class="form-control"
                                                            name="name"
                                                            placeholder="{{ __('keyword.name') }}" required>

                                                        @if ($errors->has('name'))
                                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="username" class="form-label">{{ __('keyword.username') }}</label>
                                                        <input value="{{ $user->username }}"
                                                            type="text"
                                                            class="form-control"
                                                            name="username"
                                                            placeholder="{{ __('keyword.username') }}" required>
                                                        @if ($errors->has('username'))
                                                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="email" class="form-label">{{ __('keyword.email') }}</label>
                                                        <input value="{{ $user->email }}"
                                                            type="email"
                                                            class="form-control"
                                                            name="email"
                                                            placeholder="{{ __('keyword.email') }}" required>
                                                        @if ($errors->has('email'))
                                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="phone" class="form-label">{{ __("keyword.phone") }}</label>
                                                        <input  type="text" class="form-control {{ $errors->has('phone')?'is-invalid':'' }}"
                                                            name="phone" value="{{ $user->phone }}" placeholder="{{ __("keyword.phone") }}"  >
                                                        @if ($errors->has('phone'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="position" class="form-label">{{ __("keyword.position") }}</label>
                                                        <input type="text" class="form-control {{ $errors->has('position')?'is-invalid':'' }}"
                                                            name="position" value="{{ $user->position }}" placeholder="{{ __("keyword.position") }}" >
                                                        @if ($errors->has('position'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('position') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label for="type" class="form-label">{{ __("keyword.user-type") }} <span class="text-danger">*</span></label>
                                                        <select name="userType" class="form-select {{ $errors->has('userType')?'is-invalid':'' }}" required>
                                                            <option value="" disabled selected>{{ __('keyword.select-user-type') }}</option>
                                                            <option value="1" {{ $user->type===1?'selected':'' }}>{{__('keyword.governmental')}}</option>
                                                            <option value="2" {{ $user->type===2?'selected':'' }}>{{__('keyword.private')}}</option>
                                                        </select>
                                                        @if ($errors->has('userType'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('userType') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label for="type" class="form-label">{{ __("keyword.service") }} <span class="text-danger">*</span></label>
                                                        <select name="userService" class="form-select {{ $errors->has('userService')?'is-invalid':'' }}" required>
                                                            <option value="" selected disabled>{{ __('keyword.select-user-service') }}</option>
                                                            <option value="1" {{ $user->service===1?'selected':'' }}>{{__('keyword.in-service')}}</option>
                                                            <option value="2" {{ $user->service===2?'selected':'' }}>{{__('keyword.free-service')}}</option>
                                                        </select>
                                                        @if ($errors->has('userService'))
                                                            <span class="text-danger text-left">{{ $errors->first('userService') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="profile-image" class="form-label">{{ __("keyword.profile-image") }}</label>
                                                        <input  type="file" class="form-control  {{ $errors->has('profileImage')?'is-invalid':'' }}" value="{{ old('profileImage') }}"
                                                            name="profileImage" placeholder="" accept="image/*">
                                                        @if ($errors->has('profileImage'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('profileImage') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="cover-image" class="form-label">{{ __("keyword.cover-image") }}</label>
                                                        <input type="file" class="form-control {{ $errors->has('coverImage')?'is-invalid':'' }}"  value="{{ old('coverImage') }}"
                                                            name="coverImage" placeholder="" accept="image/*">
                                                        @if ($errors->has('coverImage'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('coverImage') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="password"
                                                            class="form-label">{{ __("keyword.password") }}</label>
                                                        <input value="{{ old('password') }}" type="password"
                                                            class="form-control" name="password"
                                                            placeholder="{{ __("keyword.password") }}" >
                                                        @if ($errors->has('password'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="confirm-password"
                                                            class="form-label">{{ __("keyword.confirm-password") }}</label>
                                                        <input value="{{ old('confirm-password') }}" type="password"
                                                            class="form-control" name="password_confirmation"
                                                            placeholder="{{ __("keyword.confirm-password") }}" >
                                                        @if ($errors->has('password_confirmation'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="role" class="form-label">{{ __('keyword.role') }}</label>
                                                        <select class="form-select"
                                                            name="role" required>
                                                            <option value="" selected disabled>{{ __('keyword.select-role') }}</option>
                                                            @foreach($roles as $role)
                                                                <option value="{{ $role->id }}"
                                                                    {{ in_array($role->name, $userRole)
                                                                        ? 'selected'
                                                                        : '' }}>{{ $role->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('role'))
                                                            <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="address"
                                                            class="form-label">{{ __("keyword.address") }}</label>
                                                        <input  type="text" class="form-control {{ $errors->has('address')?'is-invalid':'' }}"
                                                            name="address" value="{{ $user->address }}" placeholder="{{ __("keyword.address") }}" >
                                                        @if ($errors->has('address'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('address') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 text-end">
                                                        <button type="submit" class="btn btn-outline-primary"><i
                                                            class="feather me-2 icon-save"></i>{{ __("keyword.save-changes") }}</button>
                                                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger"> <i
                                                            class="feather me-2 icon-x"></i>{{ __("keyword.cancel") }}</a>
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


{{--

@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $user->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user->username }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control"
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole)
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection --}}
