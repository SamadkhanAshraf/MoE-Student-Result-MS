@extends('admin.layouts.layout')

@section('title',__('keyword.labels'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.localization') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.localization') }}</a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.labels') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-labels') }}</h5>
                                        @can('add-label')
                                        <a href="#" class="btn btn-outline-primary" data-pc-animate="blur"
                                            data-bs-toggle="modal" data-bs-target="#add-label-modal">
                                            <i class="feather me-2 icon-plus"></i>
                                            {{ __('keyword.add-new') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-label') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.key-name') }}</th>
                                                    <th>english</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($labels->isNotEmpty())
                                                @foreach ($labels as $key=>$label)
                                                <tr >
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $label->key_name }}</td>
                                                    <td>{{ $label->english }}</td>
                                                    <td>{{ $label->pashto }}</td>
                                                    <td>{{ $label->dari }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('edit-label')
                                                                <a href="#"  class="dropdown-item" data-pc-animate="blur"
                                                                    data-bs-toggle="modal" data-bs-target="#edit-label-modal"
                                                                    onclick="editLabel('{{ $label->id }}');">
                                                                    <i class="feather  icon-edit"></i>
                                                                    {{ __('keyword.edit') }}
                                                                </a>
                                                                @endcan

                                                                @can('delete-label')
                                                                <form action="{{ route('delete-label',$label->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="dropdown-item"  onclick="deleteRecord(this);">
                                                                        <i class="feather icon-trash-2"></i>
                                                                        {{ __('keyword.delete') }}
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
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.key-name') }}</th>
                                                    <th>english</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </tfoot>
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
<div class="modal fade modal-animate" id="add-label-modal" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.add-new-label') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="add-lable-form" method="post" action="{{ route('add-label') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="key-name"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">{{ __('keyword.key-name') }}</label>
                        <textarea class="form-control" id="key-name" name="keyName" placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.key-label-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <textarea class="form-control" id="english-name" name="englishName" placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.english-label-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <textarea class="form-control" id="pashto-name" name='pashtoName' placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <textarea class="form-control" id="dari-name" name="dariName" placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal"> <i class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                <button type="button" class="btn btn-outline-primary shadow-2 submit-form">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-animate" id="edit-label-modal" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.edit-label') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-lable-form" method="post" action="{{ route('update-label') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="key-name"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">{{ __('keyword.key-name') }}</label>
                        <textarea class="form-control" id="edit-key-name" name="keyName" placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.key-label-is-required') }}
                        </div>
                    </div>
                    <input type="hidden" name="id" id="eidt-id">
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <textarea class="form-control" id="edit-english-name" name="englishName"
                            placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.english-label-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <textarea class="form-control" id="edit-pashto-name" name='pashtoName'
                            placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <textarea class="form-control" id="edit-dari-name" name="dariName" placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary"
                    data-bs-dismiss="modal"> <i class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                <button type="button"
                    class="btn btn-outline-primary shadow-2 submit-edit-form"> <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        let addLableForm = $('.add-lable-form')
        let keyName = $('#key-name')
        let englishName = $('#english-name')

        $('.submit-form').click(function () {

            if (keyName.val().trim() === '') {
                keyName.addClass('is-invalid')
                return false
            }

            if (englishName.val().trim() === '') {
                englishName.addClass('is-invalid')
                return false
            }
            $(this).prop('disabled', true)
            addLableForm.submit()
        })

        editLabel = (id) => {
            $.get('/admin/localization/labels/edit-label/' + id, function (data) {
                $('#edit-key-name').val(data.key_name)
                $('#edit-english-name').val(data.english)
                $('#edit-pashto-name').val(data.pashto)
                $('#edit-dari-name').val(data.dari)
                $('#eidt-id').val(data.id)

            });
        }

        $('.submit-edit-form').click(function () {

            if ($('#edit-key-name').val().trim() === '') {
                $('#edit-key-name').addClass('is-invalid')
                return false
            }

            if ($('#edit-english-name').val().trim() === '') {
                $('#edit-english-name').addClass('is-invalid')
                return false
            }
            $(this).prop('disabled', true)
            $('.edit-lable-form').submit()
        })
    });

</script>
@endsection
