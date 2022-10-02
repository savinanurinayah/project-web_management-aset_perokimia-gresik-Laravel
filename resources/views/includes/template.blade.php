<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.header')
</head>

<body id="page-top">
    <div id="wrapper">
        @include('sweetalert::alert')
        <!-- Sidebar -->
        @include('includes.sidebar')
        <!-- Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Navbar -->
                @include('includes.navbar')
                <!-- Navbar -->
                @yield('content')
            </div>
            <!-- Footer -->
            @include('includes.footer')
            <!-- Footer -->
        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('includes.js')
</body>

</html>
