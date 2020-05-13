<!DOCTYPE html>
<html lang="zxx">
    @include('layouts.partials._header')
    <body>
        @yield('content')
    </body>
    @if(!Request::is('home'))
        @include('layouts.partials._footer')
    @endif
        @include('layouts.partials._scripts')
</html>