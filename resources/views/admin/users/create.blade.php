@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{route('admin.users.store')}}" method="post" enctype="multipart/form-data" id="User_manage">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">

                    {{-- <div class="card-header">
                        <div class="card-title">
                            <h2>Add New User</h2>
                        </div>
                    </div> --}}
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Name"
                                value="{{old('name')}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="text-danger">@error('name'){{$message}}@enderror</span>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control mb-2 @error('username') is-invalid @enderror" placeholder="Username"
                                value="{{old('username')}}" />
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="text-danger">@error('username'){{$message}}@enderror</span>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control mb-2 @error('email') is-invalid @enderror" placeholder="Email"
                                value="{{old('email')}}" />
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="text-danger">@error('email'){{$message}}@enderror</span>
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control mb-2 @error('password') is-invalid @enderror" placeholder="Password"
                                />
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Mobile No</label>
                            <input type="number" name="mono" id="mono" class="form-control mb-2  @error('mono') is-invalid @enderror" placeholder="Mobile No"  value="{{old('mono')}}">
                            @error('mono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="text-danger">@error('mono'){{$message}}@enderror</span>
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Employee Id</label>
                            <input type="text" name="emp_id" id="emp_id" class="form-control mb-2  @error('emp_id') is-invalid @enderror" placeholder="Employee Id"  value="{{old('emp_id')}}">
                            @error('emp_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="text-danger">@error('emp_id'){{$message}}@enderror</span>
                        </div>

                        <div class="mb-10 fv-row">
                            {{-- <label class="required form-label">Image</label> --}}
                            {{-- <input type="file" name="image" id="image" class="form-control mb-2  @error('image') is-invalid @enderror" placeholder="Employee Id"  value="{{old('image')}}"> --}}
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
                            <span class="text-danger">@error('image'){{$message}}@enderror</span>
                        </div>
                    </div>

                    {{-- <div class="mb-10 fv-row">
                        <select class="form-select" multiple aria-label="multiple select example" name="roles[]" id="roles">
                            @foreach ($roles as $role)
                            <option value="{{$role}}">{{$role}}</option>
                            @endforeach
                        </select>
                    </div> --}}


                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.users')}}" id="kt_ecommerce_add_product_cancel"
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
