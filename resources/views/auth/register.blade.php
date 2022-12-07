@extends('layouts.app')

@section('content')
<div class="container-fluid register">
    <div class="row justify-content-center register-location">
        <div class="col-md-6">
            <div class="card register-item">
                <div class="card-header register-title">{{ __('message.sign_up') }} HapoLearn</div>
                @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="username" class="col-md-4 col-form-label text-md-left p-0 register-label">{{
                                    __('message.username') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="username" type="username"
                                    class="form-control @error('username') is-invalid @enderror register-input"
                                    name="username" value="{{ old('username') }}" autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="email" class="col-md-4 col-form-label text-md-left p-0 register-label">{{
                                    __('Email') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="email"
                                    class="form-control @error('email') is-invalid @enderror register-input"
                                    value="{{ old('email') }}" name="email" autocomplete="current-email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 col-form-label text-md-left p-0 register-label">{{
                                    __('message.password') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror register-input"
                                    name="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password_confirm"
                                    class="col-md-4 col-form-label text-md-left p-0 register-label">{{
                                    __('message.confirm_password') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="password_confirm" type="password"
                                    class="form-control @error('confirm_password') is-invalid @enderror register-input"
                                    name="password_confirmation">

                                @error('confirm_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="from-group row mt-5 justify-content-center">
                            <button type="submit" class="btn btn-register">
                                {{ __('message.sign_up') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
