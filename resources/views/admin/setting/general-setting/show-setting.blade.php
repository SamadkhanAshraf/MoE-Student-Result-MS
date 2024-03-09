
@extends('admin.layouts.layout')

@section('title',__('keyword.general-setting'))
@section('head')
    @if(!$errors->count())
        <style >
            .read-only{
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;  
                border: none!important;
                outline: none!important;
                background-color:transparent !important;
                padding: 0!important;
                font-size: .9rem!important;
            }
            .read-only::placeholder {
                opacity: 0!important;
            }
            .read-only:focus{
                box-shadow:none !important;
            }
        </style>
    @endif
@endsection

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.general-setting') }}</h5>
                                <a href="{{ route('dashboard') }}" class="btn btn-link">
                                    <i class="feather me-2 icon-arrow-left"></i>
                                    {{ __('keyword.go-back') }}
                                </a>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="#">{{ __('keyword.general-setting') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.system-setting') }}</h5>
                                        @can('setting.update')
                                        <a href="#" class="btn btn-primary btn-edit-setting">
                                            <i class="feather icon-edit"></i>
                                        </a>
                                        @endcan
                                       
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-update-system-setting') }}, &  (<span class="text-danger mx-1">*</span>) {{ __('keyword.required') }} </span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            
                                            <form method="post" action="{{ route('setting.update',$setting!==null?$setting->id:0) }}" enctype="multipart/form-data">
                                                @method("post")
                                                @csrf
                                                <div class="row form-group justify-content-center">
                                                    <div class="col-md-3 col-6 text-center ">
                                                        <label class="form-label">{{ __('keyword.logo') }}<span class="text-danger mx-1">*</span></label>
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <img src="{{ $setting!==null? ($setting->logo!==null? asset($setting->logo) :asset('uploads/thumbnile.png')):asset('uploads/thumbnile.png') }}"
                                                             class="rounded {{ $errors->has('logo')?"border-danger":'' }} shadow-sm border  wid-140 d-flex show-logo" 
                                                            alt="{{ $setting!==null?$setting->name:'' }}">
                                                            <button type="button" class="btn btn-secondary btn-sm mx-auto position-absolute btn-load-image d-none"
                                                                onclick="document.querySelector('#logo').click()">
                                                                <i class="feather icon-camera"></i>
                                                            </button>
                                                            <input type="file" accept="image/png,image/svg,image/jpg,image/jpeg,image/gif" class="d-none" id="logo" name="logo" onchange=" displayImage(this,'show-logo');">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-5">
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.name') }}<span class="text-danger mx-1">*</span></label>
                                                        <input type="text" class="form-control read-only {{ $errors->has('name')?'is-invalid':'' }}" name="name"
                                                             placeholder="{{ __('keyword.enter-website-name') }}" value="{{ $setting!==null?$setting->name:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.email') }}<span class="text-danger mx-1">*</span></label>
                                                        <input type="email" class="form-control read-only {{ $errors->has('email')?'is-invalid':'' }}" name="email"
                                                             placeholder="{{ __('keyword.enter-valid-email') }}" value="{{ $setting!==null?$setting->email:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.email-password') }}</label>
                                                        <input type="password" class="form-control read-only " name="password"
                                                          placeholder="{{ __('keyword.enter-email-password') }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.phone') }}<span class="text-danger mx-1">*</span></label>
                                                        <input type="text" class="form-control read-only {{ $errors->has('phone')?'is-invalid':'' }}" name="phone"
                                                             placeholder="{{ __('keyword.enter-phone-number') }}" value="{{ $setting!==null?$setting->phone:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.whatsapp') }}</label>
                                                        <input type="text" class="form-control read-only" name='whatsapp'
                                                            placeholder="{{ __('keyword.enter-whatsapp-number') }}" value="{{ $setting!==null?$setting->whatsapp:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.telegram') }}</label>
                                                        <input type="text" class="form-control read-only"  name="telegram"
                                                             placeholder="{{ __('keyword.enter-telegram-number') }}" value="{{ $setting!==null?$setting->telegram:'' }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.facebook') }}</label>
                                                        <input type="url" class="form-control read-only" name="facebook"
                                                            placeholder="{{ __('keyword.enter-facebook-url') }}" value="{{ $setting!==null?$setting->facebook:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.twitter') }}</label>
                                                        <input type="url" class="form-control read-only" name="twitter"
                                                         placeholder="{{ __('keyword.enter-twitter-url') }}" value="{{ $setting!==null?$setting->twitter:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.instagram') }}</label>
                                                        <input type="url" class="form-control read-only" name="instagram"
                                                          placeholder="{{ __('keyword.enter-instagram-url') }}" value="{{ $setting!==null?$setting->instagram:'' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.linkedin') }}</label>
                                                        <input type="url" class="form-control read-only" name="linkedin"
                                                             placeholder="{{ __('keyword.enter-linkedin-url') }}" value="{{ $setting!==null?$setting->linkedin:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.youtube') }}</label>
                                                        <input type="url" class="form-control read-only" name="youtube"
                                                            placeholder="{{ __('keyword.enter-youtube-channel-url') }}" value="{{ $setting!==null?$setting->youtube:'' }}">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label class="form-label">{{ __('keyword.google-map') }}</label>
                                                        <input type="text" class="form-control read-only" name="googleMap" 
                                                          placeholder="{{ __('keyword.enter-google-map-location') }}" value="{{ $setting!==null?$setting->google_map:'' }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-12">
                                                        <label class="form-label">{{ __('keyword.address') }}</label>
                                                        <input type="text" class="form-control read-only" name="address"
                                                             placeholder="{{ __('keyword.enter-address') }}" value="{{ $setting!==null?$setting->address:'' }}">
                                                    </div>
                                                </div>
                                                <div class=" form-group row ">
                                                    <div class="col">
                                                        <button type="submit" class="btn btn-primary btn-save d-none"><i
                                                            class="feather me-2 icon-save"></i>{{ __("keyword.save-changes") }}</button>
                                                    <a href="{{ route("dashboard") }}" class="btn btn-danger btn-cancel d-none"> <i
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

@section('script')
    <script>
        $(document).ready(function () {
            let status= true
            $('.btn-edit-setting').on('click', function(){
                if(status==true){
                    $('.form-control').removeClass('read-only');
                    $('.form-control::placeholder').css('opacity',1);
                    $('.btn-save').removeClass('d-none');
                    $('.btn-cancel').removeClass('d-none');
                    $('.btn-load-image').removeClass('d-none');
                    status=false;
                }else{
                    $('.form-control').addClass('read-only');
                    $('.form-control::placeholder').css('opacity',0);
                    $('.btn-save').addClass('d-none');
                    $('.btn-cancel').addClass('d-none');
                    $('.btn-load-image').addClass('d-none');
                    status=true;
                }

            });       
        });
    </script>
@endsection

