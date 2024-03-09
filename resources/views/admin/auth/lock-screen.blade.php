@extends('admin.layouts.layout-2')
@section('title',__('keyword.screen-locked'))
@section('content')
<div class="auth-wrapper">
	<div class="blur-bg-images"></div>
	<!-- [ profile-settings ] start -->
	<div class="auth-content">
		<div class="auth-bg">
			<span class="r"></span>
			<span class="r s"></span>
			<span class="r s"></span>
			<span class="r"></span>
		</div>
		<div class="card">
			<div class="card-body text-center">
				<h5 class="mb-1">{{ __('keyword.screen-locked') }}</h5>
                <p class="mb-3">{{ __('keyword.enter-password-to-login') }}</p>
				<img src="{{ Session::has('userProfileImage')? asset(session('userProfileImage')??'uploads/avatars/avatar.png'):'uploads/avatars/avatar.png' }}" class="img-radius mb-4" alt="User-Profile-Image">
                <form action="{{ route('login.perform') }}" method="post" >
                    @csrf
                    @method('POST')
                    <div class="input-group mb-2">
                        <input type="hidden" class="form-control {{ $errors->has('username')?'is-invalid':'' }}" name="username" placeholder="{{ __('keyword.username') }}" value="{{ Session::has('userEmail')?session('userEmail'):'' }}">
                        <div class="input-group mb-2">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="password" name="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" placeholder="{{ __('keyword.password') }}">
                        </div>
                        <input type="hidden" name="fromLockedScreen" value="true">
                    </div>
                    <button type="submit" class="btn  btn-outline-primary mt-2 px-5">{{ __('keyword.login') }}</button>
                </form>
			</div>
		</div>
	</div>
	<!-- [ profile-settings ] end -->
</div>
@endsection

