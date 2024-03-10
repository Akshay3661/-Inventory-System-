<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>

		<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
			<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
				<div id="kt_app_header" class="app-header">
					<div class="app-container container-fluid d-flex align-items-stretch flex-stack" id="kt_app_header_container">

						<div class="d-flex align-items-center d-block d-lg-none ms-n3" title="Show sidebar menu">
							<div class="btn btn-icon btn-active-color-primary w-35px h-35px me-2" id="kt_app_sidebar_mobile_toggle">
								<i class="ki-outline ki-abstract-14 fs-2"></i>
							</div>
							<a href="../../demo38/dist/index.html">
								<img alt="Logo" src="{{asset('admin/dist/assets/media/logos/demo38-small.svg')}}" class="h-30px" />
							</a>
						</div>

						<div class="app-navbar flex-lg-grow-1" id="kt_app_header_navbar">
							<div class="app-navbar-item d-flex align-items-stretch flex-lg-grow-1">
								<!--begin::Search-->
								<div id="kt_header_search" class="header-search d-flex align-items-center w-lg-200px" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="menu" data-kt-search-responsive="true" data-kt-menu-trigger="auto" data-kt-menu-permanent="true" data-kt-menu-placement="bottom-start">
									<!--begin::Tablet and mobile search toggle-->
									<div data-kt-search-element="toggle" class="search-toggle-mobile d-flex d-lg-none align-items-center">
										<div class="d-flex">
											<i class="ki-outline ki-magnifier fs-1"></i>
										</div>
									</div>
                                    @if(isset($pageName))
                                    <h2>{{ $pageName }}</h2>
                                    @endif
								</div>
							</div>


							<div class="app-navbar-item ms-1 ms-md-3" id="kt_header_user_menu_toggle">
								<div class="cursor-pointer symbol symbol-circle symbol-35px symbol-md-45px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									@if(Auth::check())
                                        <img src="{{asset('user_image/'.Auth::user()->image)}}" alt="user" />
                                    @endif
								</div>
								<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content d-flex align-items-center px-3">
											<div class="symbol symbol-50px me-5">
												@if(Auth::check())
                                                    <img src="{{asset('user_image/'.Auth::user()->image)}}" />
                                                @endif
											</div>
											<div class="d-flex flex-column">
												<div class="fw-bold d-flex align-items-center fs-5">@if(Auth::check()) {{ucfirst(Auth::user()->name)}} @endif
												<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Admin</span></div>
												<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">@if(Auth::check()) {{Auth::user()->email}} @endif</a>
											</div>
										</div>
									</div>
									<div class="separator my-2"></div>
									<div class="menu-item px-5">
										<a href="{{route('profile')}}" class="menu-link px-5">My Profile</a>
									</div>
                                    <!--<div class="menu-item px-5">
										<a href="{{route('admin.setting')}}" class="menu-link px-5">Setting</a>
									</div>-->
									<div class="menu-item px-5">
										<a href="{{ route('admin.logout') }}" class="menu-link px-5">Sign Out</a>
									</div>
								</div>
							</div>
						</div>
						<div class="app-navbar-separator separator d-none d-lg-flex"></div>
					</div>
				</div>
