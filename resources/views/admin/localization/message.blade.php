@extends('admin.layouts.layout')

@section('title',__('keyword.messages'))

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
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.messages') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-messages') }}</h5>
                                        @can('add-message')
                                        <a href="#" class="btn btn-outline-primary" data-pc-animate="blur"
                                            data-bs-toggle="modal" data-bs-target="#add-message-modal">
                                            <i class="feather me-2 icon-plus"></i>
                                            {{ __('keyword.add-new') }}
                                        </a>
                                        @endcan
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-message') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.key-message') }}</th>
                                                    <th>english</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($messages->isNotEmpty())
                                                @foreach ($messages as $key=>$message)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $message->key_name }}</td>
                                                    <td>{{ $message->english }}</td>
                                                    <td>{{ $message->pashto }}</td>
                                                    <td>{{ $message->dari }}</td>
                                                    <td class="text-center">
                                                        @can('edit-message')
                                                        <a href="#" class="btn btn-lg p-1" data-pc-animate="blur"
                                                            data-bs-toggle="modal" data-bs-target="#edit-message-modal"
                                                            onclick="editLabel('{{ $message->id }}');">
                                                            <i class="feather text-primary icon-edit"></i>
                                                        </a>
                                                        @endcan
                                                        @can('delete-message')
                                                        <form action="{{ route('delete-message',$message->id) }}"
                                                            method="post" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="button" class="btn  btn-lg p-1"
                                                                onclick="deleteRecord(this);">
                                                                <i class="feather text-danger icon-trash-2"></i>
                                                            </button>
                                                        </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('keyword.key-message') }}</th>
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
<div class="modal fade modal-animate" id="add-message-modal" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.add-new-message') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="add-message-form" method="post" action="{{ route('add-message') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="key-message"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">{{ __('keyword.key-message') }}</label>
                        <textarea class="form-control" id="key-message" name="keyMessage" placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.key-message-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="english-message"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <textarea class="form-control" id="english-message" name="englishMessage"
                            placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.english-message-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pashto-message"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <textarea class="form-control" id="pashto-message" name='pashtoMessage'
                            placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="dari-message"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <textarea class="form-control" id="dari-message" name="dariMessage" placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"> <i
                        class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                <button type="button" class="btn btn-outline-primary shadow-2 submit-form"> <i
                        class="feather me-2 icon-save"></i>{{ __('keyword.save') }}</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-animate" id="edit-message-modal" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.edit-message') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-message-form" method="post" action="{{ route('update-message') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="key-message"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">{{ __('keyword.key-message') }}</label>
                        <textarea class="form-control" id="edit-key-message" name="keyMessage"
                            placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.key-message-is-required') }}
                        </div>
                    </div>
                    <input type="hidden" name="id" id="eidt-id">
                    <div class="mb-3">
                        <label for="english-message"
                            class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <textarea class="form-control" id="edit-english-message" name="englishMessage"
                            placeholder=""></textarea>
                        <div class="invalid-feedback">
                            {{ __('msg.enlgish-message-is-required') }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="pashto-message"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <textarea class="form-control" id="edit-pashto-message" name='pashtoMessage'
                            placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="dari-message"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <textarea class="form-control" id="edit-dari-message" name="dariMessage"
                            placeholder=""></textarea>
                        {{-- <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div> --}}
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="feather me-2 icon-x"></i>
                    {{ __('keyword.close') }}</button>
                <button type="button" class="btn btn-outline-primary shadow-2 submit-edit-form">
                    <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        let addMessageForm = $('.add-message-form')
        let keyMessage = $('#key-message')
        let englishMessage = $('#english-message')

        $('.submit-form').click(function () {

            if (keyMessage.val().trim() === '') {
                keyMessage.addClass('is-invalid')
                return false
            }

            if (englishMessage.val().trim() === '') {
                englishMessage.addClass('is-invalid')
                return false
            }
            $(this).prop('disabled', true)
            addMessageForm.submit()
        })

        editLabel = (id) => {
            $.get('/admin/localization/messages/edit-message/' + id, function (data) {
                $('#edit-key-message').val(data.key_name)
                $('#edit-english-message').val(data.english)
                $('#edit-pashto-message').val(data.pashot)
                $('#edit-dari-message').val(data.dari)
                $('#eidt-id').val(data.id)

            });
        }

        $('.submit-edit-form').click(function () {

            if ($('#edit-key-message').val().trim() === '') {
                $('#edit-key-message').addClass('is-invalid')
                return false
            }

            if ($('#edit-english-message').val().trim() === '') {
                $('#edit-english-message').addClass('is-invalid')
                return false
            }
            $(this).prop('disabled', true)
            $('.edit-message-form').submit()
        })
    });

</script>
@endsection
