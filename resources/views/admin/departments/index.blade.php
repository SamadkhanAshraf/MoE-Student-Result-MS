@extends('admin.layouts.layout')

@section('title',__('keyword.departments'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.departments') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.departments') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-departments') }}</h5>
                                        @can('add-label')
                                        <a href="#" class="btn btn-outline-primary" data-pc-animate="blur"
                                            data-bs-toggle="modal" data-bs-target="#add-department-modal">
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
                                                    <th>english</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th>{{ __('keyword.remarks') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($departments->isNotEmpty())
                                                @foreach ($departments as $key=>$department)
                                                <tr >
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $department->name_en }}</td>
                                                    <td>{{ $department->name_dr }}</td>
                                                    <td>{{ $department->name_pa }}</td>
                                                    <td>{{ $department->remark }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('departments.edit')
                                                                <a href="#"  class="dropdown-item" data-pc-animate="blur"
                                                                    data-bs-toggle="modal" data-bs-target="#edit-department-modal-{{ $key+1 }}"
                                                                    onclick="editLabel('{{ $department->id }}');">
                                                                    <i class="feather  icon-edit"></i>
                                                                    {{ __('keyword.edit') }}
                                                                </a>
                                                                @endcan

                                                                @can('departments.destroy')
                                                                <form action="{{ route('departments.destroy',$department->id) }}"
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
<div class="modal fade modal-animate" id="add-department-modal" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.add-new-department') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="add-lable-form" method="post" action="{{ route('departments.store') }}">
                <div class="modal-body">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <input type="text" class="form-control {{ $errors->has('englishName')?'is-invalid':'' }}"
                            value="{{ old('englishName') }}" id="english-name" name="englishName"
                            placeholder="Enter English Name" required>
                        @if ($errors->has('englishName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('englishName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <input type="text" class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}"
                            value="{{ old('pashtoName') }}" id="pashto-name" name='pashtoName'
                            placeholder="پښتو نوم ولیکئ" required>
                        @if ($errors->has('pashtoName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('pashtoName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <input type="text" class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}"
                            value="{{ old('dariName') }}" id="dari-name" name="dariName" placeholder="نام را به دری درج کنید" required>
                        @if ($errors->has('dariName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dariName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">{{ __('keyword.remarks') }}</label>
                        <textarea class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}" id="remarks" name="remarks" placeholder="{{ __("keyword.remarks") }}">{{ old('remarks') }}</textarea>
                        @if ($errors->has('remarks'))
                            <div class="invalid-feedback">
                                {{ $errors->first('remarks') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-outline-secondary float-start"
                        data-bs-dismiss="modal"> <i class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                    <button type="submit" class="btn btn-outline-primary shadow-2 submit-form mx-1">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@forelse ($departments as $key2=> $dep)
<div class="modal fade modal-animate" id="edit-department-modal-{{ $key2+1 }}" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.edit-department') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="add-lable-form" method="post" action="{{ route('departments.update',$dep->id) }}">
                <div class="modal-body">
                    @method('patch')
                    @csrf
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <input type="text" class="form-control {{ $errors->has('englishName')?'is-invalid':'' }}"
                            value="{{ $dep->name_en }}" id="english-name" name="englishName"
                            placeholder="Enter English Name" required>
                        @if ($errors->has('englishName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('englishName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">پښتو</label>
                        <input type="text" class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}"
                            value="{{ $dep->name_pa }}" id="pashto-name" name='pashtoName'
                            placeholder="پښتو نوم ولیکئ" required>
                        @if ($errors->has('pashtoName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('pashtoName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">دری</label>
                        <input type="text" class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}"
                            value="{{ $dep->name_dr }}" id="dari-name" name="dariName" placeholder="نام را به دری درج کنید" required>
                        @if ($errors->has('dariName'))
                            <div class="invalid-feedback">
                                {{ $errors->first('dariName') }}
                            </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'' }}">{{ __('keyword.remarks') }}</label>
                        <textarea class="form-control {{ $errors->has('pashtoName')?'is-invalid':'' }}" id="remarks" name="remarks" placeholder="{{ __("keyword.remarks") }}">{{ $dep->remark }}</textarea>
                        @if ($errors->has('remarks'))
                            <div class="invalid-feedback">
                                {{ $errors->first('remarks') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-outline-secondary float-start"
                        data-bs-dismiss="modal"> <i class="feather me-2 icon-x"></i>{{ __('keyword.close') }}</button>
                    <button type="submit" class="btn btn-outline-primary shadow-2 submit-form mx-1">  <i class="feather me-2 icon-save"></i>{{ __('keyword.save-changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse
@endsection
