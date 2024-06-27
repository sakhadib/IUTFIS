@extends('layouts.main')

@section('main')
<div class="footer-bg ex-bg">
<div class="container">
    <div class="vh-10"></div>
    <div class="row">
        <div class="col-md-8">
            <h1 class="display-1 text-light">
                Panel {{$current_panel->host_year}} Executives
            </h1>
        </div>
        
    </div>
    @foreach($executives as $mem)

    <div class="row mt-5">
        <div class="member-card">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-4 col-md-2 df jcc aic">
                        <a href="/profile/{{$mem->member->id}}" style="text-decoration: none;">
                        <img src="/storage/{{$mem->member->photo}}" alt="" class="profile-pic-xl">
                        </a>
                    </div>
                    <div class="col-8 col-md-4 df dfc jcc mt-2">
                        <a href="/profile/{{$mem->member->id}}" style="text-decoration: none;">
                        <h1 class="display-5 text-light">
                            
                            {{$mem->member->name}}
                            
                        </h1>
                    </a>
                        <h1 class="fs-3 text-light">
                            <span class="text-secondary">{{$mem->member->student_id}}, </span>
                            <span class="text-secondary">
                                {{$mem->member->department}}
                            </span>
                        </h1>
                        <h3 class="text-light fs-4">
                            {{ strtoupper($mem->position) }}
                            @if($mem->year == 2)
                             TEAM
                            @endif
                        </h3>
                    </div>
                    <div class="col-md-4 mt-4 df dfc jcc">
                        <div class="row">
                            <div class="col-auto">
                                <a href="{{$mem->member->facebook_link}}" class="text-light fs-1">
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{$mem->member->linkedin_link}}" class="text-light fs-1">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                            <div class="col-auto">
                                <a href="{{$mem->member->instagram_link}}" class="text-light fs-1">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="col-auto df aic">
                                <a href="{{$mem->member->portfolio_link}}" class="btn btn-lg btn-outline-light">
                                    Portfolio
                                </a>
                            </div>
    
                        </div>
                        <div class="row">
                            <div class="col-auto mt-3">
                                <a href="/profile/{{$mem->member->id}}" class="btn btn-lg btn-outline-secondary" style="width: 100%">
                                    View {{$mem->member->name}}'s Profile
                                </a>
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
    .ex-bg{
        min-height: 100vh;
    }


    .profile-pic-xl{
        width: 100%;
        height: auto;
        border-radius: 50%;
        border: 5px solid #fff;
    }

    .member-card{
        background: rgba(0,0,0,0.3);
        padding: 40px;
        border-radius: 20px;
        transition: all ease-in-out 0.3s;
    }

    .member-card:hover{
        background: rgba(69, 69, 69, 0.3);
        padding: 40px;
        border-radius: 20px;
        transform: scale(1.05);
        transition: all ease-in-out 0.3s;
    }
</style>

@endsection