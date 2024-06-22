@extends('layouts.main')
@section('main')

<div class="vh-100 login-bg df dfc jcc aic">

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login_card">
                    <h2 class="text-center display-2 text-light">FIS LOGIN</h2>
                    <p class="lead text-center text-light">
                        Login to your account
                    </p>
                    <div class="container mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/login" method="post" class="df dfc">
                                    @csrf
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @elseif (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input name="sid" type="number" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Student ID</label>
                                      </div>
                                      <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                      </div>
                                    <button type="submit" class="btn btn-lg btn-outline-light mt-3">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
    .login-bg {
        background-image: url('/rsx/login-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .login_card {
        background-color: rgba(0,0,0, 0.4);
        padding: 20px;
        backdrop-filter: blur(5px); /* Blur effect */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 1, 0, 100);
        min-height: 40vh;
    }
</style>

@endsection