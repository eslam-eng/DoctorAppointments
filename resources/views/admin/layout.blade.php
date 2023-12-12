<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta content='{{__("message.System Name")}}' name="description"/>
    <meta content='{{__("message.System Name")}}' name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:title" content='{{__("message.System Name")}}'/>
    <meta property="og:image" content="{{Session::get('favicon')}}"/>
    <meta property="og:image:width" content="250px"/>
    <meta property="og:image:height" content="250px"/>
    <meta property="og:site_name" content='{{__("message.System Name")}}'/>
    <meta property="og:description" content='{{__("message.meta_description")}}'/>
    <meta property="og:keyword" content='{{__("message.Meta Keyword")}}'/>
    <link href="{{asset('/admin_design/layouts/vertical/assets/libs/dropzone/min/dropzone.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="shortcut icon" href="{{Session::get('favicon')}}"/>
    <link href="{{asset('/admin_design/layouts/vertical/assets/css/bootstrap.min.css')}}" id="bootstrap-style"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_design/layouts/vertical/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet"
          href="{{asset('/admin_design/layouts/vertical/assets/libs/twitter-bootstrap-wizard/prettify.css')}}"/>
    @if(__("message.RTL")==0)
        <link href="{{asset('/admin_design/layouts/vertical/assets/css/app-rtl.min.css')}}" id="app-style"
              rel="stylesheet" type="text/css"/>
    @else
        <link href="{{asset('/admin_design/layouts/vertical/assets/css/app.min.css')}}" id="app-style" rel="stylesheet"
              type="text/css"/>
    @endif
    <link
        href="{{asset('/admin_design/layouts/vertical/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>
    <link
        href="{{asset('/admin_design/layouts/vertical/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>
    <link
        href="{{asset('/admin_design/layouts/vertical/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css"/>
    <link href="{{asset('/admin_design/layouts/vertical/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css"/>
    <link rel="stylesheet" href="{{asset('admin_design/layouts/vertical/assets/css/toaster.min.css')}}"/>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key={{Config::get("mapdetail.key")}}&sensor=false&libraries=places'></script>
    <link href="{{asset('admin_design/layouts/vertical/assets/css/font-awesome.min.css')}}"/>
    <script src="{{asset('admin_design/layouts/vertical/assets/js/font-awesome.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin_design/layouts/vertical/assets/css/sweetalert.min.css')}}">
    @yield('css')

    @livewireStyles
</head>
<body>
<div id="layout-wrapper">
    @include('admin.included.header')
    @include('admin.included.sidebar')
    @yield('content')
    @include('admin.included.footer')
</div>
</div>
@include('admin.included.scripts')
<script>
    function disablebtn() {
        alert("This Action Disable In Demo");
    }
</script>

@include('admin.inc.toast')

@yield('footer')
@livewireScripts
</body>
</html>
