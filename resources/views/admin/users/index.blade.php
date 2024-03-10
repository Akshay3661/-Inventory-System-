@extends('admin.layouts.app')

@section('content')
<div class="app-main flex-column flex-row-fluid mt-5" id="kt_app_main">
    <!--begin::Content wrapper-->
    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session()->get('message')}}
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if (Session::has('error'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('error')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    @if (Session::has('danger'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session()->get('danger')}}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        {{-- <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users </h1>

                </div>

            </div>
            <!--end::Toolbar container-->
        </div> --}}
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search User" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                {{-- <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-outline ki-filter fs-2"></i>Filter</button> --}}
                                <!--begin::Menu 1-->
                                {{-- <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <div class="separator border-gray-200"></div>
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Role:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                <option></option>
                                                <option value="admin">Admin</option>
                                                <option value="user">User</option>
                                            </select>
                                        </div>
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Two Step Verification:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                                <option></option>
                                                <option value="Enabled">Enabled</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users"> <i class="ki-outline ki-exit-up fs-2"></i>Export</button> --}}
                                <a href="{{route('admin.users')}}" class="btn btn-primary me-4" > <i class="ki-outline ki-plus fs-2"></i>Add User</a>
                                {{-- <a href="{{route('admin.users.exportxls')}}" class="btn btn-primary" > <i class="ki-outline ki-plus fs-2"></i>Export XLS User</a> --}}


                            </div>
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Export Users</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <i class="ki-outline ki-cross fs-1"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <div class="fv-row mb-10">
                                                    <label class="fs-6 fw-semibold form-label mb-2">Select Roles:</label>
                                                    <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                                <div class="fv-row mb-10">
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Select Export Format:</label>
                                                    <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                        <option value="cvs">CVS</option>
                                                        <option value="zip">ZIP</option>
                                                    </select>
                                                </div>
                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>

                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    {{-- <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                        </div>
                                    </th> --}}
                                    <th class="min-w-30px">Id</th>
                                    <th class="min-w-50px">Name</th>
                                    <th class="min-w-50px text-center">Username</th>
                                    <th class="min-w-80px text-center">Email</th>
                                    {{-- <th class="min-w-50px">Role</th> --}}
                                    <th class="min-w-80px text-center">Mobile No</th>
                                    <th class="min-w-20px text-center">Emp Id</th>
                                    {{-- <th class="min-w-50px">Image</th> --}}
                                    <th class="text-center min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach($users as $data)
                                <tr>
                                    {{-- <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td> --}}
                                    <td class="text-center">{{ $data->id}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('admin.users.edit',$data->id)}}" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url( {{ asset('user_image/'.$data->image) }});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="{{route('admin.users.edit',$data->id)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ ucfirst($data->name)}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    {{-- <td>{{ ucfirst($data->name)}}</td> --}}
                                    <td class="text-center">{{ $data->username}}</td>
                                    <td class="text-center">{{ $data->email}}</td>
                                    {{-- @if(!empty($data->getRoleNames()))
                                    @foreach($data->getRoleNames() as $role)
                                    @if($role == 'admin')
                                    <td><span class="badge badge-light-success">{{ $role }}</span></td>
                                    @else
                                    <td><span class="badge badge-light-warning">{{ $role }}</span></td>
                                    @endif
                                    @endforeach
                                    @endif --}}
                                    <td class="text-center">{{ $data->mono}}</td>
                                    <td class="text-center">{{ $data->emp_id}}</td>
                                    {{-- <td><img src=" {{ asset('user_image/'.$data->image) }}" style="width:50px;height:50px" class=""></td> --}}
                                    <td  class="pe-0 text-center ">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            {{-- @can('roles.edit')
                                            <div class="menu-item px-3">
                                                <a href="{{route('admin.roles.show',$data->id)}}" class="menu-link px-3">View</a>
                                            </div>
                                            @endcan --}}

                                            <div class="menu-item px-3">
                                                <a href="{{route('admin.users.edit',$data->id)}}" class="menu-link px-3">Edit</a>
                                            </div>

                                            <div class="menu-item px-3">
                                                <form action="{{route('admin.users.delete',['id'=> $data->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="menu-link px-3 user_delete_btn" data-kt-ecommerce-product-filter="delete_row" data-id="{{ $data->id }}">Delete</a>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>

</div>


@endsection
