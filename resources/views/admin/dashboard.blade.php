@extends('admin.layouts.app')

@section('content')
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">

                {{-- {{dd(Auth::user()->email)}} --}}
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
@endsection
