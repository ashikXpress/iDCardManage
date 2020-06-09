@extends('layouts.login')
@section('title')
    Login
@endsection
@section('content')

    <div class="col-md-12 p-5" >
        <div class="" >
            <a href="#">
                <img style="width: 60px;height: 60px;object-fit: contain;}" src="{{asset('assets/admin/army_logo.png')}}" alt="" height="24" />
                <h3 style="font-size: 15px;" class="d-inline align-middle ml-1 text-logo">station headquarters dhaka </h3>
            </a>
        </div>

        <h1 class="h5 mb-0 mt-2 mb-2">Please Login</h1>

        <form method="POST" action="{{ route('login') }}" class="authentication-form">
            @csrf
            <div class="form-group">
                <label for="email" class="form-control-label">Email Address</label>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                          <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                    @enderror

                </div>
            </div>

            <div class="form-group mt-4">
                <label for="password" class="form-control-label">Password</label>
                <a href="{{ route('password.request') }}" class="float-right text-muted text-unline-dashed ml-1">Forgot your password?</a>
                <div class="input-group input-group-merge">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                         <i class="fa fa-lock" aria-hidden="true"></i>

                        </span>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                     </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-4">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember me</label>
                </div>
            </div>

            <div class="form-group mb-0 text-center">
                <button class="btn btn-primary btn-block" type="submit"> Log In
                </button>
            </div>
        </form>
        <div class="py-3 text-center"><span class="font-size-16 font-weight-bold">Design & Develop</span></div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="http://2aitbd.com" target="_blank">
                    <img style="width: 109px;height: 55px;" src="{{asset('assets/admin/2ait.png')}}" alt="">
                </a>
            </div>

        </div>
    </div>


@endsection
