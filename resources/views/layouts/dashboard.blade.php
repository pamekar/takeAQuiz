@php
    $public='';
    if(App::environment('production')&& config('app.isSharedHosting'))
    $public ='public';
@endphp
        <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{asset($public.'/dashboard/png/favicon.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset($public.'/png/favicon-192x192.png')}}">
    <link rel="apple-touch-icon" sizes="180x180"
          href="{{asset($public.'/dashboard/png/apple-touch-icon-180x180.png')}}">
    <link rel="stylesheet" id="css-main" href="{{asset($public.'/dashboard/css/codebase.min-1.4.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset($public.'/dashboard/css/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset($public.'/css/sweetalert.min.css')}}">
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
<script src="{{asset($public.'/dashboard/js/codebase.min-1.4.js')}}"></script>
<script src="{{asset($public.'/dashboard/js/be_pages_dashboard.js')}}"></script>
<script src="{{asset($public.'/dashboard/js/datatables.min.js')}}"></script>
<script src="{{asset($public.'/js/sweetalert.min.js')}}"></script>
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