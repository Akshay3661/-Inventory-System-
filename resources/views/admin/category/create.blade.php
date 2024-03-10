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
            <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data" id="Add_Category">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">

                    {{-- <div class="card-header">
                        <div class="card-title">
                            <h2>Category Add</h2>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Category Name"
                                value="{{old('name')}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Description</label>
                            <textarea name="description" id="description" class="form-control mb-2 @error('description') is-invalid @enderror" rows="5" placeholder="Description"></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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

                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.category')}}" id="kt_ecommerce_add_product_cancel"
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
