<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('bootstrapdashboard/favicon.ico') }}">

    <title>@yield('title') - MarkiBlog</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('bootstrapdashboard/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('bootstrapdashboard/dashboard.css') }}" rel="stylesheet">

    <!-- toastr styles -->
    <link href="{{ asset('toastr/toastr.min.css') }}" rel="stylesheet">
    @yield('css')
</head>
<body>
    @include('dashboard.dashboard_header')
    <div class="container-fluid">
        <div class="row">
            @include('dashboard.sidebar')
            <main role="main" class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    <script src="{{ asset('bootstrapdashboard/dist/js/bootstrap.min.js') }}"></script>
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        feather.replace()
    </script>
    <script type="text/javascript">
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.showDuration = '300';
    </script>

    <!-- dashboard -->
    <script src="{{ asset('bootstrapdashboard/dist/js/dashboard.js') }}"></script>
    @yield('script')
</body>
</html>
