@php
    $logo = \App\Models\Setting::find(1);
    // $logo = \App\Models\Setting::first();
    // if(isset($logo->id)){
    //     $logo = \App\Models\Setting::find($logo->id);
    //     //dd($logo->id)
    // }else{

    // }
@endphp

<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href=""/>
        @if(isset($logo->site_title))
        <title>@if(isset($logo->site_title)) {{$logo->site_title }} @endif</title>
        @else
        <title>Metronic</title>
        @endif
		<meta charset="utf-8" />
		<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
		<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
		<meta property="og:url" content="https://keenthemes.com/metronic" />
		<meta property="og:site_name" content="Keenthemes | Metronic" />
		<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
        {{-- <link rel="shortcut icon" href="{{asset('admin/img/fav_logo.png')}}" /> --}}
        {{-- <link rel="shortcut icon" href="{{asset('admin/dist/assets/media/logos/favicon.ico')}}" /> --}}
        @if(isset($logo->fav_icon))
        <link rel="shortcut icon" href="@if(isset($logo->fav_icon)) {{ asset('site_image/'.$logo->fav_icon) }} @endif" style="width: 100px;height:100px;" />
        @else
        <link rel="shortcut icon" href="{{asset('admin/dist/assets/media/logos/favicon.ico')}}" />
        @endif
		<!--begin::Fonts(mandatory for all pages)-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<!--begin::Vendor Stylesheets(used for this page only)-->
		<link href="{{asset('admin/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/dist/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Vendor Stylesheets-->
		<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
		<link href="{{asset('admin/dist/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin/dist/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('css/customecss.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

	</head>
