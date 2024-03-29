@extends('layouts.guest')
@section('content')
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Welcome Back!') }}</h1>
                                </div>
                                <form action="{{ route('login') }}" method="post" class="user">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control form-control-user @error('email') is-invalid @enderror"
                                               id="email" aria-describedby="emailHelp"
                                               placeholder="{{ __('Enter Email Address') }}" required autocomplete="email" autofocus>
                                    </div>
                                    @error('email')
                                    <div class="mb-3 custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                    @enderror
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                               id="password" placeholder="{{ __('Password') }}" required autocomplete="current-password">
                                    </div>
                                    @error('password')
                                    <div class="mb-3 custom-control">
                                        <label class="">{{ $message }}</label>
                                    </div>
                                    @enderror
                                    <div class="mb-3">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Login') }}
                                    </button>
                                </form>
                                <hr>
                                @if (Route::has('password.request'))
                                <div class="text-center">
                                    <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                </div>
                                @endif
                                @if (Route::has('register'))
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">{{ __('Create New Account!') }}</a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
