@extends('admin.layouts.layout')

@section('title',__('keyword.roles'))

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
                                <h5 class="mb-0 align-self-center pb-0 border-0">{{ __('keyword.roles') }}</h5>
                            </div>
                            <hr>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{ route('roles.index') }}">{{ __('keyword.roles') }}</a></li>
                                <li class="breadcrumb-item active"><a href="#!">{{ __('keyword.edit-role') }}</a></li>
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
                                        <h5 class="align-self-center">{{ __('keyword.edit-role') }}</h5>
                                        <a href="{{ route('roles.index') }}" class="btn btn-outline-primary">
                                            <i class="feather me-2 icon-file-text"></i>
                                            {{ __('keyword.roles-list') }}
                                        </a>
                                    </div>
                                    <span class="d-block m-t-5">
                                        {{ __('keyword.enter-all-required-information') }}</span>
                                    <hr>
                                </div>
                                <div class="card-block table-border-style pb-5">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <form method="POST" action="{{ route('roles.update',$role->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                <div class="mb-3">
                                                    <label for="name"
                                                        class="form-label">{{ __('keyword.name') }}</label>
                                                    <input value="{{ $role->name }}" type="text" class="form-control"
                                                        name="name" placeholder="{{ __('keyword.name') }}" required>
                                                </div>

                                                <label for="permissions"
                                                    class="form-label">{{ __('keyword.assign-permission') }}</label>

                                                <div class="table-responsive">
                                                    <table class="table" id="">
                                                        <thead>
                                                            <th scope="col" width="1%"><input type="checkbox"
                                                                    name="all_permission"
                                                                    style="width:20px; height: 20px;"></th>
                                                            <th scope="col" width="20%">{{ __('keyword.name') }}</th>
                                                            <th scope="col" width="1%">{{ __('keyword.guard') }}</th>
                                                        </thead>

                                                        @foreach($permissions as $permission)
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox"
                                                                name="permission[{{ $permission->name }}]"
                                                                style="width:20px; height: 20px;"
                                                                value="{{ $permission->name }}"
                                                                class='permission'
                                                                {{ in_array($permission->name, $rolePermissions)
                                                                    ? 'checked'
                                                                    : '' }}>
                                                            </td>
                                                            <td>{{ $permission->name }}</td>
                                                            <td>{{ $permission->guard_name }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="feather me-2 icon-save"></i>{{ __("keyword.save-changes") }}</button>
                                                    <a href="{{ route('roles.index') }}" class="btn btn-danger"> <i
                                                            class="feather me-2 icon-x"></i>{{ __("keyword.cancel") }}</a>
                                                </div>
                                            </form>
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function () {
        $('[name="all_permission"]').on('click', function () {

            if ($(this).is(':checked')) {
                $.each($('.permission'), function () {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('.permission'), function () {
                    $(this).prop('checked', false);
                });
            }

        });
    });

</script>
@endsection
