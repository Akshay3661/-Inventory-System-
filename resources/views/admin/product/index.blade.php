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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Product </h1>

                </div>

            </div>
            <!--end::Toolbar container-->
        </div> --}}
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
                                <input type="text" data-kt-ecommerce-product-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Search Product" />
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
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                                <!--end::Select2-->
                            </div>
                            <!--begin::Add product-->
                            <a href="{{route('admin.product')}}" class="btn btn-primary">Add Product </a>
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
                                    {{-- <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                                        </div>
                                    </th> --}}
                                    <th class="min-w-30px">Id</th>
                                    <th class="min-w-70px">Product</th>
                                    <th class="min-w-80px text-center">Category</th>
                                    <th class="min-w-100px">Assign To</th>
                                    <th class="text-center min-w-200px">Comment</th>
                                    <th class="text-center">Condition</th>
                                    <th class="text-center">quantity</th>
                                    <th class="text-center">inventory</th>
                                    <th class="text-center">brand</th>
                                    <th class="min-w-50px">Status</th>
                                    {{-- <th class="min-w-70px">Image</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach($product as $data)
                                {{-- {{dd($data)}} --}}

                                {{-- @foreach($data->employees as $emp_data) --}}
                                <tr>
                                    {{-- <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="1" />
                                        </div>
                                    </td> --}}
                                    <td>{{ $data->id}}</td>
                                    {{-- <td class="pe-0"><span class="fw-bold" data-kt-ecommerce-product-filter="product_name">{{ ucfirst($data->name)}}</span></td> --}}
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{route('admin.product.edit',$data->id)}}" class="symbol symbol-50px">
                                                <span class="symbol-label" style="background-image:url( {{ asset('product_image/'.$data->image) }});"></span>
                                            </a>
                                            <div class="ms-5">
                                                <a href="{{route('admin.product.edit',$data->id)}}" class="text-gray-800 text-hover-primary fs-5 fw-bold" data-kt-ecommerce-product-filter="product_name">{{ ucfirst($data->name)}}</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pe-0 text-center"><span class="fw-bold">{{ $data->category}}</span></td>

                                    @if($data->employees->isEmpty())
                                        <td class="text-center">{{'-'}}</td>
                                    @else
                                        @foreach($data->employees as $emp_data)
                                            <td class="text-center">{{ $emp_data->fname.' '.$emp_data->lname}}</td>
                                        @endforeach
                                    @endif
                                    <td class="text-center">{{ $data->comment}}</td>
                                    <td class="text-center">{{ $data->condition}}</td>
                                    <td class="text-center">{{ $data->quantity}}</td>
                                    <td class="text-center">{{ $data->inventory_no}}</td>
                                    <td class="text-center">{{ $data->brand}}</td>
                                    <td>
                                        <div class="badge {{ $data->status == 'Active' ? 'badge-light-success' : 'badge-light-danger' }}">{{$data->status}}</div>
                                    </td>
                                    {{-- <td><img src=" {{ asset('product_image/'.$data->image) }}" style="width:80px;height:80px" class=""></td> --}}


                                    <td  class="pe-0 ">
                                        <a href="#" class="btn btn-sm btn-light btn-flex btn-center btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
                                            <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            {{-- <div class="menu-item px-3">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission" class="menu-link px-3">View</a>
                                            </div> --}}
                                            <div class="menu-item px-3">
                                                <a href="{{route('admin.product.edit',$data->id)}}" class="menu-link px-3">Edit</a>
                                            </div>

                                            <div class="menu-item px-3">
                                                <form action="{{route('admin.product.delete',['id'=> $data->id])}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#" class="menu-link px-3 prod_delete_btn" data-kt-ecommerce-product-filter="delete_row" data-id="{{ $data->id }}">Delete</a>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                {{-- @endforeach --}}

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
{{-- model --}}
{{-- <div class="modal fade" id="kt_modal_update_permission" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered mw-650px">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="fw-bold">Product View</h2>
				<div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-permissions-modal-action="close">
					<i class="ki-outline ki-cross fs-1"></i>
				</div>
			</div>
			<div class="modal-body scroll-y mx-5 mx-xl-15 my-7" id="kt_modal_update_permission_form" class="form">
                <h3>hello</h3>
			</div>
		</div>
	</div>
</div> --}}

@endsection
