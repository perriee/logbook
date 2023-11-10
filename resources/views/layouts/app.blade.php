<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    @include('layouts.partials.head')

</head>

<body>
    <div class="flex flex-col min-h-screen px-64 bg-slate-800">
        @include('layouts.partials.navbar')
        <main class="h-full my-6">
            @yield('content')
        </main>
    </div>

    @stack('javascript')
</body>

</html>
