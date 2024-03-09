@extends('admin.layouts.layout')

@section('title',__('keyword.students'))

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <form action="{{ route("students.store") }}" method="post" enctype="multipart/form-data"
                id="student-identity-form">
                @method('post')
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
                                            <h5 class="align-self-center">{{ __('keyword.add-student-identity') }}</h5>
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
                                                    <img src="{{ asset('uploads/thumbnile.png') }}"
                                                        class=" w-100 d-flex show-student-info-scan-file p-2">
                                                </div>
                                                <div>
                                                    <button type="button"
                                                        class="btn btn-secondary mx-auto btn-lg btn-load-image my-3 "
                                                        onclick="document.querySelector('#student-info-scan-file').click()">
                                                        <i class="feather icon-image mx-1"></i>
                                                        {{ __('keyword.select-students-identity-file') }}
                                                    </button>
                                                    <input type="file" accept="image/png,image/svg,image/jpg,image/jpeg"
                                                        class="d-none" id="student-info-scan-file"
                                                        name="studentIdintityForm"
                                                        onchange=" displayImage(this,'show-student-info-scan-file');">
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mt-1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5 class="f-w-600 f-16 mb-2">{{ __('keyword.about-identity') }}</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <x-admin.form-components.select-province />
                                            </div>
                                            <div class="col-md-3">
                                                <x-admin.form-components.select-collage />
                                            </div>

                                            <div class="col-md-3">
                                                <x-admin.form-components.select-collage-department />
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.year') }} <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control input-mask-year"
                                                        data-mask="9999" name="year" aria-describedby="helpId"
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
                                                        class="form-label">{{ __('keyword.student-identity-status') }}<span
                                                            class="text-danger"> *</span></label>
                                                    <select class="form-select" name="status">
                                                        <option value="" selected>{{ __('keyword.select-status') }}
                                                        </option>
                                                        <option value="1">{{ __("keyword.approved") }}</option>
                                                        <option value="2">{{ __('keyword.unapproved') }}</option>
                                                    </select>
                                                    @if ($errors->has('status'))
                                                    <small id="helpId"
                                                        class="form-text text-danger">{{ $errors->first('status') }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">{{ __('keyword.remarks') }}</label>
                                                    <textarea class="form-control" name="remarks" id="" rows="2"
                                                        placeholder="{{ __('keyword.enter-remark') }}">{{ old('remarks') }}</textarea>
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
                                            <h5 class="align-self-center">{{ __('keyword.student-information') }}</h5>
                                        </div>
                                        <span class="d-block m-t-5">
                                            {{ __('keyword.enter-all-required-information') }} & (<span
                                                class="text-danger">*</span>) {{ __("keyword.required") }}</span>
                                        <hr>
                                    </div>
                                    <div class="card-block table-border-style pb-5 ">
                                        <div class="student-info">
                                            <div class="row">
                                                <div class="mb-2 col-md-4">
                                                    <label for="" class="form-label">{{ __('keyword.name') }} <span
                                                            class="text-danger"> *</span></label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('name')?'is-invalid':'' }}"
                                                        name="name[]" id="name" aria-describedby="nameHelpId"
                                                        placeholder="{{ __('keyword.enter-name') }}">
                                                    @if ( $errors->has('name'))
                                                    <small id="nameHelpId"
                                                        class="form-text text-danger">{{ $errors->first('name') }}</small>
                                                    @endif
                                                </div>
                                                <div class="mb-2 col-md-4">
                                                    <label for="" class="form-label">{{ __('keyword.father-name') }}
                                                        <span class="text-danger"> *</span></label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('fatherName')?'is-invalid':'' }}"
                                                        name="fatherName[]" id="father-name"
                                                        aria-describedby="father-nameHelpId"
                                                        placeholder="{{ __('keyword.enter-father-name') }}">
                                                    @if ( $errors->has('fatherName'))
                                                    <small id="fatherNameHelpId"
                                                        class="form-text text-danger">{{ $errors->first('fatherName') }}</small>
                                                    @endif
                                                </div>
                                                <div class="mb-2 col-md-3">
                                                    <label for="" class="form-label">{{ __('keyword.entry-date') }}
                                                        <span class="text-danger"> *</span></label>
                                                    <input type="text"
                                                        class="form-control input-mask-year {{ $errors->has('entryDate')?'is-invalid':'' }}"
                                                        data-mask="9999" name="entryDate[]" id="entry-date"
                                                        aria-describedby="entry-dateHelpId"
                                                        placeholder="{{ __('keyword.enter-entry-date') }}">
                                                    @if ( $errors->has('entryDate'))
                                                    <small id="entry-dateHelpId"
                                                        class="form-text text-danger">{{ $errors->first('entryDate') }}</small>
                                                    @endif
                                                </div>
                                                <div class="mb-2 col-md-1 ">
                                                    <label for="" class="d-block mb-2 text-light">`</label>
                                                    <a href="#" class="btn btn-primary my-auto btn-add-row"
                                                        id="btn-add-row"><i class="feather f-18 mx-0 icon-plus"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                            <x-admin.form-components.image-loader />
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="row my-2">
                                            <div class="col-md-10">
                                                <button type="submit"
                                                    class="btn btn-outline-primary shadow-2 submit-form px-5"> <i
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
    $('.btn-add-row').click(function (e) {
        e.preventDefault();

        $('.student-info').append(`
            <div class="row mt-3">
                <div class="mb-2 col-md-4">
                    <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'' }}" name="name[]" aria-describedby="nameHelpId" placeholder="{{ __('keyword.enter-name') }}">
                    @if ( $errors->has('name'))
                        <small id="nameHelpId" class="form-text text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="mb-2 col-md-4">
                    <input type="text" class="form-control {{ $errors->has('fatherName')?'is-invalid':'' }}" name="fatherName[]" aria-describedby="father-nameHelpId" placeholder="{{ __('keyword.enter-father-name') }}">
                    @if ( $errors->has('fatherName'))
                    <small id="fatherNameHelpId"
                        class="form-text text-danger">{{ $errors->first('fatherName') }}</small>
                    @endif
                </div>
                <div class="mb-2 col-md-3">
                    <input type="text" class="form-control input-mask-year {{ $errors->has('entryDate')?'is-invalid':'' }}" data-mask="9999" name="entryDate[]"
                    aria-describedby="entry-dateHelpId" placeholder="{{ __('keyword.enter-entry-date') }}" id="entry-date">
                        @if ( $errors->has('entryDate'))
                            <small id="entry-dateHelpId" class="form-text text-danger">{{ $errors->first('entryDate') }}</small>
                        @endif
                </div>


                <div class="mb-2 col-md-1 ">
                        <a href="#" class="btn btn-danger btn-remove-row"><i class="feather f-18 mx-0 icon-x"></i></a>
                </div>
            </div>
        `);

        let inputMaskYear = document.querySelectorAll('.input-mask-year')
        if (inputMaskYear) {
            for (let i = 0; i < inputMaskYear.length; i++) {
                var regExpMask = IMask(inputMaskYear[i], {
                    mask: '0000'
                }) ?? '';
            }
        }
    });

    $(document).on('click', '.btn-remove-row', function (e) {
        e.preventDefault();
        if (confirm("{{ __('keyword.are-you-sure') }}")) {
            $(this).parent().parent().remove();
        }
    });

    $('#student-identity-form').on('submit', function (e) {
        $('#student-identity-form button').prop('disabled', true);
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
        $('#student-identity-form button').prop('disabled', false);

    })

</script>

@endsection
