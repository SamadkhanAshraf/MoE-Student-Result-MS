@extends('admin.layouts.layout')

@section('title',__('keyword.districts'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.districts') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.districts') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-districts') }}</h5>
                                        <div>
                                            @can('districts.create')
                                            <a href="#" class="btn btn-outline-primary" data-pc-animate="blur"
                                                data-bs-toggle="modal" data-bs-target="#add-district-model">
                                                <i class="feather me-2 icon-plus"></i>
                                                {{ __('keyword.add-new-district') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-districts') }}</span>
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
                                                    <th>{{__('keyword.province') }}</th>
                                                    <th>{{ __('keyword.created-date') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($districts->isNotEmpty())
                                                @foreach ($districts as $key=>$district)
                                                    @if ($district->province)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $district->name_en }}</td>
                                                        <td>{{ $district->name_pa }}</td>
                                                        <td>{{ $district->name_dr }}</td>
                                                        <td>{{ $locale==='en'?$district->province->name_en:($locale==='pa'?$district->province->name_pa:$district->province->name_dr)}}</td>
                                                        <td>{{ date('m/d/Y',strtotime($district->created_at)) }}</td>
                                                        <td class="text-center">
                                                            <div class="dropdown">
                                                                <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="feather icon-more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    @can('districts.edit')
                                                                    <a class="dropdown-item" href="#"
                                                                        data-pc-animate="blur"
                                                                        data-bs-toggle="modal" data-bs-target="#edit-district-model-{{ $key+1 }}">
                                                                            <i class="feather icon-edit"></i>
                                                                            {{ __('keyword.edit') }}
                                                                    </a>
                                                                    @endcan

                                                                    @can('districts.destroy')
                                                                    <form action="{{ route('districts.destroy', $district->id) }}"
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
                                                    @endif
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>#</th>
                                                    <th>English</th>
                                                    <th>پښتو</th>
                                                    <th>دری</th>
                                                    <th>{{__('keyword.province') }}</th>
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
<div class="modal fade modal-animate" id="add-district-model" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.add-new-district') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="add-district-form" method="post" action="{{ route('districts.store') }}">
                    @method('POST')
                    @csrf
                    <div class="mb-3">
                        <x-admin.form-components.select-province/>
                    </div>
                    <div class="mb-3">
                        <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                        <input type="text"  class="form-control {{ $locale!=='en'?'text-end':'' }}" id="english-name" name="englishName" placeholder="Enter provine name">
                        @if ($errors->has('englishName'))
                            <small class="te">{{ $errors->first('englishName') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="pashto-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">پښتو</label>
                        <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="pashto-name" name='pashtoName' placeholder="د ولایت نوم ولیکئ">
                        @if ($errors->has('pashtoName'))
                            <small class="te">{{ $errors->first('pashtoName') }}</small>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">دری</label>
                        <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}" id="dari-name" name="dariName" placeholder="نام ولایت را وارد کنید">
                        @if ($errors->has('dariName'))
                            <small class="te">{{ $errors->first('dariName') }}</small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="dari-name"
                            class="form-label">{{ __('keyword.remark') }}</label>
                        <textarea type="text" class="form-control " rows="4" name="remark" placeholder="{{ __('keyword.enter-remark') }}"></textarea>
                        @if ($errors->has('remark'))
                            <small class="te">{{ $errors->first('remark') }}</small>
                        @endif
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
@forelse ($districts as $key2=> $district2)
<div class="modal fade modal-animate" id="edit-district-model-{{ $key2+1 }}" tabindex="-1" aria-labelledby="animateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">{{ __('keyword.edit-district') }}</h5>
                <button type=" button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form class="edit-district-form" method="post" action="{{ route('districts.update',$district2->id) }}">
                <div class="modal-body">
                        @method('patch')
                        @csrf
                        <div class="mb-3">
                            <label for="english-name" class="form-label">{{ __('keyword.Province') }}</label>
                            <select name="province" class="form-select form-control-sm select-2" id="province" placeholder="{{ __('keyword.search-province') }}">
                                <option value="">{{ __('keyword.select-province') }}</option>
                                @forelse (\App\Models\Province\Province::all() as $province2)
                                    <option value="{{ $province2->id }}" {{ $district2->province_id===$province2->id ? ' selected':''}}>
                                        {{ $locale==='en'?$province2->name_en:($locale==='pa'?$province2->name_pa:$province2->name_dr) }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            @if ($errors->has('province'))
                                <small class="text-danger">{{ $errors->first('province') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="english-name" class="form-label {{ $locale!=='en'?'float-end':'' }}">English</label>
                            <input type="text"  class="form-control {{ $locale!=='en'?'text-end':'' }}"  name="englishName" value="{{ $district2->name_en }}" placeholder="Enter provine name">
                            @if ($errors->has('englishName'))
                                <small class="text-danger">{{ $errors->first('englishName') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="pashto-name"
                                class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">پښتو</label>
                            <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}"name='pashtoName' value="{{ $district2->name_pa }}" placeholder="د ولایت نوم ولیکئ">
                            @if ($errors->has('pashtoName'))
                                <small class="text-danger">{{ $errors->first('pashtoName') }}</small>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="dari-name"
                                class="form-label fw-bold {{ $locale==='en'?'float-end':'float-start' }}">دری</label>
                            <input type="text" class="form-control {{ $locale==='en'?'text-end':'text-start' }}"  name="dariName" value="{{ $district2->name_dr }}" placeholder="نام ولایت را وارد کنید">
                            @if ($errors->has('dariName'))
                                <small class="text-danger">{{ $errors->first('dariName') }}</small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="dari-name"
                                class="form-label">{{ __('keyword.remark') }}</label>
                            <textarea type="text" class="form-control " rows="4" name="remark" placeholder="{{ __('keyword.enter-remark') }}">{{ $district2->remark }}</textarea>
                            @if ($errors->has('remark'))
                                <small class="text-danger">{{ $errors->first('remark') }}</small>
                            @endif
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
        let addDistrictForm = $('.add-district-form')
        let englishName = $('#english-name')
        let pashtoName = $('#pashto-name')
        let dariName = $('#dari-name')
        let province = $('.select-province')

        $('.submit-form').click(function () {

            if (province.val().trim() === '') {
                province.parent().addClass('border-danger')
                return false
            }
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
            addDistrictForm.submit()
        });


    });

</script>
@endsection
