@extends('layout')
<section class="vh-100">
    <div class="container py-5 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
            <div class="col-md-8 col-lg-7 col-xl-6">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                    class="img-fluid" alt="Phone image">
            </div>
            <div class="col-md-6 col-lg-5">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h3 class="mb-4">Register</h3>

                    <!-- Name -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required />

                    </div>

                    <!-- Email -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required />

                    </div>

                    <!-- Password -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required />

                    </div>

                    <!-- Confirm Password -->
                    <div class="form-outline mb-4">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" required />

                    </div>
                    <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary btn-block">Register</button>

                </form>


            </div>
        </div>
    </div>
</section>
