<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partials.head')
</head>
<body>

    @include('layouts.partials.header')

    <div id="app">


        <main class="page">
            @yield('content')
        </main>
    </div>

    @include('layouts.partials.footer')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>
