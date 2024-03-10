@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{route('admin.permissions.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">

                    <div class="card-header">
                        <div class="card-title">
                            <h2>Permission Add</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Permission Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Permission Name"
                                value="{{old('name')}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Label</label>
                            <input type="text" name="label" id="label" class="form-control mb-2 @error('label') is-invalid @enderror" placeholder="Label"
                                value="{{old('label')}}" />
                                @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-10 fv-row">
                            <label class="required form-label">Group Name</label>
                            <input type="text" name="group_name" id="group_name" class="form-control mb-2 @error('group_name') is-invalid @enderror" placeholder="Group Name"
                                value="{{old('group_name')}}" />
                                @error('group_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>


                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('admin.permissions.list')}}" id="kt_ecommerce_add_product_cancel"
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
