<!DOCTYPE html>
<html lang="{{ $locale }}">

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

    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/prism-coy.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/plugins/style.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/admin/DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/DataTables/Buttons/css/buttons.dataTables.css')}}">



    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/style.css')}}">

     {{-- input select --}}
     <script src="{{ asset('assets/admin/js/plugins/choices.min.js') }}"></script>


    <!-- RTL layouts -->
    @if ($locale!=='en')
        <link rel="stylesheet" href="{{ asset('assets/admin/css/layout-rtl.css')}}">
        <style>
            .dataTable-table>thead>tr>th {
                text-align: right;
            }

        </style>
    @endif
    @section('head')
        @show

</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->

    <x-admin.layouts.sidebar></x-admin.layouts.sidebar>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <x-admin.layouts.header></x-admin.layouts.header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Main Content ] start -->
            @section('content')
            @show
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
    <x-admin.user-profile/>
    {{-- [User Profile Start] --}}

    {{-- [User Profile End ] --}}


    {{-- image Preveiw start --}}
    <div class="modal fade modal-lightbox" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <button type=" button"
                    class="btn-close btn-close-white position-absolute bottom-100 start-100 translate-middle1"
                    data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body p-0">
                    <img src="" alt="images" class="modal-image img-fluid w-100">
                </div>
            </div>
        </div>
    </div>
    {{-- image Preveiw end --}}

    <!-- Required Js -->
    <script src="{{ asset('assets/admin/js/plugins/popper.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/admin/js/pcoded.js')}}"></script>

    {{-- JQuery --}}
    <script src="{{ asset('assets/admin/js/jquery.js')}}"></script>

    {{-- Sweet Alert --}}
    <script src="{{ asset('assets/admin/js/plugins/sweetalert2.all.min.js')}}"></script>

    <!-- Apex Chart -->
    <script src="{{ asset('assets/admin/js/plugins/apexcharts.min.js')}}"></script>

    @if ($url==='admin')
    <script src="{{ asset('assets/admin/js/pages/dashboard-main.js')}}"></script>
    @endif
    {{-- Datatable  --}}
    <script src="{{ asset('assets/admin/DataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/dataTables.buttons.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/buttons.html5.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/pdfmaker.min.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/vfs_fonts.min.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/colVis.min.js')}}"></script>
    <script src="{{ asset('assets/admin/DataTables/Buttons/js/buttons.print.js')}}"></script>

    <!-- Input mask Js -->
    <script src="{{ asset('assets/admin/js/plugins/imask.min.js')}}"></script>
    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/admin/js/pages/form-masking-custom.js')}}"></script>

    {{-- <script src="{{ asset('assets/admin/js/plugins/simple-datatables.js')}}"></script> --}}

     {{-- Custom Js --}}
     <script src="{{ asset('assets/admin/js/custom.js')}}"></script>

    <script src="{{ asset('assets/admin/js/plugins/prism.js') }}"></script>


    <script>
        let local= "{{ $locale }}"
        window.localStorage.setItem('local',local);
        // Sweet alerts Start
        deleteRecord = (e) => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-1',
                    cancelButton: 'btn btn-danger mx-1'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: '{{ __("msg.are-you-sure") }}',
                text: '{{ __("msg.you-will-not-be-able-to-revert-this-record") }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __("keyword.yes-delete-it") }}',
                cancelButtonText: '{{ __("keyword.no-cancel") }}',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    e.parentNode.submit()
                    // document.querySelector('.form-' + id).submit();
                }
            })
        }

        addtoArchive = (e) => {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success mx-1',
                    cancelButton: 'btn btn-danger mx-1'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: '{{ __("msg.are-you-sure") }}',
                text: '{{ __("msg.you-can-restore-from-archive") }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __("keyword.yes-archive-it") }}',
                cancelButtonText: '{{ __("keyword.no-cancel") }}',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    e.parentNode.submit()
                    // document.querySelector('.form-' + id).submit();
                }
            })
        }



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
                position: 'top-right',
                icon: 'warning',
                html: `<h4 class='text-warning'>{{ __("keyword.error") }}</h4><p class='text-warning text-start f-w-500 f-20 mb-2'>${msg}</p>`,
            })
        }

        msgErrors=(msg)=>{
            let timerInterval
            Swal.fire({
                position: 'top-right',
                icon: 'warning',
                html: `<h4 class='text-warning'>{{ __("keyword.error") }}</h4><p class='text-warning text-start f-w-500 f-20 '>${msg}</p>`,
            })
        }


    </script>

    @section('script')
    @show

    {{-- sweet alerts   --}}
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
    <script src="{{ asset('assets/admin/js/menu-setting.js')}}"></script>


</body>

</html>
