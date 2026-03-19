<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8" />
    <title>@yield('page_title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="{{ asset('admin-assets/css/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('admin-assets/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin-assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>

    @stack("header")

    <style>
        @media(max-width:842px){
            .m-portlet__head-text small{
                padding-left:0 !important; padding-top:3px; margin-right:15px !important;
            }
        }

        @media(max-width:768px){
            .m-form__group .col-md-3{
                margin-bottom:10px;
            }
            .custom-file{
                width:100% !important;
            }
        }

        @media(max-width:575px){
            .m-portlet__head {
                padding:15px !important;
            }
            .m-portlet .m-portlet__body{
                padding:15px !important; padding-bottom:1px !important;
            }
            .m-widget1{
                padding:10px 0 !important;
            }
            .m-widget5{
                padding:15px 0 !important; margin-left:-15px;
            }
            .m-portlet.m-portlet--full-height{
                margin-bottom:0 !important;
            }
        }
    </style>

    <style>
        .loader {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255,255,255,0.5);
            text-align: center;
            z-index: 999999;
        }

        .loader h3 {
            font-size: 15px;
            font-weight: 400;
            padding: 10px;
            margin-bottom: 0;
            margin-top:13%;
            width: 180px;
            height: 40px;
            background-position: center;
            background: white;
            box-shadow: 0 1px 15px 1px rgba(69,65,78,.08);
            color:#575962;
            display: inline-block;
        }

        .m-loader {
            width: 50px;
            display: inline-block;
        }

        .m-loader:before {
            margin-top: -13px;
            border-top-width: 3px;
            border-right-width: 3px;
        }

        #error-msg{
            background:#cf2338; padding:15px 0;
        }

        #error-msg h4{
            color:#fff; font-size:14px;
        }

        #error-msg h4 i{
            margin-right:10px;
        }

        #error-msg h4 a{
            float:right; font-size:30px; color:#fff; margin-top:-12px;
        }

        .toast-bottom-right {
            bottom: 135px !important;
        }
    </style>

</head>

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <div id="error-msg" style="display:none">
        <div class="container">
            <h4 style="margin:0">
                <i class="fas fa-info-circle"></i>
                This browser may not support all the Features of the Website. Please use Chrome, Firefox, Opera or similar browsers for better User Experience.
            </h4>
        </div>
    </div>

    <div class="m-grid m-grid--hor m-grid--root m-page">
        <header id="m_header" class="m-grid__item m-header" m-minimize-offset="200"
            m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">

                    <div class="m-stack__item m-brand  m-brand--skin-dark ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="{{ route('admin.dashboard') }}"
                                    class="m-brand__logo-wrapper"
                                    title="Admin Dashboard">
                                    Admin Panel
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <a href="javascript:;" id="m_aside_left_minimize_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block">
                                    <span></span>
                                </a>
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                                    class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                                    class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="flaticon-more"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <button class="m-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark"
                            id="m_aside_header_menu_mobile_close_btn">
                            <i class="la la-close"></i>
                        </button>
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-topbar__nav-wrapper">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                        <a href="javascript:;" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic">
                                                <img src="{{ adminProfileUrl() }}"
                                                    class="m--img-rounded m--marginless m--img-centered"
                                                    alt="{{ data_get(currentUser(), 'name') }}"/>
                                            </span>
                                            <span class="m-topbar__username m--hide">
                                                {{ data_get(currentUser(), 'name') }}
                                            </span>
                                        </a>
                                        <div class="m-dropdown__wrapper">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust">
                                            </span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center"
                                                    style="background: url({{ asset('admin-assets/images/user_profile_bg.jpg') }}); background-size: cover;">
                                                    <div class="m-card-user m-card-user--skin-dark">
                                                        <div class="m-card-user__pic">
                                                            <img src="{{ adminProfileUrl() }}"
                                                                class="m--img-rounded m--marginless"
                                                                alt="{{ ucwords(data_get(currentUser(), 'name')) }}"/>
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">
                                                                {{ data_get(currentUser(), 'name') }}
                                                            </span>
                                                            <a href="javascript:;" title="Email Address"
                                                                class="m-card-user__email m--font-weight-300 m-link">
                                                                {{ data_get(currentUser(), 'email') }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text">Section</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('admin.setting') }}"
                                                                   class="m-nav__link" title="Setting">
                                                                    <i class="m-nav__link-icon flaticon-cogwheel-1"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">
                                                                                Setting
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="{{ route('admin.change.password') }}" class="m-nav__link" title="Change Password">
                                                                    <i class="m-nav__link-icon la la-key"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">
                                                                                Change Password
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                            <form action="{{ route('admin.logout') }}" id="admin-logout-form" method="post">
                                                                @csrf
                                                            </form>
                                                            <li class="m-nav__item">
                                                                <a href="javascript:;" id="admin-logout" class="m-nav__link" title="Logout">
                                                                    <i class="m-nav__link-icon flaticon-logout"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">
                                                                                Logout
                                                                            </span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
