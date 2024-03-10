@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
        <div id="kt_app_content_container" class="app-container container-xxl">

            {{-- <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10 mb-5">
                <div class="card card-flush ">
                    <div class="card-header">
                        <div class="card-title">
                            <h2>Employee Update</h2>
                        </div>
                    </div>
                </div>
            </div> --}}
            <form action="{{route('admin.employee.update',['id'=> $employee->id])}}" method="post" enctype="multipart/form-data" id="Edit_Employee">
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
                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        {{-- <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Image</label><br>
                                            <img src=" {{ asset('employee_image/'.$employee->image) }}" style="width:80px;height:80px" class="">
                                            <input type="file" name="image" id="image" class="form-control mb-2" placeholder="Employee Id">
                                        </div> --}}
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Image</label>
                                            {{-- <input type="file" name="image" id="image" class="form-control mb-2  @error('image') is-invalid @enderror" placeholder="Employee Id"> --}}
                                            <div class="card-body text-center pt-0">
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url('{{ asset('employee_image/'.$employee->image) }}');
                                                    }
                                                    [data-bs-theme="dark"] .image-input-placeholder {
                                                        background-image: url('{{ asset('employee_image/'.$employee->image) }}');
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
                                                    <input class="form-check-input me-0" name="status" type="radio" value="Active" id="status" {{$employee->status == 'Active' ? 'checked':''}} />

                                                    <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                                        <div class="fw-bold text-gray-800">Active</div>
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-custom form-check-solid">
                                                    <input class="form-check-input me-0" name="status" type="radio" value="Inactive" id="status" {{$employee->status == 'Inactive' ? 'checked':''}} />
                                                    <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                                        <div class="fw-bold text-gray-800">InActive</div>
                                                    </label>
                                                </div>
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
                                                    <input type="text" name="fname" id="fname" class="form-control mb-2 @error('fname') is-invalid @enderror" placeholder="First name" value="{{$employee->fname}}" >
                                                </div>

                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Last Name</label>
                                                    <input type="text" name="lname" id="lname" class="form-control mb-2" placeholder="Last name" value="{{$employee->lname}}">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Gender</label>
                                                    <div class="d-flex fv-row mb-5">
                                                        <div class="form-check form-check-custom form-check-solid me-10">
                                                            <input class="form-check-input me-0" name="gender" type="radio" value="Male" id="gender" {{$employee->gender == 'Male' ? 'checked':''}} />

                                                            <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                                                <div class="fw-bold text-gray-800">Male</div>
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            <input class="form-check-input me-0" name="gender" type="radio" value="Female" id="gender" {{$employee->gender == 'Female' ? 'checked':''}} />
                                                            <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                                                <div class="fw-bold text-gray-800">Female</div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Date Of Birth</label>
                                                    <input type="date" name="dob" id="dob" class="form-control mb-2" placeholder="Last name"  value="{{$employee->dob}}">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Email</label>
                                                    <input type="text" name="email" id="email" class="form-control mb-2" placeholder="Email" value="{{$employee->email}}">
                                                </div>
                                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                                    <label class="required form-label">Mobile No</label>
                                                    <input type="number" name="mono" id="mono" maxlength="10" onkeypress="return event.charCode>=48 && event.charCode<=57" class="form-control mb-2" placeholder="Mobile No" value="{{$employee->mono}}">
                                                </div>
                                            </div>
                                            <div class="mb-10 fv-row">
                                                <label class="required form-label">Department</label>
                                                <input type="text" name="department" id="department" class="form-control mb-2" placeholder="Deparment" value="{{$employee->department}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- {{dd($employee->products)}} --}}
                        <div class="card border-0">
                            <div class="card-header p-0 cursor-pointer" >
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">Assinged Products</h3>
                                </div>
                            </div>

                            <div id="kt_account_settings_signin_method" class="collapse show">


                                <div class="card-body border-top p-9">
                                    <div class="row mb-5">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Product</label>
                                            <select class="form-select" id="product" name="product">
                                                {{-- <select class="form-select" multiple aria-label="multiple select example" name="product[]" id="product"> --}}
                                                <option>-----  Product  -----</option>
                                                @foreach ($product as $products )
                                                    <option value="{{$products->id}}" {{$employee->product_id == $products->id ? 'selected':''}}>{{$products->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Assign date</label>
                                            <input type="date" name="assigndate" id="assigndate" class="form-control mb-2" value="{{$employee->assigndate}}" >
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control mb-2" placeholder="Quantity" value="{{$employee->quantity}}">
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            <label class="required form-label">Condition</label>
                                            <input type="text" name="condition" id="condition" class="form-control mb-2" placeholder="Condition" value="{{$employee->condition}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.employee.list')}}" id="kt_ecommerce_add_product_cancel"
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
