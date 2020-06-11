@extends('layouts.app')

@section('style')
    <style>
        .auth-fluid .auth-panel-form {
            max-width: 600px;
            border-radius: 0;
            z-index: 2;
            padding: 3rem 2rem;
            background-color: #ffffff;
            position: relative;
            width: 100%;
        }
    </style>
@endsection
@section('content')


<div class="auth-fluid">
    <div class="auth-panel-form">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">
                <div class="auth-brand text-center text-lg-left">
                    <a href="/">
                        <span><img src="{{ asset('assets/images/logo.png') }}" alt="App_logo"></span>
                    </a>
                </div>
                <h4 class="mt-0 mb-1">Registration</h4>
                <p class="text-muted mb-2">Don't have an account? Create your account hear</p>
                <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs mb-3">
                                    <li class="nav-item">
                                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link  active">
                                            <i class="feather icon-home d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Register</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link">
                                            <i class="feather icon-user d-lg-none d-block mr-1"></i>
                                            <span class="d-none d-lg-block">Profile (Optional)</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="home">
                                        
                                        <div class="row">
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="firstnaem">First Name</label>
                                                <input id="firstnaem" type="text" class="form-control"  name="firstname"  required autocomplete="firstname " autofocus placeholder="First Name">
                                            </div>
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="lastname">Last Name</label>
                                                <input id="lastname" type="lastname" class="form-control" name="lastname"  required autocomplete="lastname" placeholder="Last Name">
                                            </div>
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="company">Company Name</label>
                                            <input id="company" type="text" class="form-control" name="company"  required autocomplete="company" placeholder="Company Name">
                                        </div>

                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="username">User Name</label>
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="User Name">
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="email">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="password">Password</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="password-confirm">Conform Password</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Conform Password" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="profile">
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="address">Address</label>
                                            <input id="address" type="text" class="form-control" name="address"   autocomplete="Address" autofocus placeholder="Address">
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="country">Country</label>
                                                <input id="country" type="text"  placeholder="Country" class="form-control" name="country" >
                                            </div>
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="city">City</label>
                                                <input id="city" type="text" class="form-control" name="city" placeholder="City">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="telnumber">Tel Number</label>
                                                <input id="telnumber" type="number"  placeholder="Tel Number" class="form-control" name="telnumber">
                                            </div>
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="whatsapp">Whatsapp</label>
                                                <input id="whatsapp" type="number"  placeholder="Whatsapp" class="form-control" name="whatsapp"  autocomplete="Whatsapp">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="postalcode">Postal Code</label>
                                                <input id="postalcode" type="text" class="form-control" name="postalcode"   autocomplete="postalcode" placeholder="Postal Code">
                                            </div><div class="form-group mb-2 col-6">
                                                <label class="mb-1" for="paypalmail">Paypal Mail</label>
                                                <input id="paypalmail" type="email"  placeholder="Paypal Mail" class="form-control" name="paypalmail"  autocomplete="Paypal Mail">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="crnumber">Company Register Number</label>
                                            <input id="crnumber" type="text"  placeholder="Company Register Number" class="form-control" name="crnumber"  autocomplete="Company Register Number">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label class="mb-1" for="barname">Bank Account Receiver Name</label>
                                            <input id="barname" type="text"  placeholder="Bank Account Receiver Name" class="form-control" name="barname" autocomplete="Bank Account Receiver Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                        <label class="custom-control-label" for="checkbox-signup">I accept <a href="#!" class="text-muted">Terms &amp; Conditions</a></label>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-8">
                                        <div class="form-group mb-0">
                                            <button class="btn btn-primary btn-block" type="submit"> Register Now </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Already have account? <a href="{{ route('login') }}" class="text-muted ml-1"><b>Log In hear</b></a></p>
                </footer>
            </div>
        </div>
    </div>
</div>
@endsection
