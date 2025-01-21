<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Permanent+Marker&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        @yield('script_top')
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row vh-100">
        <!-- Left Navigation Area -->
        <div class="col-2 bg-light d-flex flex-column">
            @include('left_menu')
        </div>

        <!-- Right Area -->
        <div class="col-10 d-flex flex-column">
            <!-- Header Area -->
            <div class="bg-secondary text-white py-3 text-center">
                <span class="display-1 splash-regular">@lang('messages.main.title')</span>
                <!-- Header content will go here -->
            </div>
            <!-- Content Area -->
            <div class="flex-grow-1 bg-white">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@yield('script_bottom')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
