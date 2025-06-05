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

<div class="footer-bg">
    <div class="container about df dfc jcc" id="more">
        <div class="row mt-5 mb-5">
            <div class="col-md-12 df dfc jcc">
                <h1 class="display-5 l mb-3">
                    IUT Al-Fazari Interstellar Society
                </h1>
                <p class="lead text-light mt-3 mb-0" style="text-align: justify">
                    IUT Al-Fazari Interstellar Society is the official astronomy, astrophysics, and natural sciences club of Islamic University of Technology. We foster curiosity and knowledge about the universe through events, workshops, seminars, and competitions. Our mission is to inspire and educate students about the wonders of the cosmos in a collaborative and inclusive environment.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- FORMAL NEWS SECTION -->
<section class="py-5" style="background: #181d2f;">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="display-6 fw-semibold text-warning mb-2"><i class="fa fa-newspaper"></i> Latest News</h2>
                <p class="text-secondary">Stay updated with the latest happenings in our society.</p>
            </div>
        </div>
        <div class="row g-4">
            @if(isset($newss) && count($newss))
                @foreach($newss as $news)
                    <div class="col-md-4">
                        <div class="card bg-dark text-light h-100 border-0 shadow-sm p-3" style="padding:1rem !important;">
                            <div class="card-body p-4">
                                <h5 class="card-title text-warning">
                                    <a href="{{ url('News/' . ($news->id ?? '')) }}" class="text-warning text-decoration-none">{{ $news->title ?? 'Untitled' }}</a>
                                </h5>
                                <p class="card-text mt-3">{{ Str::limit($news->content ?? '', 120) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ url('News/' . ($news->id ?? '')) }}" class="btn btn-outline-warning btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="alert alert-info bg-transparent border-info text-light">No news available at the moment.</div>
                </div>
            @endif
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <a href="/news" class="btn btn-outline-warning btn-lg">Show All News</a>
            </div>
        </div>
    </div>
</section>

<!-- FORMAL WORKSHOP SECTION -->
<section class="py-5" style="background: #232946;">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="display-6 fw-semibold mb-2" style="color:rgb(176, 240, 160)"><i class="fa fa-chalkboard-teacher"></i> Next Workshop</h2>
                <p class="text-secondary">Join our upcoming workshop and expand your horizons.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            @if(isset($workshop) && $workshop)
                @php $event = $workshop; @endphp
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg mb-4 p-0 bg-success bg-gradient position-relative" style="overflow: hidden;">
                        <div class="card-body p-5 position-relative">
                            <div class="d-flex align-items-center mb-4 flex-wrap gap-3">
                                <h2 class="card-title mb-0 flex-grow-1 text-white display-5">{{ $event->title ?? 'Untitled Workshop' }}</h2>
                            </div>
                            <div class="row g-3 align-items-center mb-4">
                                <div class="col-12 col-md-auto d-flex align-items-center gap-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width:44px;height:44px;">
                                        <i class="fa fa-calendar-alt text-success fs-4"></i>
                                    </span>
                                    <span class="text-white fw-semibold">{{ isset($event->start_date) ? date('j F Y', strtotime($event->start_date)) : 'TBA' }}</span>
                                </div>
                                <div class="col-12 col-md-auto d-flex align-items-center gap-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width:44px;height:44px;">
                                        <i class="fa fa-clock text-success fs-4"></i>
                                    </span>
                                    <span class="text-white fw-semibold">{{ isset($event->start_date) ? date('g:i A', strtotime($event->start_date)) : 'TBA' }}</span>
                                </div>
                                <div class="col-12 col-md-auto d-flex align-items-center gap-2">
                                    <span class="d-inline-flex align-items-center justify-content-center bg-white bg-opacity-25 rounded-circle" style="width:44px;height:44px;">
                                        <i class="fa fa-map-marker-alt text-success fs-4"></i>
                                    </span>
                                    <span class="text-white fw-semibold">{{ $event->location ?? 'TBA' }}</span>
                                </div>
                            </div>
                            <p class="card-text lead text-white mb-4" style="font-size:1.1rem;">{{ Str::limit($event->description ?? '', 200) }}</p>
                            <div class="d-flex align-items-center gap-3 flex-wrap">
                                <a href="{{ url('workshop/' . ($event->id ?? '')) }}" class="btn btn-outline-light btn-lg px-4 rounded-pill shadow-sm">Details</a>
                                @if(isset($event->link) && $event->link !== 'none')
                                    <a class="btn btn-outline-light disabled rounded-pill px-4"><i class="fa fa-globe"></i> Online</a>
                                @endif
                            </div>
                            <div class="position-absolute end-0 bottom-0 opacity-10" style="pointer-events:none;">
                                <i class="fa fa-rocket fa-7x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="col-lg-8">
                    <div class="alert alert-info bg-transparent border-info text-light text-center">No Upcoming Workshop</div>
                </div>
            @endif
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <a href="/workshops" class="btn btn-success btn-lg">View All Workshops</a>
            </div>
        </div>
    </div>
</section>

<!-- FORMAL ARTICLES SECTION -->
<section class="py-5" style="background: #181d2f;">
    <div class="container">
        <div class="row mb-4">
            <div class="col text-center">
                <h2 class="display-6 fw-semibold article-title-color mb-2"><i class="fa fa-file-alt"></i> Articles</h2>
                <p class="text-secondary">Explore articles written by our members.</p>
            </div>
        </div>
        <div class="row g-4">
            @if(isset($articles) && count($articles))
                @foreach($articles as $news)
                    <div class="col-md-4">
                        <div class="card bg-dark text-light h-100 border-0 shadow-sm p-3" style="padding:1rem !important;">
                            <div class="card-body p-4">
                                <h5 class="card-title article-title-color">
                                    <a href="{{ url('News/' . ($news->article->id ?? '')) }}" class="article-title-color text-decoration-none">{{ $news->article->title ?? 'Untitled' }}</a>
                                </h5>
                                <p class="card-text">
                                    <span class="text-secondary small">@if(isset($news->article->created_at)) At {{ $news->article->created_at->format('j F Y') }} @endif
                                    @if(isset($news->member->name)) By {{ $news->member->name }} @endif</span>
                                </p>
                                <p class="card-text">{{ Str::limit($news->article->content ?? '', 120) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <a href="{{ url('News/' . ($news->article->id ?? '')) }}" class="btn show-articles-btn btn-sm">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center">
                    <div class="alert alert-info bg-transparent border-info text-light">No articles available at the moment.</div>
                </div>
            @endif
        </div>
        <div class="row mt-4">
            <div class="col text-center">
                <a href="/articles" class="btn btn-lg show-articles-btn" style="">Show All Articles</a>
                <style>
                    .show-articles-btn{
                        border: 2px solid #e48787; 
                        color: #e48787; 
                        background: transparent;
                    }
                    .show-articles-btn:hover,
                    .show-articles-btn:focus {
                        background: #e48787 !important;
                        color: #fff !important;
                        border-color: #e48787 !important;
                    }
                </style>
            </div>
        </div>
    </div>
</section>

<style>
    .article-title-color{
        color: #e48787;
    }
</style>

    
    

    
<style>
    .news-bg {
        background-image: url('/rsx/Newsbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 80vh;
    }
    .bg-cover {
        background-color: rgba(0, 0, 0, 0.6);
        min-height: 80vh;
        backdrop-filter: blur(7px);
    }

    .post-card{
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
        backdrop-filter: blur(5px);
        border: 5px solid rgba(255, 255, 255, 0.2);
    }

    .ws-bg{
        background: rgb(0,5,45);
        background: linear-gradient(321deg, rgba(0,5,45,1) 0%, rgba(17,0,25,1) 100%);
    }


    .article-bg{
        min-height: 80vh;
        background-image: url('/rsx/wsbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;

    }
</style>

<style>
    .event-bg {
        background-image: url('/rsx/wsbg.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        min-height: 100vh;
    }

    .declaration {
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
        min-height: 35vh;
        border-bottom: 20px solid rgba(255, 255, 255, 0.1);
    }

    .event-box {
        background-color: rgba(0, 0, 0, .1);
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 10px;
        /* box-shadow: 0 0 100px rgba(0, 0, 0, 0.8); */
        border: 6px solid rgba(255, 255, 255, 0.1);
    }
</style>

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

        .about{
            min-height: 50vh;
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



<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.duration').forEach(function(element) {
            const startDate = new Date(element.parentElement.getAttribute('data-start'));
            const endDate = new Date(element.parentElement.getAttribute('data-end'));
            const durationMs = endDate - startDate;
            const minutes = Math.floor((durationMs / (1000 * 60)) % 60);
            const hours = Math.floor((durationMs / (1000 * 60 * 60)) % 24);
            const days = Math.floor(durationMs / (1000 * 60 * 60 * 24));

            let durationStr = "";
            if (days > 0) {
                durationStr += days + " day" + (days > 1 ? "s " : " ");
            }
            if (hours > 0) {
                durationStr += hours + " hour" + (hours > 1 ? "s " : " ");
            }
            if (minutes > 0) {
                durationStr += minutes + " minute" + (minutes > 1 ? "s" : "");
            }

            element.textContent = durationStr || "0 minutes";
        });
    });
</script>
@endsection