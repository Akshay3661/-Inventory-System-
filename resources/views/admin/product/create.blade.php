@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
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
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data" id="Add_Product">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">

                    {{-- <div class="card-header">
                        <div class="card-title">
                            <h2>Product Add</h2>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0">
                        <div class="row mb-5">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Product Name</label>
                                <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Product Name"
                                    value="{{old('name')}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Category</label>
                                <select name="category" id="category"  class="form-select mb-2  @error('category') is-invalid @enderror">
                                    <option value="">----- SELECT CATEGORY -----</option>
                                    @foreach ($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Assign to</label>
                                {{-- <input type="text" name="assign_to" id="assign_to" class="form-control mb-2 @error('assign_to') is-invalid @enderror" placeholder="Assign_to" value="{{old('assign_to')}}"/> --}}
                                <select name="assign_to" id="assign_to"  class="form-select mb-2  @error('category') is-invalid @enderror">
                                    <option value="">----- SELECT Employee -----</option>
                                    @foreach ($employee as $emp)
                                    <option value="{{$emp->id}}">{{$emp->fname.' '.$emp->lname}}</option>
                                    @endforeach
                                </select>
                                @error('assign_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Condition</label>
                                <input type="text" name="condition" id="condition" class="form-control mb-2 @error('condition') is-invalid @enderror" placeholder="Condition" value="{{old('condition')}}"/>
                                @error('condition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Comment</label>
                            <textarea name="comment" id="comment" class="form-control mb-2 @error('comment') is-invalid @enderror" rows="3" placeholder="Comment">{{old('comment')}}</textarea>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control mb-2 @error('quantity') is-invalid @enderror" placeholder="Quantity" value="{{old('quantity')}}"/>
                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Inventory No</label>
                                <input type="number" name="inventory_no" id="inventory_no" class="form-control mb-2 @error('inventory_no') is-invalid @enderror" placeholder="Inventory No" value="{{old('inventory_no')}}"/>
                                @error('inventory_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Brand</label>
                                <input type="text" name="brand" id="brand" class="form-control mb-2 @error('brand') is-invalid @enderror" placeholder="Brand" value="{{old('brand')}}"/>
                                @error('brand')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Image</label>
                                {{-- <input type="file" name="image" id="image" class="form-control mb-2  @error('image') is-invalid @enderror" placeholder="Employee Id"> --}}
                                <div class="card-body text-center pt-0">
                                    <style>
                                        .image-input-placeholder {
                                            background-image: url('/metronic8/demo38/assets/media/svg/files/blank-image.svg');
                                        }
                                        [data-bs-theme="dark"] .image-input-placeholder {
                                            background-image: url('/metronic8/demo38/assets/media/svg/files/blank-image-dark.svg');
                                        }
                                    </style>
                                    <div class="image-input image-input-outline image-input-placeholder mb-3 image-input-empty" data-kt-image-input="true">
                                        <div class="image-input-wrapper w-100px h-100px" style=""></div>
                                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                <i class="ki-outline ki-pencil fs-7"></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" id="image" accept=".png, .jpg, .jpeg" >
                                                <input type="hidden" name="avatar_remove" value="0">
                                                <!--end::Inputs-->
                                            </label>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                    </div>
                                    {{-- <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div> --}}
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <label class="required form-label">Status</label>
                                <div class="d-flex fv-row mb-5">
                                    <div class="form-check form-check-custom form-check-solid me-10">
                                        <input class="form-check-input me-0  @error('status') is-invalid @enderror" name="status" type="radio" value="Active" id="status" checked='checked' />

                                        <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                            <div class="fw-bold text-gray-800">Active</div>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-0  @error('status') is-invalid @enderror" name="status" type="radio" value="Inactive" id="status" />
                                        <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                            <div class="fw-bold text-gray-800">InActive</div>
                                        </label>
                                    </div>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Purchase information</h3>
                                </div>
                            </div>
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Purchase Price</label>
                                            {{-- <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" > --}}
                                            <input type="number" name="purchase_price" id="purchase_price" class="form-control mb-2  @error('purchase_price') is-invalid @enderror" value="{{old('purchase_price')}}" placeholder="Purchase Price">
                                            @error('purchase_price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Purchase Date</label>
                                            <input type="date" name="purchase_date" id="purchase_date" class="form-control mb-2  @error('purchase_date') is-invalid @enderror" value="{{old('purchase_date', now()->toDateString())}}">
                                            @error('purchase_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Warranty</h3>
                                </div>
                            </div>
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Warranty</label>
                                            <div class="d-flex fv-row mb-5">
                                                <div class="form-check form-check-custom form-check-solid me-10">
                                                    <input class="form-check-input me-0  @error('warranty') is-invalid @enderror" name="warranty" type="radio" value="Yes" id="warranty_yes"  />

                                                    <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                                        <div class="fw-bold text-gray-800">Yes</div>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-0  @error('warranty') is-invalid @enderror" name="warranty" type="radio" value="No" id="warranty_no" checked='checked'/>
                                                    <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                                        <div class="fw-bold text-gray-800">No</div>
                                                    </label>
                                                </div>
                                                @error('warranty')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container d-none" id="warranty_model1">
                                            <label class="required form-label">Duration</label>
                                            {{-- <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" > --}}
                                            <input type="text" name="duration" id="duration" class="form-control mb-2  @error('duration') is-invalid @enderror" value="{{old('duration')}}" placeholder="Duration">
                                            @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container d-none" id="warranty_model2">
                                            <label class="required form-label">Start Date</label>
                                            <input type="date" name="start_date" id="start_date" class="form-control mb-2  @error('start_date') is-invalid @enderror" value="{{old('start_date')}}">
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container d-none" id="warranty_model3">
                                            <label class="required form-label">End Date</label>
                                            <input type="date" name="end_date" id="end_date" class="form-control mb-2  @error('end_date') is-invalid @enderror" value="{{old('end_date')}}">
                                            @error('end_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Vendor Details</h3>
                                </div>
                            </div>
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Company</label>
                                            {{-- <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" > --}}
                                            <input type="text" name="company" id="company" class="form-control mb-2  @error('company') is-invalid @enderror" value="{{old('company')}}" placeholder="Company">
                                            @error('company')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Owner Name/ Service provider name</label>
                                            {{-- <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" > --}}
                                            <input type="text" name="owner_name" id="owner_name" class="form-control mb-2  @error('owner_name') is-invalid @enderror" value="{{old('owner_name')}}" placeholder="Owner Name/ Service provider name">
                                            @error('owner_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Phone</label>
                                            {{-- <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" > --}}
                                            <input type="number" name="phone" id="phone" class="form-control mb-2  @error('phone') is-invalid @enderror" value="{{old('phone')}}" placeholder="Phone">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.product')}}" id="kt_ecommerce_add_product_cancel"
                            class="btn btn-light me-5">Cancel</a>
                        <button type="submit" name="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                 </div>
            </form>
        </div>
    </div>
@endsection
