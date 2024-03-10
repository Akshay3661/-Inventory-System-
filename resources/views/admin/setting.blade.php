@extends('admin.layouts.app')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
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

        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">

                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    {{-- <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Settings</h3>
                        </div>
                        <!--end::Card title-->
                    </div> --}}
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form action="{{route('admin.setting.store')}}" method="post" enctype="multipart/form-data" id="Setting">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    {{-- <div class="d-flex flex-wrap gap-5">
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Logo</label> <br>
                                            <img alt="Logo" src="@if(isset($setting->site_logo)) {{ asset('site_image/'.$setting->site_logo) }} @endif" class="h-25px mb-5" />
                                            <input type="file" name="site_logo" id="site_logo" class="form-control mb-2" placeholder="Product name" value="" />
                                        </div>
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Fav Icon</label> <br>
                                            <img alt="Logo" src="@if(isset($setting->fav_icon)) {{ asset('site_image/'.$setting->fav_icon) }} @endif" class="h-25px mb-5" />
                                            <input type="file" name="fav_icon" id="fav_icon" class="form-control mb-2" placeholder="Product name" value="" />
                                        </div>
                                    </div> --}}
                                    <div class="row mb-5">
                                        <div class="col-lg-6  fv-plugins-icon-container">
                                            <label class="required form-label">Logo</label>
                                            {{-- <input type="file" name="image" id="image" class="form-control mb-2  @error('image') is-invalid @enderror" placeholder="Employee Id"> --}}
                                            <div class="card-body text-center pt-0">
                                                <style>
                                                    .image-input-placeholder1 {
                                                        background-image: url('@if(isset($setting->site_logo)) {{ asset('site_image/'.$setting->site_logo) }} @endif');
                                                    }
                                                    [data-bs-theme="dark"] .image-input-placeholder1 {
                                                        background-image: url('@if(isset($setting->site_logo)) {{ asset('site_image/'.$setting->site_logo) }} @endif');
                                                    }
                                                </style>
                                                <div class="image-input image-input-outline image-input-placeholder1 mb-3 image-input-empty" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-100px h-100px" style=""></div>
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                            <i class="ki-outline ki-pencil fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="site_logo" id="site_logo" accept=".png, .jpg, .jpeg" >
                                                            <input type="hidden" name="site_logo" value="0">
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
                                            @error('site_logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="col-lg-6  fv-plugins-icon-container">
                                            <label class="required form-label">Fav Icon</label>
                                            {{-- <input type="file" name="image" id="image" class="form-control mb-2  @error('image') is-invalid @enderror" placeholder="Employee Id"> --}}
                                            <div class="card-body text-center pt-0">
                                                <style>
                                                    .image-input-placeholder {
                                                        background-image: url('@if(isset($setting->fav_icon)) {{ asset('site_image/'.$setting->fav_icon) }} @endif');
                                                    }
                                                    [data-bs-theme="dark"] .image-input-placeholder {
                                                        background-image: url('@if(isset($setting->fav_icon)) {{ asset('site_image/'.$setting->fav_icon) }} @endif');
                                                    }
                                                </style>
                                                <div class="image-input image-input-outline image-input-placeholder mb-3 image-input-empty" data-kt-image-input="true">
                                                    <div class="image-input-wrapper w-100px h-100px" style=""></div>
                                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-bs-original-title="Change avatar" data-kt-initialized="1">
                                                            <i class="ki-outline ki-pencil fs-7"></i>
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="fav_icon" id="fav_icon" accept=".png, .jpg, .jpeg" >
                                                            <input type="hidden" name="fav_icon" value="0">
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
                                            @error('fav_icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap gap-5">
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Site Title</label>
                                            <input type="text" name="site_title" id="site_title" class="form-control mb-2 @error('site_title') is-invalid @enderror" placeholder="Site Title" value="@if(isset($setting->site_title)){{$setting->site_title}}@endif"/>
                                            @error('site_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email</label>
                                            <input type="text" name="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" placeholder="Site Email" value="@if(isset($setting->email)){{$setting->email}}@endif"/>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex flex-wrap gap-5">
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Mobile No</label>
                                            <input type="number" name="mobile_no" id="mobile_no" class="form-control mb-2 @error('mobile_no') is-invalid @enderror" placeholder="Mobile No" value="@if(isset($setting->mobile_no)){{$setting->mobile_no}}@endif"/>
                                            @error('mobile_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Footer Text</label>
                                            <input type="text" name="footer_text" id="footer_text" class="form-control mb-2 @error('footer_text') is-invalid @enderror" placeholder="Footer Text" value="@if(isset($setting->footer_text)){{$setting->footer_text}}@endif"/>
                                            @error('footer_text')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap gap-5">
                                        <div class=" w-100 flex-md-root mb-3">
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Address</label>
                                            <textarea name="address" id="address" class="form-control mb-2 @error('address') is-invalid @enderror" placeholder="Address">@if(isset($setting->address)){{$setting->address}}@endif</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        {{-- <form action="{{route('admin.setting.store')}}" method="post" enctype="multipart/form-data" id="kt_account_profile_details_form" class="form" >
                            @csrf
                            <button type="submit" name="submit" class="btn btn-primary">Save Changes12</button>
                        </form> --}}
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>

            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
