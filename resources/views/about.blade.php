@extends('layouts.main')


@section('main')

<div class="about-bg">
    <div class="bg-cover df dfc jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-12 vh-40 df dfc jcc aic">
                    <h1 class="display-1 text-light">IUTFIS</h1>
                    <p class="lead text-light text-center">
                        IUT Al-Fazari Interstellar Society. The society that connects the stars.
                    </p>
                    <p class="fs-4 l">
                        #LookUpToWonder
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container main-place mt-5 mb-5">
    <div class="row">
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_member_count}}</h1>
                <p class="lead">Members</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_news_count}}</h1>
                <p class="lead">News</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_article_count}}</h1>
                <p class="lead">Articles</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_workshop_count}}</h1>
                <p class="lead">Workshops</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_event_count}}</h1>
                <p class="lead">Events</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4">{{$total_achievement_count}}</h1>
                <p class="lead">Achievements</p>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <p class="lead" style="text-align: justify">
                The IUT Al-Fazari Interstellar Society is a student organization at Islamic University of Technology, Gazipur, Bangladesh. 
                The society was founded in 2019 with the aim of promoting space science and technology among the students of IUT. 
                The society has been organizing various events, workshops, and competitions to engage students in space-related activities. 
                The society also aims to inspire students to pursue careers in space science and technology.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 df dfc jcc aic">
            <h1 class="display-3">Meet Our Founders</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-5 mt-3 offset-md-1">
            <div class="card" style="width: 100%;">
                <img src="{{url('rsx/newsbg.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fs-3">Founder 1</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                </div>
            </div>
        </div>
        <div class="col-md-5 mt-3">
            <div class="card" style="width: 100%;">
                <img src="{{url('rsx/aftab.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fs-3">Aftab Nazim</h5>
                  <h5 class="card-title fs-5">Founding Vice President</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12 df dfc jcc aic mt-5">
            <h1 class="display-3">Our Mission</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <p class="lead" style="text-align: justify">
                The mission of the IUT Al-Fazari Interstellar Society is to promote space science and technology among the students of IUT. 
                The society aims to inspire students to pursue careers in space science and technology by organizing various events, workshops, 
                and competitions. 
                The society also aims to create a platform for students to engage in space-related activities and collaborate with 
                other students who share a passion for space.
            </p>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12 df dfc jcc aic">
            <h1 class="display-3">Our Presence in Social Media</h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12 df jcsa aic">
            <a href="https://www.facebook.com/IUTFIS/" target="blank" class="me-3"><i class="uil uil-facebook-f text-dark display-1"></i></a>
            <a href="mailto:iutfis2061@gmail.com" target = "blank" class="me-3"><i class="uil uil-envelope text-dark display-1"></i></a>
            <a href="https://www.instagram.com/iut_interstellar_society/" target = "blank" class="me-3"><i class="uil uil-instagram text-dark display-1"></i></a>
            <a href="https://www.youtube.com/@iutfis" target = "blank" class="me-3"><i class="uil uil-youtube text-dark display-1"></i></a>
            <a href="https://www.linkedin.com/company/iut-al-fazari-interstellar-society" target = "blank" class="me-3"><i class="uil uil-linkedin text-dark display-1"></i></a>                      
        </div>
    </div>


    
</div>


<style>
    .about-bg{
        background-image: url('/rsx/eventbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 50vh;
    }


    .bg-cover{
        background-color: rgba(0, 0, 0, 0.7);
        min-height : 50vh;
        backdrop-filter: blur(7px);
    }

    .stat-box{
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .main-place{
        min-height: 100vh;
    }
</style>
@endsection