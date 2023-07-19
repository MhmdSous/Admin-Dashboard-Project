<?php
$lang = app()->getlocale() == 'ar' ? 'rtl.' : '';
?>
<!DOCTYPE html>
<html >
<!--begin::Head-->
@include('layouts.head')

<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->

        {{-- <a href="index.html">
            <img alt="Logo" src="assets/media/logos/logo-light.png" />
        </a> --}}
        <!--end::Logo-->


        <!--begin::Toolbar-->

        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" class="aside-menu my-4 scroll ps ps--active-y" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    <!--begin::Logo-->
                    <a href="#" class="brand-logo">
                        {{ __('message.Quantum') }}
                        {{-- <img alt="Logo" src="{{ asset('assets/media/logos/logo-light.png') }}" /> --}}
                    </a>
                    <!--end::Logo-->
                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="{{ route('home.index') }}" class="menu-link">
                                    <i class="menu-icon flaticon-home"></i>
                                    <span class="menu-text"> {{ __('message.dashboard') }}</span>
                                </a>
                            </li>
                            <li class="menu-section">
                                <h4 class="menu-text">Custom</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
                                    <i class="menu-icon flaticon-web"></i>
                                    <span class="menu-text">{{ __('message.users') }}</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                                            <span class="menu-link">
                                                <span class="menu-text">{{ __('message.users') }}</span>
                                            </span>
                                        </li>
                                        <li class="menu-item menu-item-submenu" aria-haspopup="true"
                                            data-menu-toggle="hover">
                                            <a href="{{ route('categories') }}" class="menu-link menu-toggle">
                                                {{-- {{ route('user.index') }} --}}
                                                <i class="menu-bullet menu-bullet-line">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{ __('message.categories') }}</span>
                                                <span class="menu-label">
                                                    {{-- <span class="label label-rounded label-primary"></span> --}}

                                                    {{-- {{ $categories->count() }} --}}
                                                </span>

                                            </a>
                                            <a href="{{ route('stores') }}" class="menu-link menu-toggle">
                                                {{-- {{ route('user.index') }} --}}
                                                <i class="menu-bullet menu-bullet-line">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{ __('message.stores') }}</span>
                                                <span class="menu-label">
                                                    {{-- <span class="label label-rounded label-primary"></span> --}}

                                                </span>

                                            </a>
                                            <a href="{{ route('product') }}" class="menu-link menu-toggle">
                                                {{-- {{ route('user.index') }} --}}
                                                <i class="menu-bullet menu-bullet-line">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">{{ __('message.products') }}</span>
                                                <span class="menu-label">
                                                    {{-- <span class="label label-rounded label-primary"></span> --}}

                                                </span>

                                            </a>

                                        </li>

                                    </ul>
                                </div>
                            </li>





                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu"
                                class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->

                                {{-- <div class="navbar-search-block navbar-search-open" style="display: flex;">
                                    <form class="form-inline" method="POST" action="{{ route('search') }}">
                                        @method('GET')
                                      <div class="input-group input-group-sm">
                                        <input  class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">

                                          <button class="btn btn-navbar" type="submit"  >
                                            <i class="fas fa-search"></i>seaech
                                          </button>

                                          <button class="btn btn-navbar"  type="button" data-widget="navbar-search">
                                            <i class="fas fa-times">
                                            </i>
                                          </button>

                                        </div>
                                      </div>
                                    </form>
                                  </div> --}}
                                <div class="dropdown" id="kt_quick_search_toggle">
                                    <!--begin::Toggle-->
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px"
                                        aria-expanded="false">
                                        <div class="btn btn-icon btn-clean btn-lg btn-dropdown mr-1">
                                            <span class="svg-icon svg-icon-xl svg-icon-primary">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none"
                                                        fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24"
                                                            height="24"></rect>
                                                        <path
                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                        <path
                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                            fill="#000000" fill-rule="nonzero"></path>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                    </div>
                                    <!--end::Toggle-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg"
                                        style="">
                                        <div class="quick-search quick-search-dropdown">
                                            <!--begin:Form-->
                                            <form method="get" action="{{ route('search') }}"
                                                class="quick-search-form">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">

                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control"
                                                        placeholder="Search..." name="search_name">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <i class="quick-search-close ki ki-close icon-sm text-muted"
                                                                style="display: none;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                            <!--begin::Scroll-->
                                            <div class="quick-search-wrapper scroll ps" data-scroll="true"
                                                data-height="325" data-mobile-height="200"
                                                style="height: 325px; overflow: hidden;">
                                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                    <div class="ps__thumb-x" tabindex="0"
                                                        style="left: 0px; width: 0px;"></div>
                                                </div>
                                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                    <div class="ps__thumb-y" tabindex="0"
                                                        style="top: 0px; height: 0px;"></div>
                                                </div>
                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                {{-- <div class="quick-search quick-search-inline ml-4 w-300px" id="kt_quick_search_inline">
                                    <!--begin::Form-->
                                    <form method="get" action="{{ route('search') }}" class="quick-search-form" >
                                        <div class="input-group rounded bg-light">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span class="svg-icon svg-icon-lg">
                                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg-->
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                            </g>
                                                        </svg>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control h-45px" placeholder="Search..." />
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="quick-search-close ki ki-close icon-sm"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end::Form-->
                                    <!--begin::Search Toggle-->
                                    <div id="kt_quick_search_toggle" data-toggle="dropdown" data-offset="0px,1px"></div>
                                    <!--end::Search Toggle-->
                                    <!--begin::Dropdown-->
                                    <div class="dropdown-menu dropdown-menu-left dropdown-menu-lg dropdown-menu-anim-up">
                                        <div class="quick-search-wrapper scroll" data-scroll="true" data-height="350" data-mobile-height="200"></div>
                                    </div>
                                    <!--end::Dropdown-->
                                </div>
                                <!--end::Desktop Search-->

                                <!--end::Header Nav--> --}}
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                                    <img class="h-20px w-20px rounded-sm"
                                        src="{{ asset('assets/media/svg/flags/226-united-states.svg') }}" alt="">
                                </div>
                            </div>
                            <div
                                class="dropdown-menu p-0 m-0 dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                                <!--begin::Nav-->
                                <ul class="navi navi-hover py-4">
                                    <!--begin::Item-->
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="navi-item">
                                            <a class="navi-link" rel="alternate" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                                <!--end::Nav-->
                            </div>

                            <!--begin::Languages-->
                            <!--end::Languages-->
                            <!--begin::User-->
                            {{-- <div class="topbar-item">
                        <select class="form-control Langchange">
                            <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                            <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>العربية</option>
                        </select>
                    </div> --}}
                            {{-- مهم  للرجوع --}}

                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                    id="kt_quick_user_toggle">
                                    <span
                                        class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{ __('message.hi') }}</span>
                                    <span
                                        class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3"></span>
                                    {{-- {{ auth()->user()->name }} --}}
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                        <span class="symbol-label font-size-h5 font-weight-bold">S</span>
                                    </span>
                                </div>



                            </div>

                            <!--end::User-->
                        </div>

                        <!--end::Topbar-->
                    </div>

                    <!--end::Container-->
                </div>

                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Subheader-->

                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            @yield('content')
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Entry-->
                </div>

                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">2022©</span>
                            <a href="#" target="_blank" class="text-dark-75 text-hover-primary"></a>
                            {{-- {{ auth()->user()->name }} --}}
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            <a href="#" target="_blank" class="nav-link pl-0 pr-5">About</a>
                            <a href="#" target="_blank" class="nav-link pl-0 pr-5">Team</a>
                            <a href="#" target="_blank" class="nav-link pl-0 pr-0">Contact</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">User Profile
                <small class="text-muted font-size-sm ml-2">12 messages</small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>

            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                {{-- <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label" style="background-image:url('assets/media/users/user.jpg')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div> --}}
                <div class="d-flex flex-column">
                    <a href="{{ route('profile.show') }}"
                        class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">MhmdSous</a>
                    <div class="text-muted mt-1">Web Developer</div>
                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                    fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5"
                                                    r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <span class="navi-text text-muted text-hover-primary">bob2182001@gmail.com</span>
                            </span>
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
            <!--end::Header-->


        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->

    <!--end::Header-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
        <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.3" x="11" y="10" width="2"
                        height="10" rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
            <!--end::Svg Icon-->
        </span>
    </div>
    <!--end::Scrolltop -->
    {{-- Begin  Page scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        var url = "{{ route('LangChange') }}";
        $(".Langchange").change(function() {
            window.location.href = url + "?lang=" + $(this).val();


        });
    </script>
    @include('layouts.script')
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
