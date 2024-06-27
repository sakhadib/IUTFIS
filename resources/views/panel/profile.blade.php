@extends('layouts.main')

@section('main')

<div class="prbg">
    <div class="vh-40"></div>
    <div class="container">
        <div class="details-card">
            <div class="row">
                <div class="col-md-4 df jcc">
                    <img src="/storage/{{$member->photo}}" alt="" class="pro-pic-xl">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-2 text-light">
                                {{$member->name}}
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-light">
                                {{ strtoupper($executive->position) }}
                                @if($executive->year == 2)
                                TEAM
                                @endif,
                                Panel {{$panel->host_year}}
                            </h1>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <h1 class="fs-4 text-light">
                                {{$member->student_id}},
                                {{$member->department}},
                                Islamic University of Technology
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-12 df jcc">
                    <div class="btn-group">
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-facebook"></i> facebook
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-linkedin"></i> linkedin
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-instagram"></i> instagram
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fa-solid fa-user-astronaut"></i> portfolio
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .prbg{
        background-image: url('/rsx/prbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
    }

    .pro-pic-xl{
        width: 350px;
        height: auto;
        border-radius: 15px;
        border: 8px solid white;
        backdrop-filter: brightness(0);
        transition: 0.5s ease-in-out;
        transform: translate(0, -30%);
    }

    .pro-pic-xl:hover{
        transform: translate(0, -30%) scale(1.1);
        transition: 0.5s ease-in-out;
    }

    .details-card{
        background: rgba(0,0,0,0.8);
        padding: 40px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 7px solid rgba(255,255,255,1);
    }
</style>

@endsection