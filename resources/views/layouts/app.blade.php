<!DOCTYPE html>
<html lang="zxx">
    @include('layouts.partials._header')
    <body onload="window.history.forward();">
        @yield('content')
    </body>
    @include('layouts.partials._footer')
    @include('layouts.partials._scripts')
</html>