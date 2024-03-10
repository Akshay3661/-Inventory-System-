@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
        <div id="kt_app_content_container" class="app-container container-xxl">

            {{-- <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mb-5">
                <div class="card card-flush ">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Employee Add</h2>
                        </div>
                    </div>
                </div>
            </div> --}}
            <form action="{{route('admin.employee.store')}}" method="post" enctype="multipart/form-data" id="Add_Employee">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">
                    {{-- <div class="card-header">
                        <div class="card-title">
                            <h2>Employee Add</h2>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0">
                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Basic</h3>
                                </div>
                            </div>
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-0">
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
                                </div>
                            </div>
                        </div>

                        <div class="card  border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Personal Info</h3>
                                </div>
                            </div>
                            <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-9">

                                    <div class="d-flex flex-wrap gap-5">
                                        <div class="fv-row w-100 flex-md-root fv-plugins-icon-container">
                                            <div class="row mb-5">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">First Name</label>
                                                    <input type="text" name="fname" id="fname" class="form-control mb-2  @error('fname') is-invalid @enderror" placeholder="First name" value="{{old('fname')}}">
                                                    @error('fname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Last Name</label>
                                                    <input type="text" name="lname" id="lname" class="form-control mb-2  @error('lname') is-invalid @enderror" placeholder="Last name" value="{{old('lname')}}">
                                                    @error('lname')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Gender</label>
                                                    <div class="d-flex fv-row mb-5">
                                                        <div class="form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input me-0  @error('gender') is-invalid @enderror" name="gender" type="radio" value="Male" id="gender" checked='checked' />
                                                            <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                                                <div class="fw-bold text-gray-800">Male</div>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-0  @error('gender') is-invalid @enderror" name="gender" type="radio" value="Female" id="gender" />
                                                            <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                                                <div class="fw-bold text-gray-800">Female</div>
                                                            </label>
                                                        </div>
                                                        @error('gender')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Date Of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control mb-2  @error('dob') is-invalid @enderror"  value="{{old('dob', now()->toDateString())}}">
                                                    @error('dob')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control mb-2  @error('email') is-invalid @enderror" placeholder="Email" value="{{old('email')}}">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Mobile No</label>
                                                    <input type="number" name="mono" id="mono" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control mb-2  @error('mono') is-invalid @enderror" placeholder="Mobile No" value="{{old('mono')}}">
                                                    @error('mono')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Department</label>
                                                <input type="text" name="department" id="department" class="form-control mb-2  @error('department') is-invalid @enderror" placeholder="Deparment" value="{{old('department')}}">
                                                @error('department')
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

                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Assinged Products</h3>
                                </div>
                            </div>
                            {{-- <div id="kt_account_settings_signin_method" class="collapse show">
                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Product</label>
                                            <input type="text" name="product" id="product" class="form-select  @error('product_id') is-invalid @enderror" >
                                            <select class="form-select  @error('product_id') is-invalid @enderror" id="product" name="product">
                                                <select class="form-select @error('product_id') is-invalid @enderror" multiple aria-label="multiple select example" name="product[]" id="product">
                                                <option value=' '>-----  Product  -----</option>
                                                @foreach ($product as $products )
                                                    <option value="{{$products->id}}">{{$products->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Assign date</label>
                                            <input type="date" name="assigndate" id="assigndate" class="form-control mb-2  @error('assigndate') is-invalid @enderror" value="{{old('assigndate', now()->toDateString())}}">
                                            @error('assigndate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control mb-2  @error('quantity') is-invalid @enderror" placeholder="Quantity" value="{{old('quantity')}}">
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Condition</label>
                                            <input type="text" name="condition" id="condition" class="form-control mb-2  @error('condition') is-invalid @enderror" placeholder="Condition" value="{{old('condition')}}">
                                            @error('condition')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div> --}}
                            <div class="card-body pt-0 mt-10">
                                <!--begin::Input group-->
                                <div class="" data-kt-ecommerce-catalog-add-product="auto-options">

                                    <div id="kt_docs_repeater_advanced">
                                        <!--begin::Form group-->
                                        <div class="form-group">
                                            <div data-repeater-list="assign_product" class="d-flex flex-column gap-3">
                                                <div data-repeater-item="" class="form-group d-flex flex-wrap align-items-center gap-5">
                                                    <!--begin::Select2-->
                                                    <div class="w-100 w-md-150px">
                                                        <label class="required form-label">Product</label>
                                                        {{-- <select class="form-select" name="product_option" data-placeholder="Select a variation" data-kt-ecommerce-catalog-add-product="product_option"> --}}
                                                        <select class="form-select  @error('product_id') is-invalid @enderror" name="product" data-kt-repeater="select2" data-placeholder="Select an Product">
                                                            <option value=' '>Select Product</option>
                                                            @foreach ($product as $products )
                                                                <option value="{{$products->id}}">{{$products->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="w-100 w-md-150px">
                                                    <label class="required form-label">Assign date</label>
                                                        <input type="date" name="assigndate" id="assigndate" class="form-control mb-2  @error('assigndate') is-invalid @enderror" data-kt-repeater="datepicker" value="{{old('assigndate', now()->toDateString())}}">
                                                        @error('assigndate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="w-100 w-md-150px">
                                                        <label class="required form-label">Quantity</label>
                                                        <input type="number" name="quantity" id="quantity" class="form-control mb-2  @error('quantity') is-invalid @enderror" placeholder="Quantity" value="{{old('quantity')}}">
                                                        @error('quantity')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="w-100 w-md-150px">
                                                        <label class="required form-label">Condition</label>
                                                        <input type="text" name="condition" id="condition" class="form-control mb-2  @error('condition') is-invalid @enderror" placeholder="Condition" value="{{old('condition')}}">
                                                        @error('condition')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <button type="button" data-repeater-delete="" class="btn btn-sm btn-icon btn-light-danger mt-5">
                                                        <i class="ki-outline ki-cross fs-1"></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group mt-5">
                                            <button type="button" data-repeater-create="" class="btn btn-sm btn-light-primary">
                                            <i class="ki-outline ki-plus fs-2"></i>Assinged Products</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- form repet --}}
                        <div class="d-none fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                            <div class="d-flex flex-column gap-7 gap-lg-10">
                                <div class="card card-flush py-4">
                                    <div class="card-body pt-0">
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_percentage">
                                            <!--begin::Label-->
                                            <label class="form-label">Set Discount Percentage</label>
                                            <!--end::Label-->
                                            <!--begin::Slider-->
                                            <div class="d-flex flex-column text-center mb-5">
                                                <div class="d-flex align-items-start justify-content-center mb-7">
                                                    <span class="fw-bold fs-3x" id="kt_ecommerce_add_product_discount_label">0</span>
                                                    <span class="fw-bold fs-4 mt-1 ms-2">%</span>
                                                </div>
                                                <div id="kt_ecommerce_add_product_discount_slider" class="noUi-sm"></div>
                                            </div>
                                            <div class="text-muted fs-7">Set a percentage discount to be applied on this product.</div>
                                        </div>
                                        <div class="d-none mb-10 fv-row" id="kt_ecommerce_add_product_discount_fixed">
                                            <label class="form-label">Fixed Discounted Price</label>
                                            <input type="text" name="dicsounted_price" class="form-control mb-2" placeholder="Discounted price" />
                                            <div class="text-muted fs-7">Set the discounted product price. The product will be reduced at the determined fixed price</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- end form repet --}}
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.employee')}}" id="kt_ecommerce_add_product_cancel"
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
@section('script')
<script>
    $('#kt_docs_repeater_advanced').repeater({
        initEmpty: false,

        show: function () {
            $(this).slideDown();

            // Re-init select2
            $(this).find('[data-kt-repeater="select2"]').select2();

            // Re-init flatpickr
            $(this).find('[data-kt-repeater="datepicker"]').flatpickr();

        },

        hide: function (deleteElement) {
            $(this).slideUp(deleteElement);
        },

        ready: function(){
            // Init select2
            $('[data-kt-repeater="select2"]').select2();

            // Init flatpickr
            $('[data-kt-repeater="datepicker"]').flatpickr();


        }
    });
</script>
@endsection
