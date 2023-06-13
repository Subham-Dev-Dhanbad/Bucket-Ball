<!doctype html>
<html lang="en">


<!-- Mirrored from themesdesign.in/lexa-ajax/layouts/red/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 10:00:28 GMT -->

<head>

    <meta charset="utf-8" />
    <title>@yield('title', 'Home')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    @include('layouts.style')
</head>


<body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('layouts.header')
        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.side_bar')
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                @yield('content')
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            @include('layouts.footer')
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
   
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    @include('layouts.script')

</body>


<!-- Mirrored from themesdesign.in/lexa-ajax/layouts/red/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 10 Jun 2022 10:00:59 GMT -->

</html>