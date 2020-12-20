<!DOCTYPE html>
<html class="loading" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" lang="{{ LaravelLocalization::getCurrentLocaleName() }}">

<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>{{ trans('admin.sitename') }} | {{ trans('admin.register') }}</title>
    <link rel="apple-touch-icon" href="{{ url('admin_files/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('images/theme/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    @if (app()->getLocale() == 'en')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/vendors/css/vendors.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('admin_files/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('admin_files/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css/pages/authentication.css') }}">
    <!-- END: Page CSS-->
    @else

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('admin_files/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('admin_files/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('admin_files/app-assets/css-rtl/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/pages/authentication.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('admin_files/app-assets/css-rtl/custom-rtl.css') }}">
    <!-- END: Custom CSS-->
    @endif

    <link rel="stylesheet" type="text/css" href="{{url('/css/styles.css')}}">

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body
    class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page"
    data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img src="{{ url('admin_files/app-assets/images/pages/register.jpg') }}"
                                        alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">{{ trans('admin.create_account') }}</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">{{ trans('admin.register_msg') }}</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form action="{{route('register')}}" method="POST">
                                                    @csrf
                                                    @include('partials._errors')
                                                    <div class="form-label-group">
                                                        <input type="text" id="name" name="name" class="form-control"
                                                            placeholder="{{ trans('admin.name') }}">
                                                        <label for="name">{{ trans('admin.name') }}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="text" id="username" name="username"
                                                            class="form-control"
                                                            placeholder="{{ trans('admin.username') }}">
                                                        <label for="username">{{ trans('admin.username') }}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="email" name="email" id="email" class="form-control"
                                                            placeholder="{{ trans('admin.email') }}">
                                                        <label for="email">{{ trans('admin.email') }}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control"
                                                            placeholder="{{ trans('admin.password') }}"
                                                            autocomplete="new-password">
                                                        <label for="password">{{ trans('admin.password') }}</label>
                                                    </div>
                                                    <div class="form-label-group">
                                                        <input type="password" name="password_confirmation"
                                                            id="password-confirm" class="form-control"
                                                            placeholder="{{ trans('admin.password_confirmation') }}"
                                                            autocomplete="new-password">
                                                        <label
                                                            for="password-confirm">{{ trans('admin.password_confirmation') }}</label>
                                                    </div>
                                                    <a href="{{ route('login') }}"
                                                        class="btn btn-outline-primary float-left btn-inline mb-50">{{ trans('admin.login') }}</a>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right btn-inline mb-50">{{ trans('admin.register') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('admin_files/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('admin_files/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ url('admin_files/app-assets/js/core/app.js') }}"></script>
    <script src="{{ url('admin_files/app-assets/js/scripts/components.js') }}"></script>
    <!-- END: Theme JS-->

</body>
<!-- END: Body-->

</html>