@extends('admin.layouts.layout')

@section('title',__('keyword.students'))
@section('script')
    <style>
        @media (min-width: 992px){
            .modal-lg, .modal-xl {
                max-width: 1042px;
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
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.students') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-students') }}</h5>
                                        <div>
                                            <a href="{{ route('students.index') }}" class="btn btn-outline-success">
                                                <i class="feather me-2 icon-refresh-ccw"></i>
                                                {{ __('keyword.refresh') }}
                                            </a>
                                            @can('students.create')
                                            <a href="{{ route('students.create') }}" class="btn btn-outline-primary">
                                                <i class="feather me-2 icon-plus"></i>
                                                {{ __('keyword.add-new-students') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-students') }}</span>
                                    <hr>
                                </div>

                                <div class="card-block table-border-style">
                                    <form action="{{ route('students.search') }}"  method="GET">
                                        @method('PATCH')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2">
                                                <x-admin.form-components.select-province :provinceId='$province' />
                                            </div>
                                            <div class="col-md-3">
                                                <x-admin.form-components.select-collage :collageId="$collage" />
                                            </div>

                                            <div class="col-md-2">
                                                <x-admin.form-components.select-collage-department :departmentId='$department'/>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.graduation-date') }} </label>
                                                    <input type="text" class="form-control input-mask-year" data-mask="9999"
                                                        name="year" aria-describedby="helpId" value="{{ $year }}"
                                                        placeholder="{{ __('keyword.enter-year') }}"/>
                                                    @if ($errors->has('year'))
                                                    <small id="helpId" class="form-text text-danger">{{ $errors->first('year') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.student-name') }} </label>
                                                    <input type="text" class="form-control"
                                                        name="name" aria-describedby="helpId" value="{{ $name }}"
                                                        placeholder="{{ __('keyword.enter-name') }}"/>
                                                    @if ($errors->has('name'))
                                                    <small id="helpId" class="form-text text-danger">{{ $errors->first('name') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label for="" class="d-block text-light">`</label>
                                                <button type="submit" class="btn btn-primary mt-2"><i class="feather m-0 f-18 icon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.name') }}</th>
                                                    <th>{{ __('keyword.father-name') }}</th>
                                                    <th>{{ __('keyword.province') }}</th>
                                                    <th>{{ __('keyword.collage') }}</th>
                                                    <th>{{ __('keyword.department') }}</th>
                                                    <th>{{ __('keyword.date-of-graduation') }}</th>
                                                    <th>{{ __('keyword.identity-form') }}</th>
                                                    <th>{{ __('keyword.added-by') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($students->isNotEmpty())
                                                @foreach ($students as $key=>$student)
                                                <tr>
                                                    <td class="align-middle">{{ $key+1 }}</td>
                                                    <td class="align-middle"><a href="{{ route('students.show',$student->id) }}" class="text-dark">{{ $student->name }}</a></td>
                                                    <td class="align-middle">{{ $student->father_name }}</td>
                                                    <td class="align-middle">{{ $student->province?($locale==='en'?$student->province->name_en:($locale==='pa'?$student->province->name_pa:$student->province->name_dr)):'' }}</td>
                                                    <td class="align-middle">{{ $student->collage?($locale==='en'?$student->collage->name_en:($locale==='pa'?$student->collage->name_pa:$student->collage->name_dr)):'' }}</td>
                                                    <td class="align-middle">{{ $student->department?($locale==='en'?$student->department->name_en:($locale==='pa'?$student->department->name_pa:$student->department->name_dr)):'' }}</td>
                                                    <td class="align-middle">{{$student->graduation_year }}</td>
                                                    <td class="align-middle">
                                                        <a href="#" class="btn btn-outline-primary btn-show-modal-form" onclick="showImage('{{ asset($student->identityScan->scan_path) }}');" >
                                                            <i class="feather f-22 icon-eye"></i>
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $student->addedBy->name }}</td>
                                                    <td class="align-middle text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('students.show')
                                                                <a class="dropdown-item" href="{{ route("students.show",$student->id) }}">
                                                                        <i class="feather icon-eye"></i>
                                                                        {{ __('keyword.show-student-info') }}
                                                                </a>
                                                                @endcan
                                                                @can('students.edit')
                                                                <a class="dropdown-item" href="{{ route("students.edit",$student->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit-student-identity-info') }}
                                                                </a>
                                                                @endcan

                                                                {{-- @can('students.edit-student-result-sheet')
                                                                <a class="dropdown-item" href="{{ route("students.edit-student-result-sheet",$student->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit-student-result-sheet-info') }}
                                                                </a>
                                                                @endcan --}}

                                                                @can('students.destroy')
                                                                <form action="{{ route('students.destroy', $student->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="dropdown-item"
                                                                        onclick="deleteRecord(this);">
                                                                        <i class="feather icon-trash-2"></i>
                                                                        {{ __('keyword.delete-student-info') }}
                                                                    </button>
                                                                </form>
                                                                @endcan
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
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
