<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8" />
     <title>@yield('title')</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
     <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/admin/favicon.png')}}">
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    @include('layouts._assets.__style')
</head>
<body class="authentication-bg">
    <div class="account-pages my-5" style="margin-top: 48px !important; margin-bottom: 15px !important;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    @yield('content')
                                </div>
                            </div> <!-- end card-body -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
@include('layouts._assets.__script')
</body>
</html>
