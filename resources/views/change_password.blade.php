@extends('layouts.main')
@section('main')

<div class="vh-100 df dfc jcc aic footer-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="pc-card">
                    <h1 class="display-6 text-center text-light">CHANGE YOUR PASSWORD</h1>
                    <p class="text-center">
                        <code>{{$member->name}}</code>                        
                    </p>
                    <hr>
                    <form action="/changepassword" method="post" class="df dfc jcc">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @csrf
                        <div class="form-floating">
                            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="form-floating mt-2">
                            <input name="password_confirmation" type="password" class="form-control" id="floatingConfirmPassword" placeholder="Confirm Password">
                            <label for="floatingConfirmPassword">Confirm Password</label>
                        </div>
                        <input type="text" hidden name="member_id" value="{{$member->id}}">
                        <button type="submit" class="btn btn-lg btn-outline-light mt-3">Change Password</button>
                    </form>
                    @if ($errors->any())
                        <div class="alert alert-danger mt-3">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .pc-card {
        background-color: rgba(0, 0, 0, 0.4);
        padding: 20px;
        backdrop-filter: blur(5px); /* Blur effect */
        border-radius: 10px;
        box-shadow: 0 0 100px rgba(255, 255, 255, 0.4);
        min-height: 40vh;
    }
</style>

@endsection