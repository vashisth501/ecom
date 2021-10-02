@include('admin.layout.header')
<div id="wrapper">
    @include('admin.layout.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            <!-- TopBar -->
        @include('admin.layout.navbar')
        <!-- Topbar -->
        @yield('content')
        <!-- Container Fluid-->
        {{--@include('admin.layout.container')--}}
        <!---Container Fluid-->
        </div>
        <!-- Footer -->

        <!-- Footer -->
    </div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@include('admin.layout.footer')
