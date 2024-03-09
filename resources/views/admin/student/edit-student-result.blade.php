@extends('admin.layouts.layout')

@section('title',__('keyword.students'))

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <form action="{{ route("students.update-student-result-sheet",$resultSheet->id) }}" method="post"
             enctype="multipart/form-data" id="student-result-sheet">
                @method('patch')
                @csrf
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ basic-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between ">
                                            <h5 class="align-self-center">{{ __('keyword.edit-student-result-sheet') }}</h5>
                                            <a href="{{ route('students.index') }}" class="btn btn-outline-primary">
                                                <i class="feather me-2 icon-file-text"></i>
                                                {{ __('keyword.students-list') }}
                                            </a>
                                        </div>
                                        <span class="d-block m-t-5">
                                            {{ __('keyword.enter-all-required-information') }} & (<span
                                                class="text-danger">*</span>) {{ __("keyword.required") }}</span>
                                        <hr>
                                    </div>
                                    <div class="card-block table-border-style pb-5">
                                        <div class="row ">
                                            <div class="col-md-12 text-center ">
                                                <div style="overflow: auto; height: 400px;" class="border rounded">
                                                    <img src="{{ asset($resultSheet->scan_path) }}"
                                                        class=" w-100 d-flex show-student-result-scan-file p-2">
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-secondary mx-auto btn-lg btn-load-image my-3 "
                                                        onclick="document.querySelector('#student-info-scan-file').click()">
                                                        <i class="feather icon-image mx-1"></i>
                                                        {{ __('keyword.select-students-result-sheet') }}
                                                    </button>
                                                    <input type="file" accept="image/png,image/svg,image/jpg,image/jpeg"
                                                        class="d-none" id="student-info-scan-file"
                                                        name="studentResultForm"
                                                        onchange=" displayImage(this,'show-student-result-scan-file');">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="f-w-600 f-16 mb-2">{{ __('keyword.about-identity') }}</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <x-admin.form-components.select-province :provinceId='$resultSheet->province_id' />
                                            </div>
                                            <div class="col-md-3">
                                                <x-admin.form-components.select-collage :collageId="$resultSheet->collage_id" />
                                            </div>

                                            <div class="col-md-3">
                                                <x-admin.form-components.select-collage-department  :departmentId='$resultSheet->department_id'/>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.year') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control input-mask-year"
                                                        data-mask="9999" name="year" aria-describedby="helpId" value="{{ $resultSheet->year }}"
                                                        placeholder="{{ __('keyword.enter-year') }}" />
                                                    @if ($errors->has('year'))
                                                    <small id="helpId"
                                                        class="form-text text-danger">{{ $errors->first('year') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for=""
                                                        class="form-label">{{ __('keyword.semester') }}<span
                                                            class="text-danger"> *</span></label>
                                                            <input type="hidden" name="oldSemester" value="{{ $semester }}">
                                                    <select class="form-select" name="semester">
                                                        <option value="" selected >{{ __('keyword.select-semester') }}</option>
                                                        <option value="1" {{ $semester==='1'?'selected':'' }}>{{ __("keyword.first semester") }}</option>
                                                        <option value="2" {{ $semester==='2'?'selected':'' }}>{{ __('keyword.second semester') }}</option>
                                                        <option value="3" {{ $semester==='3'?'selected':'' }}>{{ __('keyword.third semester') }}</option>
                                                        <option value="4" {{ $semester==='4'?'selected':'' }}>{{ __('keyword.forth semester') }}</option>
                                                    </select>
                                                    @if ($errors->has('semester'))
                                                    <small id="helpId"
                                                        class="form-text text-danger">{{ $errors->first('semester') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3 mb-2">
                                                <span>{{ __('keyword.enter-student-graduation-year-to-load-students-and-then-select-result-sheet-related-students') }}.</span>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.graduation-date') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control input-mask-year graduation-year"
                                                        data-mask="9999" name="gradudationYear"
                                                        placeholder="{{ __('keyword.enter-graduation-date') }}" value="{{ $resultSheet->students[0]->graduation_year }}"/>
                                                    @if ($errors->has('gradudationYear'))
                                                        <small class="form-text text-danger">{{ $errors->first('gradudationYear') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-10 mb-3">
                                                <x-admin.form-components.select-student :students='$resultSheet->students'/>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.remarks') }}</label>
                                                    <textarea class="form-control" name="remarks" id="" rows="2"
                                                        placeholder="{{ __('keyword.enter-remark') }}">{{ $resultSheet->remark }}</textarea>
                                                    @if ($errors->has('remarks'))
                                                    <small id="helpId"
                                                        class="form-text text-danger">{{ $errors->first('remarks') }}</small>
                                                    @endif
                                                </div>
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
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ basic-table ] start -->
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <div class="d-flex justify-content-between ">
                                            <h5 class="align-self-center">{{ __('keyword.identity-appendices') }}</h5>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="card-block table-border-style pb-2 ">
                                        <div class="row">

                                            <x-admin.form-components.image-loader :appendixes='$resultSheet->appendixes'/>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row my-2">
                                            <div class="col-md-10">
                                                <button type="submit"
                                                    class="btn btn-outline-primary shadow-2  px-5"> <i
                                                        class="feather me-2 icon-save"></i>{{ __('keyword.save') }}</button>
                                                <a href="{{ route('schools.index') }}"
                                                    class="btn btn-outline-secondary px-5"> <i
                                                        class="feather me-2 icon-x"></i>{{ __('keyword.cancel') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@section('image-loader')
@show
<script>

    $('#student-result1-sheet').on('submit', function (e) {
        $('#student-result-sheet button').prop('disabled', true);
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            contentType: false,
            processData: false,
            dataType: "json",
            data: new FormData($(this)[0]),
            success: function (data) {
                if (data.status === 401) {
                    let errors = '';
                    $.each(data.msg, function (index, msg) {
                        errors += `${msg}<br>`
                    });
                    msgError(errors)
                }
                if (data.status === 200) {
                    msgSuccess(data.msg)
                    setInterval(() => {
                        window.location = `{{ route('students.index') }}`
                    }, 2000);
                }

                if (data.status === 403) {
                    msgSuccess(data.msg)
                }
            },
        });
        $('#student-result-sheet button').prop('disabled', false);

    })

</script>

@endsection
