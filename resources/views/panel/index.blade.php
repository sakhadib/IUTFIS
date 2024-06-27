@extends('layouts.main')

@section('main')

<div class="panel-bg">
    <div class="vh-10"></div>
    <div class="container">
        @foreach($panels as $panel)
        <div class="row">
            <div class="col-12">
                <div class="panel-card">
                    <div class="row">
                        <div class="col-md-4 df dfc jcc">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="display-2 text-light">
                                        Panel {{$panel->panel->host_year}}
                                    </h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-auto">
                                    <h1 class="display-6 text-light">
                                        <i class="fa-solid fa-user-astronaut"></i> {{$panel->president->name}}
                                    </h1>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 df jcc">
                                    <a href="/executives/{{$panel->panel->id}}" class="btn btn-lg btn-outline-light">View Panel</a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-8">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h1 class="fs-4 text-light">Message from 
                                        <a href="/profile/{{$panel->president->id}}"  style="text-decoration: none" class="text-light">
                                        <img src="/storage/{{$panel->president->photo}}" alt="" class="profile-pic"> 
                                        {{$panel->president->name}}
                                        </a>
                                        , honorable president
                                    </h1>
                                    <p class="text-light lead mt-4" style="text-align: justify">
                                        {{$panel->panel->president_message}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


<style>
    .panel-bg{
        min-height: 100vh;
        background-image: url('/rsx/wsbg.jpg')
    }

    .panel-card{
        background-color: rgba(0, 14, 24, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 10px;
        padding: 40px;
        margin-top: 20px;
    }
</style>

@endsection