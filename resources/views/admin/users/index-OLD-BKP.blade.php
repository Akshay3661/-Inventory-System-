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
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Users </h1>

                </div>

            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Products-->
                <div class="card card-flush">
                    <!--begin::Card header-->
                    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search User" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <div class="w-100 mw-150px">
                                <!--begin::Select2-->
                                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true" data-placeholder="Status" data-kt-ecommerce-product-filter="status">
                                    <option></option>
                                    <option value="all">All</option>
                                    <option value="published">Published</option>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--begin::Add product-->
                            <a href="{{route('admin.users')}}" class="btn btn-primary">Add User </a>
                            <!--end::Add product-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-30px">Id</th>
                                    <th class="min-w-70px">Name</th>
                                    <th class="min-w-80px">Username</th>
                                    <th class="min-w-100px">Email</th>
                                    <th class="min-w-50px">Role</th>
                                    <th class="min-w-100px">Mobile No</th>
                                    <th class="min-w-50px">Emp Id</th>
                                    <th class="min-w-70px">Image</th>
                                    <th class="min-w-70px">Actions</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($users as $data)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td>
                                    <td  class="pe-0 ">{{ $data->id}}</td>
                                    <td class="pe-0"><span class="fw-bold" data-kt-ecommerce-product-filter="product_name">{{ $data->name}}</span></td>
                                    <td class="pe-0"><span class="fw-bold">{{ $data->username}}</span></td>
                                    <td>{{ $data->email}}</td>
                                    @if(!empty($data->getRoleNames()))
                                    @foreach($data->getRoleNames() as $role)
                                    @if($role == 'admin')
                                    <td class="pe-0 "><span class="badge badge-light-success">{{ $role }}</span></td>
                                    @else
                                    <td class="pe-0 "><span class="badge badge-light-warning">{{ $role }}</span></td>
                                    @endif
                                    @endforeach
                                    @endif
                                    <td>{{$data->mono}}</td>
                                    <td>{{$data->emp_id}}</td>
                                    <td><img src=" {{ asset('user_image/'.$data->image) }}" style="width:50px;height:50px" class=""></td>
                                    <td  class="pe-0 ">
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
                                                <form action="{{route('admin.roles.delete',['id'=> $data->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="menu-link px-3 role_delete_btn" data-kt-ecommerce-product-filter="delete_row" data-id="{{ $data->id }}">Delete</a>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Products-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>

</div>


@endsection
