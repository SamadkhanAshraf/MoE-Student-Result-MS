@extends('admin.layouts.layout')

@section('title',__('keyword.collages'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.collages') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ __('keyword.collages') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.all-collages') }}</h5>
                                        <div>
                                            @can('collages.create')
                                            <a href="{{ route('collages.create') }}" class="btn btn-outline-primary">
                                                <i class="feather me-2 icon-plus"></i>
                                                {{ __('keyword.add-new-collage') }}
                                            </a>
                                            @endcan
                                            @can('collages.archive')
                                            <a href="{{ route('collages.archive') }}" class="btn btn-outline-danger" >
                                                <i class="feather me-1 icon-box"></i>
                                                {{ __('keyword.show-archive') }}
                                            </a>
                                            @endcan
                                        </div>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.here-you-can-add-edit-or-delete-collages') }}</span>
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
                                                    <th>{{ __('keyword.province') }}</th>
                                                    <th>{{ __('keyword.departments') }}</th>
                                                    <th>{{ __('keyword.created-date') }}</th>
                                                    <th>{{ __('keyword.added-by') }}</th>
                                                    <th class="text-center">{{ __('keyword.action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($collages->isNotEmpty())
                                                @foreach ($collages as $key=>$collage)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $collage->name_en }}</td>
                                                    <td>{{ $collage->name_pa }}</td>
                                                    <td>{{ $collage->name_dr }}</td>
                                                    <td>{{ $collage->province?($locale==='en'?$collage->province->name_en:($locale==='pa'?$collage->province->name_pa:$collage->province->name_dr)):'' }}</td>
                                                    <td>
                                                        @forelse ($collage->departments as $dep)
                                                            <span class="badge bg-primary f-12">
                                                                {{$locale==='en'?$dep->name_en:($locale==='pa'?$dep->name_pa:$dep->name_dr)}}
                                                            </span>
                                                        @empty
                                                        @endforelse
                                                    </td>
                                                    <td>{{ date('m/d/Y',strtotime($collage->created_at)) }}</td>
                                                    <td>{{ $collage->addedBy->name }}</td>
                                                    <td class="text-center">
                                                        <div class="dropdown">
                                                            <a class="drp-icon dropdown-toggle btn btn-outline-secondary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="feather icon-more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                @can('collages.show')
                                                                <a class="dropdown-item" href="{{ route("collages.show",$collage->id) }}">
                                                                        <i class="feather icon-eye"></i>
                                                                        {{ __('keyword.show') }}
                                                                </a>
                                                                @endcan
                                                                @can('collages.edit')
                                                                <a class="dropdown-item" href="{{ route("collages.edit",$collage->id) }}">
                                                                        <i class="feather icon-edit"></i>
                                                                        {{ __('keyword.edit') }}
                                                                </a>
                                                                @endcan

                                                                @can('collages.destroy')
                                                                <form action="{{ route('collages.destroy', $collage->id) }}"
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
@endsection
