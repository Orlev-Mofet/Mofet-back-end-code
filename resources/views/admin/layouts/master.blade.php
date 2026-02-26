<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <title>{{config("app.name")}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured Multi Store Management System for Colombia" name="description" />
        <meta content="Yuyuan Zhang" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{asset('favicon.png')}}">

        @vite('resources/css/admin/app.css')
        <link href="https://cdn.datatables.net/1.13.5/css/dataTables.tailwindcss.min.css" rel="stylesheet">
        @yield('style')
    </head>

    <body class="dark:bg-zinc-800">
        <div id="loading" class="d-block fixed w-full bg-white top-0 bg-opacity-75" style="z-index: 9999;">
            <div class="load-container">
                <div class="load-box">
                    <div class="loader"><span></span></div>
                    <div class="loader"><span></span></div>
                    <div class="loader"><i></i></div>
                    <div class="loader"><i></i></div>
                </div>
            </div>
        </div>


        <header>
            <!-- Sidenav -->
            @include('admin.layouts.aside')
            <!-- Sidenav -->

            <!-- Navbar -->
            @include('admin.layouts.header')
            <!-- Navbar -->
        </header>

        <!--Main layout-->
        <main class="main-container">
            <div class="max-w-full">
                @yield('content')
            </div>
        </main>

        @include('admin.layouts.utils')
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.5/js/dataTables.tailwindcss.min.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        @vite('resources/js/app.js')

        @yield('script')

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#loading').hide();
            $(document).ajaxStop(function() {
                // Hide loading spinner
                $('#loading').hide();
            });

            @if($errors->any())
                show_toast_message("error", "Validation Error");
            @endif
            @if(session('success'))
                show_toast_message("success", "{{ session('success') }}");
            @endif
            @if(session('info'))
                show_toast_message("info", "{{ session('info') }}");
            @endif
            @if(session('warning'))
                show_toast_message("warning", "{{ session('warning') }}");
            @endif

        </script>
	</body>
</html>
