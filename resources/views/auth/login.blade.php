@extends('layouts.app')

@section('style')
@endsection
    

@section('content')

<div class="auth-fluid">
    <div class="auth-side-img text-center">
    </div>
    <div class="auth-panel-form">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">
                <div class="auth-brand text-center text-lg-left">
                    <a href="/">
                        <span><img src="{{ asset('assets/images/logo.png') }}" alt="App_Logo"></span>
                    </a>
                </div>
                <h4 class="mt-0">Login</h4>
                <p class="text-muted mb-4">Please login hear to access account.</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="emailaddress">{{ __('E-Mail Address') }}</label>
                        <input id="emailaddress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <a href="pages-recoverpw-img.html" class="text-muted float-right"><small>Forgot your password?</small></a>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="remember" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
                <footer class="footer footer-alt">
                    <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-muted ml-1"><b>Sign Up hear</b></a></p>
                </footer>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    
@endsection