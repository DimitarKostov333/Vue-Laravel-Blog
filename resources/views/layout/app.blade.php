<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('header_scripts.scripts')
</head>
<body>
    <div id="app">
        @include('navigation.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
