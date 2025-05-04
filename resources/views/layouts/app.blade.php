<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Plantopia</title>
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')
</body>
</html>
