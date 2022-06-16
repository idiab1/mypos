@extends('layouts.app')

{{-- Navbar --}}
@section('navbar') @endsection

@section('content')
<!-- Sign Page -->
<section class="login-page sign-page">
    <div class="container">
        <div class="row m-0">
            <div class="col-10 m-auto">
                <!-- Sign Content -->
                <div class="sign-content">
                    <div class="row justify-content-centr m-auto">
                        <div class="col-md-5 p-0">
                            <!-- Sign info -->
                            <div class="card sign-info">
                                <div class="card-body">
                                    <h3 class="m-0">Logo</h3>
                                </div>
                            </div>
                            <!-- End of Sign info -->
                        </div>
                        <div class="col-md-7 p-0">
                            <!-- Sign Form -->
                            <div class="card sign-form">
                                <!-- Card Header -->
                                <div class="card-header text-center">
                                    <h4>{{ __('Login') }}</h4>
                                </div>
                                <!-- End of Card Header -->

                                <!-- Card Body -->
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email" class="text-md-right">{{ __('E-Mail Address') }}</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- End of Email -->

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password" class="text-md-right">
                                                {{ __('Password') }}
                                            </label>

                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!-- End of Password -->


                                        <div class="form-group">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>

                                        </div>

                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-crayons btn-login">
                                                {{ __('Login') }}
                                            </button>

                                            {{-- @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif --}}
                                        </div>
                                    </form>
                                </div>
                                <!-- End of Card Body -->
                            </div>
                            <!-- End of Sign Form -->
                        </div>
                    </div>
                </div>
                <!-- End of Sign Content -->
            </div>
        </div>
    </div>
</section>
<!-- End of Sign Page -->
@endsection
