@extends('layouts.main')

@section('main')

<div class="selector-bg df dfc jcc aic" style="min-height: 100vh">
    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-md-4 offset-md-1 mt-4">
                <div class="main-box df dfc jcc">
                    <h1 class="selector-icon"><i class="uil uil-shield"></i></h1>
                    <h1 class="display-5 text-light text-center">Admin Galaxy</h1>
                    <a href="/admin/members" class="btn btn-lg btn-outline-light mt-4"><i class="uil uil-rocket"></i> Launch</a>
                </div>
            </div>
            <div class="col-md-4 offset-md-2 mt-4">
                <div class="main-box  df dfc jcc">
                    <h1 class="selector-icon"><i class="uil uil-newspaper"></i></h1>
                    <h1 class="display-5 text-light text-center">Reporter Galaxy</h1>
                    <a href="/reporter/news" class="btn btn-lg btn-outline-light mt-4"><i class="uil uil-rocket"></i> Launch</a>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .selector-bg {
        background-image: url('/rsx/db-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .main-box{
        min-height: 50vh;
        background-color: rgba(0, 0, 0, 0.6);
        padding: 20px;
        backdrop-filter: blur(5px); /* Blur effect */
        border-radius: 20px;

    }

    .selector-icon{
        font-size: 12rem;
        color: white;
        text-align: center;
    }
</style>

@endsection