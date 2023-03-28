<!DOCTYPE html>
<html lang="en">
@include('pages.includes.head')

<body>

    @include('pages.includes.navbar')

    @yield('content')
    <!--footer start-->
    @include('pages.includes.footer')
    <!-- js files -->
    @include('pages.includes.scripts')
</body>

</html>
