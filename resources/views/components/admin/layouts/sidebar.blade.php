<nav class="pcoded-navbar menupos-fixed menu-light d-print-none ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div ">
            <ul class="nav pcoded-inner-navbar ">
                {{-- <li class="nav-item pcoded-menu-caption">
                    <label>Navigation</label>
                </li> --}}
                <li class="nav-item ">
                    <a href="{{ route("dashboard") }}" class="nav-link bg-primary text-light"><span class="pcoded-micon"><i
                        class="feather icon-home"></i></span>
                        <span class="pcoded-mtext">
                            {{ __("keyword.dashboard") }} -
                            {{ \Auth::user()->type===1?__('keyword.governmental'):(\Auth::user()->type===2?__('keyword.private'):'--') }}
                            <span class="f-10">
                                ({{  \Auth::user()->service===1?__('keyword.in-service'):(\Auth::user()->service===2?__('keyword.free-service'):'--') }})
                            </span>
                        </span>
                    </a>
                </li>


                @canany(['students.index'])
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-users"></i></span><span
                            class="pcoded-mtext">{{ __("keyword.students") }}</span></a>
                    <ul class="pcoded-submenu pt-0">
                        @can('students.create')
                            <li><a href="{{ route("students.create") }}">{{ __('keyword.add-students') }}</a></li>
                        @endcan
                        @can('students.create-student-result-sheet')
                            <li><a href="{{ route("students.create-student-result-sheet") }}">{{ __('keyword.add-students-result-sheet') }}</a></li>
                        @endcan
                        @can('students.index')
                            <li><a href="{{ route('students.index') }}">{{ __('keyword.students-list') }}</a></li>
                        @endcan

                    </ul>
                </li>
                @endcanany

                <li class="nav-item pcoded-menu-caption">
                    <label>{{ __('keyword.configuration') }}</label>
                </li>
                @canany(['provinces.index','districts.index'])
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-package"></i></span><span
                            class="pcoded-mtext">{{ __("keyword.provinces") }}</span></a>
                    <ul class="pcoded-submenu pt-0">
                        @can('provinces.index')
                            <li><a href="{{ route('provinces.index') }}">{{ __('keyword.provinces-list') }}</a></li>
                        @endcan
                        @can('districts.index')
                        <li><a href="{{ route("districts.index") }}">{{ __('keyword.districts-list') }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany
                {{-- @can('schools.index')
                <li class="nav-item">
                    <a href="{{ route('schools.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-sidebar"></i>
                        </span>
                        <span class="pcoded-mtext">{{ __("keyword.schools-list") }}</span>
                    </a>
                </li>
                @endcan --}}

                @can('collages.index')
                <li class="nav-item">
                    <a href="{{ route('collages.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-sidebar"></i>
                        </span>
                        <span class="pcoded-mtext">{{ __("keyword.collages-list") }}</span>
                    </a>
                </li>
                @endcan

                @can('departments.index')
                <li class="nav-item">
                    <a href="{{ route('departments.index') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-server"></i>
                        </span>
                        <span class="pcoded-mtext">{{ __("keyword.departments") }}</span>
                    </a>
                </li>
                @endcan

                @can('all-backups')
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-layers"></i></span><span
                            class="pcoded-mtext">{{ __("keyword.backup") }}</span></a>
                    <ul class="pcoded-submenu pt-0">
                        @can('create-backup')
                        <li><a href="{{ route('create-backup') }}">{{ __('keyword.create-new-backup') }}</a></li>
                        @endcan
                        @can('all-backups')
                        <li><a href="{{ route("all-backups") }}">{{ __('keyword.backups-list') }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @canany(['setting.show'])
                <li class="nav-item">
                    <a href="{{ route('setting.show') }}" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-settings"></i>
                        </span>
                        <span class="pcoded-mtext">{{ __('keyword.general-setting') }}</span>
                    </a>
                </li>
                @endcanany

                @canany(['labels', 'messages'])
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-globe"></i></span><span
                            class="pcoded-mtext">{{ __("keyword.localization") }}</span></a>
                    <ul class="pcoded-submenu pt-0">
                        @can('labels')
                        <li><a href="{{ route('labels') }}"> {{ __("keyword.labels") }}</a></li>
                        @endcan
                        @can('messages')
                        <li><a href="{{ route('messages') }}">{{ __("keyword.messages") }}</a></li>
                        @endcan
                    </ul>
                </li>
                @endcanany

                @canany(['users.index','roles.index','permissions.index'])
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i
                                class="feather icon-user"></i></span><span class="pcoded-mtext">{{__('keyword.user-management')}}</span></a>
                    <ul class="pcoded-submenu pt-0">
                        @can('users.index')
                        <li class="pcoded-hasmenu">
                            <a href="#">{{ __("keyword.users") }}</a>
                            <ul class="pcoded-submenu pt-0">
                                @can('users.create')
                                <li><a href="{{ route('users.create') }}"> {{ __("keyword.add-new-user") }}</a></li>
                                @endcan
                                @can('users.index')
                                <li><a href="{{ route('users.index') }}">{{ __("keyword.users-list") }}</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan

                        @can('roles.index')
                        <li class="pcoded-hasmenu">
                            <a href="#">{{ __("keyword.roles") }}</a>
                            <ul class="pcoded-submenu pt-0">
                                @can('roles.create')
                                <li><a href="{{ route('roles.create') }}"> {{ __("keyword.add-new-role") }}</a></li>
                                @endcan
                                @can('roles.index')
                                <li><a href="{{ route('roles.index') }}">{{ __("keyword.roles-list") }}</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan

                        @can('permissions.index')
                        <li class="pcoded-hasmenu">
                            <a href="#">{{ __("keyword.permissions") }}</a>
                            <ul class="pcoded-submenu pt-0">
                                @can('permissions.create')
                                <li><a href="{{ route('permissions.create') }}"> {{ __("keyword.add-new-permissions") }}</a></li>
                                @endcan
                                @can('permissions.index')
                                <li><a href="{{ route('permissions.index') }}">{{ __("keyword.permissions-list") }}</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endcanany
            </ul>
        </div>
    </div>
</nav>
