@extends('admin.layouts.layout-2')
@section('title','__("keyword.page-not-found")')

@section('content')
    <div class="auth-wrapper maintance">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <img src="{{asset('assets/admin/images/maintance/404.png')}}" alt="" class="img-fluid"> 
                    <h1 class="f-80 f-w-600">Oops!</h1>
                    <h5 class="mt-4">{{__('keyword.Page not found!')}}</h5>
                    {{-- <p class="text-muted">illustration by <a href="https://undraw.co/search">undraw.co</a></p> --}}
                    <a href="{{route('dashboard')}}" class="btn  btn-danger text-light mb-4"><i class="feather icon-refresh-ccw me-2"></i>Reload</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection