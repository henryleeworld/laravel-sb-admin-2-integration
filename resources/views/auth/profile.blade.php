@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">{{ __('My profile') }}</h1>
            <div class="row">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-primary alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ $message }}
                        </div>
                    @endif
                    <div class="card">
                        <form action="{{ route('admin.profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body col-lg-8">
                                <div class="input-group mb-3">
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('name')
                                <div class="mb-3 custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="email" name="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('email')
                                <div class="mb-3 custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="password" name="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           placeholder="{{ __('New password') }}">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                <div class="mb-3 custom-control">
                                    <label class="">{{ $message }}</label>
                                </div>
                                @enderror
                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           placeholder="{{ __('New password confirmation') }}"
                                           autocomplete="new-password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
