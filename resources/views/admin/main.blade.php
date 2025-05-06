<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta name="description" content="">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>الإدارة | ذود</title>
    <link rel="icon" href="{{ asset('logo_bg.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Cairo' rel='stylesheet'>
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/ar.css')}}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/confirm.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kufam:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @stack('css')
</head>
<body class="app sidebar-mini rtl">
@if ($errors->any())
    @foreach ($errors->all() as $error)
        @php
            toastr()->error($error);
        @endphp
    @endforeach
@endif
<header class="app-header"><a class="app-header__logo" href="#">
        <img height="77px" src="{{asset('logo_bg.png')}}" class="logo" alt="" />
        <strong style=" font-family: Kufam !important;" class="text-dark">ذود</strong>
    </a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="Search">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                <i class="fa fa-bell"></i>
                @if(getAlerts()->count() > 0)
                    <span class="badge badge-danger">{{ getAlerts()->count() }}</span>
                @endif
            </a>

            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    {{ __('الإشعارات') }}
                    <span class="badge badge-primary">{{ getAlerts()->count() }}</span>
                </li>

                <div class="app-notification__content">
                    @forelse(getAlerts() as $alert)
                        <li>
                            <a rel="alternate" class="app-notification__item d-flex align-items-center" href="{{route('owner.track_devices')}}">
                        <span class="app-notification__icon">
                            @if($alert->type == 'tracker_assigned')
                                <i class="fa fa-microchip text-success"></i>
                            @elseif($alert->type == 'tracker_updated')
                                <i class="fa fa-wrench text-warning"></i>
                            @elseif($alert->type == 'tracker_deleted')
                                <i class="fa fa-times-circle text-danger"></i>
                            @else
                                <i class="fa fa-bell text-info"></i>
                            @endif
                        </span>
                                <div>
                                    <p class="app-notification__message">{{ $alert->message }}</p>
                                    <p class="app-notification__meta text-muted">
                                        {{ \Carbon\Carbon::parse($alert->timestamp)->diffForHumans() }}
                                    </p>
                                </div>
                            </a>
                        </li>
                    @empty
                        <li class="text-center text-muted p-3">
                            <i class="fa fa-bell-slash"></i> {{ __('لا توجد إشعارات جديدة') }}
                        </li>
                    @endforelse
                </div>

                <li class="app-notification__footer text-center">
                    <a href="#">عرض جميع الإشعارات</a>
                </li>
            </ul>
        </li>

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
                    class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{ route('my_profile') }}"><i class="fa fa-user fa-lg"></i> الملف الشخصي</a></li>
                <li><a class="dropdown-item" href="{{ route('update_password_form') }}"><i class="fa fa-lock fa-lg"></i> تغيير كلمة المرور</a></li>
                <li><a class="dropdown-item" href="#" onclick="confirmationLogout('FormLogout')"><i class="fa fa-sign-out fa-lg"></i> تسجيل الخروج </a></li>
                <form id="FormLogout" class="d-none" action="{{route('logout')}}" method="post">@csrf</form>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img height="50px;" class="app-sidebar__user-avatar" src="{{asset('def.png')}}" alt="User Image">
        <div>
            <p style="font-size: 14px;margin-bottom: 9px;" class="app-sidebar__user-name text-dark">مرحبا بك : {{auth()->user()->name}}  </p>
            @if(auth()->user()->role == 'admin')
                <span class="text-dark"> مدير النظام</span>
            @else
                <span class="text-dark">مالك أبل</span>
            @endif

        </div>
    </div>
    <ul class="app-menu">



        @if(auth()->user()->role == 'admin')
            <li>
                <a class="app-menu__item  {{ isNavbarActive('admin/dashboard') }}" href="{{route('admin.dashboard')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{ isNavbarActive('admin/owners*') }}" href="{{ route('admin.owners.index') }}">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">ملاك الإبل</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item {{ isNavbarActive('admin/camels*') }}" href="{{route('admin.camels.index')}}">
                    <i class="app-menu__icon fa fa-paw"></i>
                    <span class="app-menu__label">إدارة الإبل</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{ isNavbarActive('admin/tracker_devices*') }}" href="{{ route('admin.tracker_devices.index') }}">
                    <i class="app-menu__icon fa fa-microchip"></i>
                    <span class="app-menu__label">إدارة أجهزة التتبع</span>
                </a>
            </li>


        @else
            <li>
                <a class="app-menu__item  {{ isNavbarActive('owner/dashboard') }}" href="{{route('owner.dashboard')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">{{ __('Dashboard') }}</span>
                </a>
            </li>
        <li>
            <a class="app-menu__item {{ isNavbarActive('owner/camels*') }}" href="{{route('owner.camels.index')}}">
                <i class="app-menu__icon fa fa-paw"></i>
                <span class="app-menu__label">إدارة الإبل</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item {{ isNavbarActive('owner/health_records*') }}" href="{{route('owner.health_records.index')}}">
                <i class="app-menu__icon fa fa-heartbeat"></i>
                <span class="app-menu__label">إدارة السجلات الصحية</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ isNavbarActive('owner/breeding_records*') }}" href="{{route('owner.breeding_records.index')}}">
                <i class="app-menu__icon fa fa-venus-mars"></i>
                <span class="app-menu__label">إدارة سجلات التزاوج</span>
            </a>
        </li>
            <li>
                <a class="app-menu__item {{ isNavbarActive('owner/track_devices') }}" href="{{ route('owner.track_devices') }}">
                    <i class="app-menu__icon fa fa-microchip"></i>
                    <span class="app-menu__label">اجهزة التتبع  </span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{ isNavbarActive('owner/track_camels') }}" href="{{ route('owner.track_camels') }}">
                    <i class="app-menu__icon fa fa-map"></i>
                    <span class="app-menu__label">تتبع الإبل</span>
                </a>
            </li>


        <li>
            <a class="app-menu__item {{ isNavbarActive('owner/reports*') }}" href="{{route('owner.reports.index')}}">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">التقارير والإحصائيات</span>
            </a>
        </li>
        @endif

            <li>
                <a class="app-menu__item {{ isNavbarActive('my_profile') }}" href="{{route('my_profile')}}">
                    <i class="app-menu__icon fa fa-user"></i>
                    <span class="app-menu__label">{{ __('My Profile') }}</span>
                </a>
            </li>

        <li>
            <a class="app-menu__item {{ isNavbarActive('logout') }}" href="#" onclick="confirmationLogout('FormLogout')">
                <i class="app-menu__icon fa fa-sign-out"></i>
                <span class="app-menu__label">تسجيل الخروج</span>
            </a>
        </li>

{{--        @if(hasPermission('permissions'))--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('permissions*')}}" href="{{route('main_admin.permissions.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-key"></i><span class="app-menu__label">الصلاحيات</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @endif--}}

{{--        @if(hasPermission('roles'))--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('roles*')}}" href="{{route('main_admin.roles.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-road"></i><span class="app-menu__label">الأدوار</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @endif--}}
{{--        @if(hasPermission('departments'))--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('departments*')}}" href="{{route('main_admin.departments.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">الأقسام</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @endif--}}

{{--        @if(hasPermission('employees'))--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('employees*')}}" href="{{route('main_admin.employees.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">الموظفيين</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        @endif--}}

{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('policies*')}}" href="{{route('main_admin.policies.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">السياسات</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li>--}}
{{--            <a class="app-menu__item {{isNavbarActive('chat*')}}" href="{{route('main_admin.chat.index')}}">--}}
{{--                <i class="app-menu__icon fa fa-comments"></i><span class="app-menu__label">التدقيق الاملائي</span>--}}
{{--            </a>--}}
{{--        </li>--}}

    </ul>
</aside>
@yield('content')
<div id="scroller"></div>
@include('admin.footer')
</body>
</html>
