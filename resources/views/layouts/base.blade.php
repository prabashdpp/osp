<!DOCTYPE html>
<html lang="en">

<head>
    @section('header')
    @include('layouts.partials.header-scripts')
    @show
</head>
@include('layouts.partials.nav')
@yield('content')
@include('layouts.partials.footer')
@section('footer')
@include('layouts.partials.footer-scripts')
@show
</body>

</html>