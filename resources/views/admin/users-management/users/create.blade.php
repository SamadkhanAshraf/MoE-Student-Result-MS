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
                                <li class="breadcrumb-item"><a
                                        href="{{ route('users.index') }}">{{ __('keyword.users') }}</a></li>
                                <li class="breadcrumb-item active"><a href="#!">{{ __('keyword.add-new') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.add-new-user') }}</h5>
                                        <div>
                                            @can('users.index')
                                            <a href="{{ route('users.index') }}" class="btn btn-outline-primary" >
                                                <i class="feather me-1 icon-file-text"></i>
                                                {{ __('keyword.users-list') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.enter-all-required-information') }}, & (<span class="text-danger">*</span>) {{ __('keyword.required') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <form method="POST" action="{{ route('users.create') }}" enctype="multipart/form-data">
                                                @method('post')
                                                @csrf
                                                <div class="row">
                                                    <div class=" col-md-6 mb-3">
                                                        <label for="name" class="form-label"> {{ __("keyword.name") }} <span class="text-danger">*</span></label>
                                                        <input value="{{ old('name') }}" type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name" placeholder="{{ __("keyword.name") }}" required>
                                                        @if ($errors->has('name'))
                                                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="username" class="form-label"> {{ __("keyword.username") }} <span class="text-danger">*</span> </label>
                                                        <input value="{{ old('username') }}" type="text" class="form-control {{ $errors->has('username')?'is-invalid':'' }}"
                                                            name="username" placeholder="{{ __("keyword.username") }}" required>
                                                        @if ($errors->has('username'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('username') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="email" class="form-label">{{ __("keyword.email") }} <span class="text-danger">*</span></label>
                                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                                             placeholder=" {{ __("keyword.email") }}" required>
                                                        @if ($errors->has('email'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="phone" class="form-label">{{ __("keyword.phone") }}</label>
                                                        <input value="{{ old('phone') }}" type="text" class="form-control {{ $errors->has('phone')?'is-invalid':'' }}"
                                                            name="phone" placeholder="{{ __("keyword.phone") }}" >
                                                        @if ($errors->has('phone'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="position" class="form-label">{{ __("keyword.position") }}</label>
                                                        <input value="{{ old('position') }}" type="text" class="form-control {{ $errors->has('position')?'is-invalid':'' }}"
                                                            name="position" placeholder="{{ __("keyword.position") }}" >
                                                        @if ($errors->has('position'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('position') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label for="type" class="form-label">{{ __("keyword.user-type") }} <span class="text-danger">*</span></label>
                                                        <select name="userType" class="form-select {{ $errors->has('userType')?'is-invalid':'' }}" required>
                                                            <option value="" selected disabled>{{ __('keyword.select-user-type') }}</option>
                                                            <option value="1" {{ old('userType')==='1'?'selected':'' }}>{{__('keyword.governmental')}}</option>
                                                            <option value="2" {{ old('userType')==='2'?'selected':'' }}>{{__('keyword.private')}}</option>
                                                        </select>
                                                        @if ($errors->has('userType'))
                                                            <span class="text-danger text-left">{{ $errors->first('userType') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-3">
                                                        <label for="type" class="form-label">{{ __("keyword.service") }} <span class="text-danger">*</span></label>
                                                        <select name="userService" class="form-select {{ $errors->has('userService')?'is-invalid':'' }}" required>
                                                            <option value="" selected disabled>{{ __('keyword.select-user-service') }}</option>
                                                            <option value="1" {{ old('userService')==='1'?'selected':'' }}>{{__('keyword.in-service')}}</option>
                                                            <option value="2" {{ old('userService')==='2'?'selected':'' }}>{{__('keyword.free-service')}}</option>
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
                                                            class="form-label">{{ __("keyword.password") }} <span class="text-danger">*</span></label>
                                                        <input value="{{ old('password') }}" type="password"  class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password"
                                                            placeholder="{{ __("keyword.password") }}" required>
                                                        @if ($errors->has('password'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('password') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-6">
                                                        <label for="confirm-password" class="form-label">{{ __("keyword.confirm-password") }} <span class="text-danger">*</span></label>
                                                        <input value="{{ old('confirm-password') }}" type="password"
                                                            class="form-control {{ $errors->has('password_confirmation')?'is-invalid':'' }}" name="password_confirmation"
                                                            placeholder="{{ __("keyword.confirm-password") }}" required>
                                                        @if ($errors->has('password_confirmation'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="mb-3 col-md-12">
                                                        <label for="address"
                                                            class="form-label">{{ __("keyword.address") }}</label>
                                                        <input value="{{ old('address') }}" type="text" class="form-control {{ $errors->has('address')?'is-invalid':'' }}"
                                                            name="address" placeholder="{{ __("keyword.address") }}" >
                                                        @if ($errors->has('address'))
                                                        <span
                                                            class="text-danger text-left">{{ $errors->first('address') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 text-end">
                                                        <button type="submit" class="btn btn-outline-primary"><i
                                                            class="feather me-2 icon-save"></i>{{ __("keyword.save") }}</button>
                                                        <a href="{{ route('users.index') }}" class="btn btn-outline-danger"> <i
                                                            class="feather me-2 icon-x"></i>{{ __("keyword.cancel") }}</a>
                                                    </div>
                                                </div>
                                                {{-- <div class="mb-3">
                                                    <label for="role"
                                                        class="form-label">{{ __("keyword.role") }}</label>
                                                    <select class="form-control" required name="role">
                                                        <option value="">{{ __("keyword.select-role") }}</option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('role'))
                                                    <span
                                                        class="text-danger text-left">{{ $errors->first('role') }}</span>
                                                    @endif
                                                </div> --}}

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

