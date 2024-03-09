@extends('admin.layouts.layout-2')
@section('title',__('keyword.login'))
@section('content')
    <!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content">
        <div class="card p-0">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <img src="{{ $setting?asset($setting->logo):''}}" alt="" class="img-fluid mb-2 wid-100">
                        <p class="mb-1 f-18 f-w-500">{{__('keyword.welcome-back')}}</p>
                        <h4 class="mb-4 f-w-600">{{__('keyword.login')}}</h4>
                        <form action="{{ route('login.perform') }}" method="post">
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <span class="input-group-text"  style="{{ $locale!=='en'?'border-radius:0;border-top-right-radius:5px; border-bottom-right-radius:5px':'' }}">
                                    <i class="feather icon-mail"></i>
                                </span>
                                <input type="text" class="form-control {{ $errors->has('username')?'is-invalid':'' }}"
                                    style="{{ $locale!=='en'?'border-radius:0;border-top-left-radius:5px; border-bottom-left-radius:5px':'' }}"
                                    name="username" placeholder="{{ __('keyword.username') }}" value="{{ old('username') }}">
                            </div>
                            <div class="input-group mb-2">
                                <span class="input-group-text"
                                    style="{{ $locale!=='en'?'border-radius:0;border-top-right-radius:5px; border-bottom-right-radius:5px':'' }}">
                                    <i class="feather icon-lock"></i>
                                </span>
                                <input type="password" name="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                                    style="{{ $locale!=='en'?'border-radius:0;border-top-left-radius:5px; border-bottom-left-radius:5px':'' }}"
                                    placeholder="{{ __('keyword.password') }}">
                            </div>
                            <div class="form-group text-left mt-2 mb-0">
                                <div class="checkbox checkbox-primary d-flex justify-content-between">
                                    <div>
                                        <input type="checkbox" name="checkbox-p-1" id="checkbox-p-1" checked="">
                                        <label for="checkbox-p-1" class="cr">{{__('keyword.show-password')}}</label>
                                    </div>

                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-outline-primary px-5 mt-2 mb-0">{{__('keyword.login')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- [ auth-signin ] end -->
@endsection

