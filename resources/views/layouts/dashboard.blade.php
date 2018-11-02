<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset('/png/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('/png/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset('/png/apple-touch-icon-180x180.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('/css/greenwhitedev.min-1.4.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/sweetalert.min.css')}}">
    @yield('styles')
</head>
<body>
<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed page-header-inverse main-content-boxed">
    @include('layouts.partials.nav')
    @include('layouts.partials.header')
    <main id="main-container">
        @yield('content')
    </main>
    @include('layouts.partials.footer')
</div>
<script src="{{asset('/js/greenwhitedev.min-1.4.js')}}"></script>
<script src="{{asset('/js/be_pages_dashboard.js')}}"></script>
<script src="{{asset('/js/datatables.min.js')}}"></script>
<script src="{{asset('/js/sweetalert.min.js')}}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
        @if(!null == session('status') && !null == session('status'))
        swal("Status", "{!!session('status')!!}", "{!!session('state')!!}");
        @endif
        $('.datatable').DataTable();
    });

</script>
@yield('scripts')
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{csrf_field()}}
</form>
</body>

</html>