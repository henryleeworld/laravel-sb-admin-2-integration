@extends('layouts.guest')
@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('Create an Account!') }}</h1>
                        </div>
                        <form class="user" action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control form-control-user @error('name') is-invalid @enderror" id="name"
                                       placeholder="{{ __('Name') }}" required autocomplete="name" autofocus>
                            </div>
                            @error('name')
                            <div class="mb-3 custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                                       placeholder="{{ __('Email Address') }}" required autocomplete="email">
                            </div>
                            @error('email')
                            <div class="mb-3 custom-control">
                                <label class="">{{ $message }}</label>
                            </div>
                            @enderror
                            <div class="row mb-3">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                           id="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                                </div>
                                @error('password')
                                <div class="mb-3 custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation" class="form-control form-control-user @error('password_confirmation') is-invalid @enderror"
                                           id="password-confirm" placeholder="{{ __('Repeat Password') }}" required autocomplete="new-password">
                                </div>
                                @error('password_confirmation')
                                <div class="mb-3 custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                {{ __('Register Account') }}
                            </button>
                        </form>
                        <hr>
                        @if (Route::has('password.request'))
                        <div class="text-center">
                            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                        </div>
                        @endif
                        @if (Route::has('login'))
                        <div class="text-center">
                            <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Login!') }}</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
