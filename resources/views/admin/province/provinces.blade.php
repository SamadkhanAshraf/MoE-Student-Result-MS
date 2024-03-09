@extends('admin.layouts.layout')

@section('title',__('keyword.provinces'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.provinces') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.provinces') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-provinces') }}</h5>
                                        <div>
                                            @can('provinces.create')
                                            <a href="#" class="btn btn-outline-primary" data-pc-animate="blur"
                                                data-bs-toggle="modal" data-bs-target="#add-province-model">
                                                <i class="feather me-2 icon-plus"></i>
                                                {{ __('keyword.add-new-province') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-provinces') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>English</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th>{{ __('keyword.created-date') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($provinces->isNotEmpty())
                                                @foreach ($provinces as $key=>$province)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $province->name_en }}</td>
                                                    <td>{{ $province->name_pa }}</td>
                                                    <td>{{ $province->name_dr }}</td>
                                                    <td>{{ date('m/d/Y',strtotime($province->created_at)) }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('provinces.edit')
                                                                <a class="dropdown-item" href="#"
                                                                    data-pc-animate="blur"
                                                                    data-bs-toggle="modal" data-bs-target="#edit-province-modal-{{ $key+1 }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit') }}
                                                                </a>
                                                                @endcan

                                                                @can('provinces.destroy')
                                                                <form action="{{ route('provinces.destroy', $province->id) }}"
                                                                    method="post" class="d-inline">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="button" class="dropdown-item"
                                                                        onclick="deleteRecord(this);">
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
                                                    <th>English</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th>{{ __('keyword.created-date') }}</th>
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
<div class="modal fade modal-animate" id="add-province-model" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.add-new-province') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="add-province-form" method="post" action="{{ route('provinces.store') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'float-start' }}">English</label>
                        <input type="text"  class="form-control {{ $locale!=='en'?'text-end':'text-start' }}" id="english-name" name="englishName" placeholder="Enter provine name">
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">پښتو</label>
                        <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="pashto-name" name='pashtoName' placeholder="د ولایت نوم ولیکئ">
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">دری</label>
                        <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="dari-name" name="dariName" placeholder="نام ولایت را وارد کنید">
                    </div>

                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label ">{{ __('keyword.remark') }}</label>
                        <textarea type="text" class="form-control " rows="4" name="remark" placeholder="{{ __('keyword.enter-remark') }}"></textarea>
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
@forelse ($provinces as $key2=> $prov)
<div class="modal fade modal-animate" id="edit-province-modal-{{ $key2+1 }}" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.edit-province') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="edit-lable-form" method="post" action="{{ route('provinces.update',$prov->id) }}">
                <div class="modal-body">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                            <input type="text"  class="form-control" id="english-name" name="englishName" value="{{ $prov->name_en }}" placeholder="Enter provine name" required>
                        </div>
                        <div class="mb-3">
                            <label for="pashto-name"
                                class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">پښتو</label>
                            <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="pashto-name" name='pashtoName' value="{{ $prov->name_pa }}" placeholder="د ولایت نوم ولیکئ" required>
                        </div>
                        <div class="mb-3">
                            <label for="dari-name"
                                class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">دری</label>
                            <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="dari-name" name="dariName" value="{{ $prov->name_dr }}" placeholder="نام ولایت را وارد کنید" required>
                        </div>
                        <div class="mb-3">
                            <label for="dari-name"
                                class="form-label">{{ __('keyword.remark') }}</label>
                            <textarea type="text" class="form-control " rows="4" name="remark" placeholder="{{ __('keyword.enter-remark') }}">{{ $prov->remark }}</textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal"> <i class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                    <button type="submit"
                        class="btn btn-outline-primary shadow-2"> <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@endsection

@section('script')
<script>
    $(document).ready(function () {
        let addProvinceForm = $('.add-province-form')
        let englishName = $('#english-name')
        let pashtoName = $('#pashto-name')
        let dariName = $('#dari-name')

        $('.submit-form').click(function () {

            if (englishName.val().trim() === '') {
                englishName.addClass('is-invalid')
                return false
            }

            if (pashtoName.val().trim() === '') {
                pashtoName.addClass('is-invalid')
                return false
            }

            if (dariName.val().trim() === '') {
                dariName.addClass('is-invalid')
                return false
            }

            $(this).prop('disabled', true)
            addProvinceForm.submit()
        })
    });

</script>
@endsection
