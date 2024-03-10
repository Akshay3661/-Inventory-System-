@php
    $logo = \App\Models\Setting::find(1);
@endphp
<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
    <!--begin::Sidebar-->
    <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
        <div class="app-sidebar-header d-flex flex-stack d-none d-lg-flex pt-8 pb-2" id="kt_app_sidebar_header">
            <!--begin::Logo-->
            <a href="{{route('admin.dashboard')}}" class="app-sidebar-logo">
                {{-- <img alt="Logo" src="{{asset('admin/dist/assets/media/logos/demo38.svg')}}" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
                <img alt="Logo" src="{{asset('admin/dist/assets/media/logos/demo38-dark.svg')}}" class="h-20px h-lg-25px theme-dark-show" /> --}}
               @if (isset($logo->site_logo))
               <img alt="Logo" src="@if(isset($logo->site_logo)) {{ asset('site_image/'.$logo->site_logo) }} @endif" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
               @else
               <img alt="Logo" src="{{asset('admin/dist/assets/media/logos/demo38.svg')}}" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" />
               @endif
                {{-- <img alt="Logo" src="@if(isset($logo->site_logo)) {{ asset('site_image/'.$logo->site_logo) }} @endif" class="h-25px d-none d-sm-inline app-sidebar-logo-default theme-light-show" /> --}}
                {{-- {{$logo->site_logo}} --}}

            </a>
            <!--end::Logo-->
            <!--begin::Sidebar toggle-->
            {{-- <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-sm btn-icon bg-light btn-color-gray-700 btn-active-color-primary d-none d-lg-flex rotate" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="app-sidebar-minimize">
                <i class="ki-outline ki-text-align-right rotate-180 fs-1"></i>
            </div> --}}
            <!--end::Sidebar toggle-->
        </div>
        <!--begin::Navs-->
        <div class="app-sidebar-navs flex-column-fluid py-6" id="kt_app_sidebar_navs">
            <div id="kt_app_sidebar_navs_wrappers" class="app-sidebar-wrapper hover-scroll-y my-2" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_header" data-kt-scroll-wrappers="#kt_app_sidebar_navs" data-kt-scroll-offset="5px">

                <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="app-sidebar-menu-primary menu menu-column menu-rounded menu-sub-indention menu-state-bullet-primary">
                    <!--begin::Heading-->
                    {{-- <div class="menu-item mb-2">
                        <div class="menu-heading text-uppercase fs-7 fw-bold">Menu</div>
                        <!--begin::Separator-->
                        <div class="app-sidebar-separator separator"></div>
                        <!--end::Separator-->
                    </div> --}}
                    <!--end::Heading-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link " href="{{route('admin.dashboard')}}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-home-2 fs-2"></i>
                            </span>
                            <span class="menu-title">Dashboards</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    {{-- <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion"> --}}
                    {{-- <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="ki-outline ki-user fs-2"></i>
                            </span>
                            <span class="menu-title">User Manage</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.users')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.users.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}

                    {{-- <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-sliders fs-2"></i>
                            </span>
                            <span class="menu-title">Role</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.roles')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.roles.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}

                    {{-- <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-shield-check fs-2"></i>
                            </span>
                            <span class="menu-title">Permission</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.permissions')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.permissions.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}

                    {{-- <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-card-checklist fs-2"></i>
                            </span>
                            <span class="menu-title">Category</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.category')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.category.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-archive fs-2"></i>
                            </span>
                            <span class="menu-title">Product</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.product')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.product.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div>

                    <div data-kt-menu-trigger="click" class="menu-item here  menu-accordion">
                        <!--begin:Menu link-->
                        <span class="menu-link">
                            <span class="menu-icon">
                                <i class="bi bi-people fs-2"></i>
                            </span>
                            <span class="menu-title">Employee</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <!--end:Menu link-->
                        <!--begin:Menu sub-->
                        <div class="menu-sub menu-sub-accordion">
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link " href="{{route('admin.employee')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">Add</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="{{route('admin.employee.list')}}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">View</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                        </div>
                        <!--end:Menu sub-->
                    </div> --}}

                    <div class="menu-item">
                        <a class="menu-link " href="{{route('admin.users.list')}}">
                            <span class="menu-icon">
                                <i class="ki-outline ki-user fs-2"></i>
                            </span>
                            <span class="menu-title">
                               User Management
                            </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{route('admin.employee.list')}}">
                            <span class="menu-icon">
                                <i class="bi bi-people fs-2"></i>
                            </span>
                            <span class="menu-title">
                               Employee
                            </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{route('admin.category.list')}}">
                            <span class="menu-icon">
                                <i class="bi bi-card-checklist fs-2"></i>
                            </span>
                            <span class="menu-title">
                               Category
                            </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{route('admin.product.list')}}">
                            <span class="menu-icon">
                                <i class="bi bi-archive fs-2"></i>
                                {{-- <i class="bi bi-box fs-2"></i> --}}
                            </span>
                            <span class="menu-title">
                               Product
                            </span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link " href="{{route('admin.setting')}}">
                            <span class="menu-icon">
                                <i class="bi bi-gear fs-2"></i>
                            </span>
                            <span class="menu-title">
                               Settings
                            </span>
                        </a>
                    </div>


                </div>
                <!--end::Sidebar menu-->
            </div>
        </div>
        <!--end::Navs-->
    </div>
    <!--end::Sidebar-->
