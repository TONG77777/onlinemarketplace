@extends('layouts.layout')
@section('content')
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">{{ __('Create an Account') }}</h5>
                                    <p class="text-center small">{{ __('Enter your details to create account') }}</p>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate>
                                    @csrf
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">{{ __('User Name') }}</label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="userEmail" class="form-label">{{ __('Email Address') }}</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>

                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-register w-100">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">{{__('Already have an account?')}} <a href="{{ route('login') }}">{{__('Log in')}}</a>
                                        </p>
                                    </div>
                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

    </div>
@endsection
