@extends('admin.layouts.app')

@section('content')
    <div id="kt_app_content" class=" flex-column-fluid mt-10 mb-10">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{route('admin.roles.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="card card-flush py-4">

                    <div class="card-header">
                        <div class="card-title">
                            <h2>Role Add</h2>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-10 fv-row">
                            <label class="required form-label">Role Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-2 @error('name') is-invalid @enderror" placeholder="Role name"
                                value="{{old('name')}}" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        {{-- <div class="mb-10 fv-row">
                            <label class="required form-label">Role Guard Name</label>
                            <input type="text" name="guard_name" id="guard_name" class="form-control mb-2 @error('guard_name') is-invalid @enderror" placeholder="Product name"
                                value="{{old('guard_name')}}" />
                                @error('guard_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> --}}

                        {{-- <div class="mb-10 fv-row">
                            <label class="required form-label">Permission</label>
                            <br>
                            @foreach($permission as $value)
                            {{$value[0]['group_name']}}
                                @foreach($value as $vv)

                                    <label>{{ Form::checkbox('permission[]', $vv->id, false, array('class' => 'name')) }}
                                    {{ $vv->label }}</label>
                                @endforeach
                            <br/>
                            @endforeach
                        </div> --}}
                        <div class="col-sm-12">
                            <h4>Role Permissions</h4>
                            <div class="table-responsive">
                              <table class="table table-flush-spacing">
                                <tbody>
                                  @foreach($permission as $value)
                                  <tr>
                                    <td class="text-nowrap fw-medium"> {{$value[0]['group_name']}}</td>
                                    <td scope="col"><input type="checkbox"
                                        class="select-permission select-all-module-permissions select-all-{{ $value[0]->group_name }}-permissions"
                                        data-class="select-all-{{ $value[0]->group_name }}-permissions">{{ $value[0]->group_name }}
                                    </td>
                                    @foreach($value as $permission_data)
                                    <td>
                                      <div class="d-flex">
                                        <div class="form-check ">
                                          <input class="select-permission select-module-permission select-{{ $permission_data->group_name }}-permission"
                                          data-class="select-{{ $permission_data->group_name }}-permission" type="checkbox" id="permission{{ $permission_data->id }}" name="permission[]" value="{{ $permission_data->id }}">
                                          <label class="form-check-label" for="permission{{ $permission_data->id }}">
                                            {{ $permission_data->label }}
                                          </label>
                                        </div>
                                      </div>
                                    </td>
                                    @endforeach
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>

                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('admin.roles.list')}}" id="kt_ecommerce_add_product_cancel"
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
