@extends('admin.layouts.layout')

@section('title',__('keyword.students'))
@section('script')
    <style>
        @media (min-width: 992px){
            .modal-lg, .modal-xl {
                max-width: 1200px;
            }
        }
    </style>
@endsection
@section('content')
<div class="pcoded-inner-content d-print-none">
    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title d-flex justify-content-between ">
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.students') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="{{ route('students.index') }}">{{ __('keyword.students') }}</a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.student-info') }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="row">
                        <!-- [ basic-table ] start -->
                        <div class="col-xl-12">
                            <div class="card pb-5">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between ">
                                        <h5 class="align-self-center">{{ __('keyword.student-info') }}</h5>
                                        @can('students.index')
                                        <a href="{{ route('students.index') }}" class="btn btn-outline-primary" >
                                            <i class="feather me-1 icon-file-text"></i>
                                            {{ __('keyword.students-list') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-see-student-info') }}</span>
                                    <hr>
                                </div>

                                <div class="card-block table-border-style ">
                                    <div class="row py-3 border-bottom">

                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.name') }} : </div>
                                                <div class="col f-14">{{ $student->name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.father-name') }} : </div>
                                                <div class="col f-14">{{ $student->father_name }}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.graduation-date') }} : </div>
                                                <div class="col f-14">{{ $student->graduation_year }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row py-3 border-bottom">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.province') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->province?($locale==='en'?$student->province->name_en:($locale==='pa'?$student->province->name_pa:$student->province->name_dr)):'' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.collage') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->collage?($locale==='en'?$student->collage->name_en:($locale==='pa'?$student->collage->name_pa:$student->collage->name_dr)):'' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.department') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->department?($locale==='en'?$student->department->name_en:($locale==='pa'?$student->department->name_pa:$student->department->name_dr)):'' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row py-3 border-bottom">
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.added-by') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->addedBy->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.edited-by') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->editedBy?$student->editedBy->name:'--' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="row">
                                                <div class="col f-14">{{ __('keyword.remarks') }} : </div>
                                                <div class="col f-14">
                                                    {{ $student->identityScan?($student->identityScan->remark??'---'):'---'}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- [ basic-table ] end -->
                    </div>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="align-self-center">{{ __('keyword.identity-and-result-sheet-forms-info') }}</h5>
                                <span class="d-block mb-4">
                                    {{ __('keyword.here-you-can-see-student-result-sheet-info') }}
                                </span>
                                <hr>
                                <ul class="nav nav-tabs mb-3 broder-bottom" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active text-uppercase" id="identity-form-tab"
                                            data-bs-toggle="tab" href="#identity-form" role="tab" aria-controls="identity-form"
                                            aria-selected="true">
                                            <h6 class="mt-2">{{ __('keyword.identity-form') }}</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="first-semester-tab"
                                            data-bs-toggle="tab" href="#first-semester" role="tab" aria-controls="first-semester"
                                            aria-selected="true">
                                            <h6 class="mt-2">{{ __('keyword.first semester result sheet') }}</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="second-semester-tab"
                                            data-bs-toggle="tab" href="#second-semester" role="tab"
                                            aria-controls="second-semester" aria-selected="false">
                                            <h6 class="mt-2">{{ __('keyword.second semester result sheet') }}</h6>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-uppercase" id="third-semester-tab"
                                            data-bs-toggle="tab" href="#third-semester" role="tab"
                                            aria-controls="third-semester" aria-selected="false">
                                            <h6 class="mt-2">{{ __('keyword.third semester result sheet') }}</h6>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link  text-uppercase" id="forth-semester-tab"
                                            data-bs-toggle="tab" href="#forth-semester" role="tab"
                                            aria-controls="forth-semester" aria-selected="false">
                                            <h6 class="mt-2">{{ __('keyword.forth semester result sheet') }}</h6>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="identity-form" role="tabpanel" aria-labelledby="identity-form-tab">
                                        <div class="row">
                                            <div class="col-md-12" style="overflow-x: auto; height: 70vh;">
                                                <a href="#" onclick="showImage('{{ asset($student->identityScan->scan_path) }}');">
                                                    <img src="{{asset($student->identityScan->scan_path) }}" class="img-fluid m-b-10 " alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="row ">
                                            @if ($student->identityScan->appendices->isNotEmpty())
                                                <div class="col-xl-12 mt-5">
                                                    <div class="d-flex justify-content-between ">
                                                        <h6 class="align-self-center">{{ __('keyword.student-identity-form-appendixes') }}</h6>
                                                    </div>
                                                    <div class="row ">
                                                        @foreach ($student->identityScan->appendices as $appendex)
                                                        <div class="col-md-2">
                                                            <a href="#" onclick="showImage('{{ asset($appendex->scan_path) }}');">
                                                                <img src="{{asset($appendex->scan_path) }}" class="w-100 m-b-10 border border-2 p-2" alt="" style="height: 200px; object-fit: cover";>
                                                            </a>
                                                            <a href="#" class="btn btn-primary feather w-100 icon-eye ms-1" onclick="showImage('{{ asset($appendex->scan_path) }}');"> {{ __('keyword.show') }} </a>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="first-semester" role="tabpanel" aria-labelledby="first-semester-tab">
                                        @forelse ( $student->resultSheetScanSemester1 as  $resultSheetSemester1)
                                        @canany(['students.edit-student-result-sheet','students.delete-student-result-sheet'])
                                            <div class="row align-items-md-stretch">
                                                <div class="col-md-auto">
                                                    <span class="d-block">{{ __('keyword.action') }}</span>
                                                    <div class="p-2 my-2  border rounded-2">
                                                        @can('students.edit-student-result-sheet')
                                                            <a href="{{ route('students.edit-student-result-sheet',[$resultSheetSemester1->id,1]) }}" class="btn btn-primary feather icon-edit py-2 px-5"> {{ __('keyword.edit') }}</a>
                                                        @endcan
                                                        @can('students.delete-student-result-sheet')
                                                            <a href="#" class="btn btn-danger feather icon-trash-2 py-2 px-4"> {{ __('keyword.delete') }}</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endcanany
                                        <div class="w-100 border d-flex flex-column" style="overflow-x: auto; height: 70vh; ">
                                            <a href="#" onclick="showImage('{{ asset($resultSheetSemester1->scan_path) }}');">
                                                <img src="{{asset($resultSheetSemester1->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                            </a>
                                        </div>
                                        @empty
                                            <span class="m-auto text-danger">{{ __('keyword.student-first-semester-result-sheet-not added') }}</span>
                                        @endforelse
                                        <div class="row">
                                            @forelse ($student->resultSheetScanSemester1 as  $resultSheetSemester1Appendixes)
                                                @if($resultSheetSemester1Appendixes->appendixesSemester1->isNotEmpty())
                                                    <div class="col-md-12 mt-3">
                                                        <h6>{{ __('keyword.appendices') }}</h6>
                                                    </div>
                                                    @forelse ($resultSheetSemester1Appendixes->appendixesSemester1 as  $semester1Appendix)
                                                    <div class="col-md-3" style="overflow-x: auto; height: 30vh; ">
                                                        <a href="#" onclick="showImage('{{ asset($semester1Appendix->scan_path) }}');">
                                                            <img src="{{asset($semester1Appendix->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                                        </a>
                                                    </div>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="second-semester" role="tabpanel" aria-labelledby="second-semester-tab">
                                        @forelse ( $student->resultSheetScanSemester2 as  $resultSheetSemester2)
                                        @canany(['students.edit-student-result-sheet','students.delete-student-result-sheet'])
                                            <div class="row align-items-md-stretch">
                                                <div class="col-md-auto">
                                                    <span class="d-block">{{ __('keyword.action') }}</span>
                                                    <div class="p-2 my-2  border rounded-2">
                                                        @can('students.edit-student-result-sheet')
                                                            <a href="{{ route('students.edit-student-result-sheet',[$resultSheetSemester2->id,2]) }}" class="btn btn-primary feather icon-edit py-2 px-4"> {{ __('keyword.edit') }}</a>
                                                        @endcan
                                                        @can('students.delete-student-result-sheet')
                                                            <a href="#" class="btn btn-danger feather icon-trash-2 py-2 px-4"> {{ __('keyword.delete') }}</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endcanany
                                        <div class="w-100 border d-flex flex-column" style="overflow-x: auto; height: 70vh; ">
                                            <a href="#" onclick="showImage('{{ asset($resultSheetSemester2->scan_path) }}');">
                                                <img src="{{asset($resultSheetSemester2->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                            </a>
                                        </div>
                                        @empty
                                            <span class="m-auto text-danger">{{ __('keyword.student-second-semester-result-sheet-not added') }}</span>
                                        @endforelse
                                        <div class="row">
                                            @forelse ($student->resultSheetScanSemester2 as  $resultSheetSemester2Appendixes)
                                                @if($resultSheetSemester2Appendixes->appendixesSemester2->isNotEmpty())
                                                    <div class="col-md-12 mt-3">
                                                        <h6>{{ __('keyword.appendices') }}</h6>
                                                    </div>
                                                    @forelse ($resultSheetSemester2Appendixes->appendixesSemester2 as  $semester2Appendix)
                                                    <div class="col-md-3" style="overflow-x: auto; height: 30vh; ">
                                                        <a href="#" onclick="showImage('{{ asset($semester2Appendix->scan_path) }}');">
                                                            <img src="{{asset($semester2Appendix->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                                        </a>
                                                    </div>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="third-semester" role="tabpanel" aria-labelledby="third-semester-tab">

                                        @forelse ( $student->resultSheetScanSemester3 as  $resultSheetSemester3)
                                        @canany(['students.edit-student-result-sheet','students.delete-student-result-sheet'])
                                            <div class="row align-items-md-stretch">
                                                <div class="col-md-auto">
                                                    <span class="d-block">{{ __('keyword.action') }}</span>
                                                    <div class="p-2 my-2  border rounded-2">
                                                        @can('students.edit-student-result-sheet')
                                                            <a href="{{ route('students.edit-student-result-sheet',[$resultSheetSemester3->id,3]) }}" class="btn btn-primary feather icon-edit py-2 px-4"> {{ __('keyword.edit') }}</a>
                                                        @endcan
                                                        @can('students.delete-student-result-sheet')
                                                            <a href="#" class="btn btn-danger feather icon-trash-2 py-2 px-4"> {{ __('keyword.delete') }}</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endcanany
                                        <div class="w-100 border d-flex flex-column" style="overflow-x: auto; height: 70vh; ">
                                            <a href="#" onclick="showImage('{{ asset($resultSheetSemester3->scan_path) }}');">
                                                <img src="{{asset($resultSheetSemester3->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                            </a>
                                        </div>
                                        @empty
                                            <span class="m-auto text-danger">{{ __('keyword.student-third-semester-result-sheet-not added') }}</span>
                                        @endforelse
                                        <div class="row">
                                            @forelse ($student->resultSheetScanSemester3 as  $resultSheetSemester3Appendixes)
                                                @if($resultSheetSemester3Appendixes->appendixesSemester3->isNotEmpty())
                                                    <div class="col-md-12 mt-3">
                                                        <h6>{{ __('keyword.appendices') }}</h6>
                                                    </div>
                                                    @forelse ($resultSheetSemester3Appendixes->appendixesSemester3 as  $semester3Appendix)
                                                    <div class="col-md-3" style="overflow-x: auto; height: 30vh; ">
                                                        <a href="#" onclick="showImage('{{ asset($semester3Appendix->scan_path) }}');">
                                                            <img src="{{asset($semester3Appendix->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                                        </a>
                                                    </div>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="forth-semester" role="tabpanel" aria-labelledby="forth-semester-tab">
                                        @forelse ( $student->resultSheetScanSemester4 as  $resultSheetSemester4)
                                        @canany(['students.edit-student-result-sheet','students.delete-student-result-sheet'])
                                            <div class="row align-items-md-stretch">
                                                <div class="col-md-auto">
                                                    <span class="d-block">{{ __('keyword.action') }}</span>
                                                    <div class="p-2 my-2  border rounded-2">
                                                        @can('students.edit-student-result-sheet')
                                                            <a href="{{ route('students.edit-student-result-sheet',[$resultSheetSemester4->id,4]) }}" class="btn btn-primary feather icon-edit py-2 px-4"> {{ __('keyword.edit') }}</a>
                                                        @endcan
                                                        @can('students.delete-student-result-sheet')
                                                            <a href="#" class="btn btn-danger feather icon-trash-2 py-2 px-4"> {{ __('keyword.delete') }}</a>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endcanany
                                        <div class="w-100 border d-flex flex-column" style="overflow-x: auto; height: 70vh; ">
                                            <a href="#" onclick="showImage('{{ asset($resultSheetSemester4->scan_path) }}');">
                                                <img src="{{asset($resultSheetSemester4->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                            </a>
                                        </div>
                                        @empty
                                            <span class="m-auto text-danger">{{ __('keyword.student-forth-semester-result-sheet-not added') }}</span>
                                        @endforelse
                                        <div class="row">
                                            @forelse ($student->resultSheetScanSemester4 as  $resultSheetSemester4Appendixes)
                                                @if($resultSheetSemester4Appendixes->appendixesSemester4->isNotEmpty())
                                                    <div class="col-md-12 mt-3">
                                                        <h6>{{ __('keyword.appendices') }}</h6>
                                                    </div>
                                                    @forelse ($resultSheetSemester4Appendixes->appendixesSemester4 as  $semester4Appendix)
                                                    <div class="col-md-3" style="overflow-x: auto; height: 30vh; ">
                                                        <a href="#" onclick="showImage('{{ asset($semester4Appendix->scan_path) }}');">
                                                            <img src="{{asset($semester4Appendix->scan_path) }}" class="img-fluid m-b-10 border " alt="">
                                                        </a>
                                                    </div>
                                                    @empty
                                                    @endforelse
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-lightbox" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0">
            <button type=" button" class="btn-close btn-close-white position-absolute bottom-100 start-100 translate-middle1  d-print-none" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body p-2"  style="height: 90vh; overflow: auto;">
                <img src="" alt="images" class="modal-image img-fluid w-100" id="printTable">
            </div>
            <div class="row justify-content-center d-print-none">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary my-2 py-2 " onclick=" window.print();"> <i class="feather icon-printer ms-1"></i>{{ __('keyword.print') }}</button>
                    <button type="button" class="btn btn-danger my-2 py-2" data-bs-dismiss="modal" aria-label="Close"> <i class="feather icon-x ms-1"></i>{{ __('keyword.cancel') }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
