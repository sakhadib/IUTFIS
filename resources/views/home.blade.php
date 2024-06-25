@extends('layouts.main')
@section('main')
    <div class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 vh-100 home-bg-1 df dfc jcc aic">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 df dfc jcc aic">
                                <img src="/rsx/logo.svg" alt="" width="200px">
                                <h1 class="display-1 text-light text-center mt-5">#LookUpToWonder</h1>
                                <h1 class="text-center text-light">IUT Al-Fazari Interstellar Society</h1>
                                <a href="#more" class="btn btn-lg btn-outline-light mt-5">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    


    <style>
        .home-bg-1 {
            background-image: url('/rsx/home-bg-1.svg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .s-card-body {
            background-color: rgb(234, 234, 234);
            border-radius: 10px;
            min-height: 30vh;
            margin-top: -10vh;
        }

        .president_image {
            border-radius: 50%;
            width: 300px;
            height: 300px;
        }

        .president_bg {
            background-color: rgb(0, 0, 0);
        }

        .waw-card-body{
            background-color: rgb(234, 234, 234);
            border-radius: 10px;
            min-height: 16vh;
        }
    </style>

<style>
    .activities-header {
        font-weight: bold;
        color: #343a40; /* Adjust the color as needed */
        text-transform: uppercase;
    }
    .activities-list {
        list-style-type: none;
        padding-left: 0;
    }
    .activities-list li {
        margin-bottom: 0.75rem;
    }
    .activities-list li:before {
        content: '•';
        color: #007bff; /* Bootstrap primary color */
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
</style>
@endsection