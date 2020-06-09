<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>@yield('page_header')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/favicon.png')}}">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <style>
          .col-form-label {

            text-align: right;
        }
        </style>
        @yield('additionalCSS')
        @include('layouts._assets.__style')

    </head>

    <body class="left-side-menu-dark">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Topbar Start -->
            @include('layouts._assets.__top_nav_bar')
            <!-- end Topbar -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts._assets.__left_side_menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row page-title align-items-center">
{{--                            <div class="col-sm-4 col-xl-6">--}}
{{--                                <h4 class="mb-1 mt-0">@yield('page_header')</h4>--}}
{{--                            </div>--}}

                        </div>

                    @yield('content')

                    </div>
                </div> <!-- content -->



                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                {{date('Y')}} &copy; STH. All Rights Reserved. Design & Develop <i class='uil uil-heart text-danger font-size-12'></i> by <a href="http://2aitbd.com/" target="_blank">2A IT</a>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

          @include('layouts._assets.__script')
        @yield('additionalJS')
        <!-- App js -->

        <script src="{{asset('assets/admin/js/app.min.js')}}"></script>

    </body>
</html>
