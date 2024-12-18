@extends('layout')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h3 class="mb-4">Login</h3>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control form-control-lg" required />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control form-control-lg" required />

                    </div>

                    <!-- Checkbox -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember" />
                        <label class="form-check-label"> Remember me </label>

                    </div>
                    <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>

            </div>
        </div>
    </div>
</section>
