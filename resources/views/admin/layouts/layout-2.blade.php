<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }} - @yield('title') </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{$setting?asset('uploads/'.$setting->logo):''}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">
    <script src="{{ asset('assets/admin/js/plugins/sweetalert2.all.min.js')}}"></script>


    <!-- RTL layouts -->
    @if ($locale!=='en')
        <link rel="stylesheet" href="{{ asset('assets/admin/css/layout-rtl.css')}}">
    @endif


</head>

<body class="">

    <!-- [ auth-signin ] start -->
        @section('content')
        @show
    <!-- [ auth-signin ] end -->


    <!-- Required Js -->
    <script src="{{ asset('assets/admin/js/plugins/bootstrap.min.js')}}"></script>

    {{-- JQuery --}}
    <script src="{{ asset('assets/admin/js/jquery.js')}}"></script>

    {{-- Notification --}}
    <script src="{{ asset('assets/admin/js/plugins/notifier.js')}}"></script>

    {{-- Sweet Alert --}}

    <script>
        // sweet allert success
        msgSuccess=(msg)=>{
            let timerInterval
            Swal.fire({
                position: 'top-right',
                icon: 'success',
                title: '{{ __("keyword.success") }}',
                html: `<p class='f-w-500 f-20'>${msg}</p>`,
                timer: 3000,
                timerProgressBar: true,
            })
        }
        // sweet allert error
        msgError=(msg)=>{
            let timerInterval
            Swal.fire({
                position: 'top-center',
                icon: 'error',
                html: `<h3 class='text-danger'>{{ __("keyword.suspended") }}</h3><p class='text-danger f-20 text-center mb-2'>${msg}</p>`,
            })
        }

        msgErrors=(msg)=>{
            let timerInterval
            Swal.fire({
                position: 'top-right',
                icon: 'warning',
                html: `<h4 class='text-warning'>{{ __("keyword.error") }}</h4><p class='text-warning mb-2 text-start'>${msg}</p>`,
            })
        }

    </script>

@if(Session::has('success'))
    <script>
            msgSuccess('{{ session("success") }}')
    </script>
    @endif

    @if(Session::has('error'))
    <script>
        msgError('{{ session("error") }}')
    </script>
    @endif

    @if(count($errors)>0)
    <script>
        msgErrors("@foreach ($errors->all() as $error ){{$error}} <br>   @endforeach")

    </script>
    @endif

    @section('script')
    @show
    <script src="{{ asset('assets/admin/js/menu-setting.js')}}"></script>

</body>

</html>
