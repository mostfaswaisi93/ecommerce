@include('admin.partials.menu')

<!-- BEGIN: Sidebar -->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('admin.index') }}">
                    <img src="{{ url('images/theme/logo.png') }}" alt="avatar" height="35" width="35"
                        style="background-position: -65px -54px;">
                    <h2 class="brand-text mb-0" style="color: #fff">{{ trans('admin.sitename') }}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="navigation-header"></li>
            <li {{ request()->route()->getName() === 'admin.index' ? 'class=active' : '' }}>
                <a href="{{ route('admin.index') }}" class="nav-link">
                    <i class="fa fa-home"></i>
                    <span class="title">{{ trans('admin.home') }}</span>
                </a>
            </li>
            {{-- <li {{ request()->route()->getName() === 'admin.notifications.index' ? 'class=active' : '' }}>
                <a href="{{ route('admin.notifications.index') }}" class="nav-link">
                    <i class="fa fa-bell"></i>
                    <span class="title">{{ trans('admin.notifications') }}</span>
                </a>
            </li> --}}
            {{-- <li {{ request()->route()->getName() === 'admin.contacts.index' ? 'class=active' : '' }}>
                <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                    <i class="ficon feather icon-mail"></i>
                    <span class="title">{{ trans('admin.contacts') }}</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="#">
                    <i class="fa fa-info-circle"></i>
                    <span class="menu-title">{{ trans('admin.system_constants') }}</span>
                    {{-- <span class="badge badge badge-primary badge-pill float-right mr-2">New</span> --}}
                </a>
                <ul class="menu-content">
                    {{-- <li {{ request()->route()->getName() === 'admin.countries.index' ? 'class=active' : '' }}>
                        <a href="{{ route('admin.countries.index') }}" class="nav-link">
                            <i class="fa fa-flag"></i>
                            <span class="title">{{ trans('admin.countries') }}</span>
                        </a>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.cities.index' ? 'class=active' : '' }}>
                        <a href="{{ route('admin.cities.index') }}" class="nav-link">
                            <i class="fa fa-building-o"></i>
                            <span class="title">{{ trans('admin.cities') }}</span>
                        </a>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.payment_methods.index' ? 'class=active' : '' }}>
                        <a href="{{ route('admin.payment_methods.index') }}" class="nav-link">
                            <i class="fa fa-money"></i>
                            <span class="title">{{ trans('admin.payment_methods') }}</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="feather icon-users"></i>
                    <span class="menu-title">{{ trans('admin.users_management') }}</span>
                </a>
                <ul class="menu-content">
                    {{-- <li {{ request()->route()->getName() === 'admin.users.index' ? 'class=active' : '' }}>
                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                            <i class="feather icon-users"></i>
                            <span class="title">{{ trans('admin.users') }}</span>
                        </a>
                    </li>
                    <li {{ request()->route()->getName() === 'admin.roles.index' ? 'class=active' : '' }}>
                        <a href="{{ route('admin.roles.index') }}" class="nav-link">
                            <i class="fa fa-sliders"></i>
                            <span class="title">{{ trans('admin.roles') }}</span>
                        </a>
                    </li> --}}
                </ul>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span class="menu-title">{{ trans('admin.reports') }}</span>
                </a>
                <ul class="menu-content">
                    <li {{ request()->route()->getName() === 'admin.reports.financial.index' ? 'class=active' : '' }}>
                        <a href="#" class="nav-link">
                            <i class="fa fa-money"></i>
                            <span class="title">{{ trans('admin.reports_financial') }}</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li {{ request()->route()->getName() === 'admin.settings.index' ? 'class=active' : '' }}>
                {{-- <a href="{{ route('admin.settings.index') }}" class="nav-link">
                    <i class="feather icon-settings"></i>
                    <span class="title">{{ trans('admin.settings') }}</span>
                </a> --}}
            </li>
        </ul>
    </div>
</div>
<!-- END: Sidebar -->

@include('admin.partials.master')