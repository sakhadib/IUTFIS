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
                <h1 class="display-5 l">
                    IUT Al-Fazari Interstellar Society
                </h1>
                <p class="lead text-light mt-3" style="text-align: justify">
                    is an astronomy, astrophysics and natural sciences based society of Islamic University of Technology. 
                    It is a platform for the students of IUT to learn and share their knowledge about the universe and its 
                    mysteries. The society organizes various events, workshops, seminars, and competitions to enhance the 
                    knowledge of the students in the field of astronomy and astrophysics.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="news-bg">
    <div class="bg-cover df dfc jcc">
        <div class="container">
            <div class="row">
                <div class="col-md-4 df dfc jcc aic">
                    <h1 class="display-1 text-light mt-5">
                        <i class="uil uil-newspaper"></i> NEWS
                    </h1>
                    <p class="lead text-light text-center">
                        The latest news from the universe. Click on them to learn more.
                    </p>
                    <a href="/news" class="btn btn-lg btn-outline-light mb-5">Show All News</a>
                </div>
                <div class="col-md-7 offset-md-1">
                    <div class="container">
                        @if($newss != null)
                        @foreach($newss as $news)
                        <a href="News/{{$news->id}}" style="text-decoration: none;">
                            <div class="post-card mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="fs-4 text-light">
                                            {{$news->title}}
                                        </h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-light">
                                            {{ Str::limit($news->content, 120) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                        <div class="vh-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="ws-bg vh-50">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-3 text-light text-center mt-5">
                     NEXT WORKSHOP
                </h1>
                <p class="text-light lead text-center">
                    The next workshop of IUT FIS. Click on it to learn more. <br>
                    <a href="/workshops" class="btn btn btn-outline-light mt-3">Click Here To view All Workshops</a> 
                </p>
                @if($workshop != null)

                @php
                    $event = $workshop;
                @endphp
                <div class="row mt-5 mb-5">
                    <div class="col-md-12">
                        <div class="event-box">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/workshop/{{$event->id}}" style="text-decoration: none"><h1 class="display-5 text-light">{{$event->title}}</h1></a>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-auto">
                                        <h1 class="fs-5 text-light"><i class="uil uil-schedule"></i> &nbsp; {{date('j F Y', strtotime($event->start_date))}}</h1>
                                    </div>
                                    <div class="col-md-auto">
                                        <h1 class="fs-5 text-light"><i class="uil uil-clock-seven"></i> &nbsp; {{date('g:i A', strtotime($event->start_date))}}</h1>
                                    </div>
                                    <div class="col-md-auto">
                                        <h1 class="fs-5 text-light" data-start="{{ $event->start_date }}" data-end="{{ $event->end_date }}"><i class="uil uil-hourglass"></i> &nbsp; <span class="duration"></span></h1>
                                    </div>
                                    <div class="col-md-auto">
                                        <h1 class="fs-5 text-light"><i class="uil uil-map-marker"></i> &nbsp; {{$event->location}}</h1>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <p class="text-light lead">{{ Str::limit($event->description, 200) }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="/workshop/{{$event->id}}" class="btn btn-lg btn-light mt-3 df jcc aic"><i class="fa-solid fa-shuttle-space"></i> &nbsp;&nbsp;DETAILS</a>
                                    </div>
                                    @if($event->link != 'none')
                                    <div class="col-auto">
                                        <a class="btn btn-lg btn-outline-light disabled mt-3"><i class="uil uil-globe"></i> Online</a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @else

                <div class="row mt-5 mb-5">
                    <div class="col-md-12">
                        <div class="event-box">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="display-5 text-light text-center">No Upcoming Workshop</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
            </div>
        </div>
    </div>
</div>



<div class="article-bg">
    <div class="bg-cover df jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-md-4 df dfc jcc aic">
                    <h1 class="display-1 text-light mt-5">
                        <i class="uil uil-layers"></i> Articles
                    </h1>
                    <p class="lead text-light text-center">
                        Articles from FIS members. Click on them to learn more.
                    </p>
                    <a href="/articles" class="btn btn-lg btn-outline-light mb-5">Show All Articles</a>
                </div>
                <div class="col-md-7 offset-md-1">
                    <div class="container">
                        @if($articles != null)
                        @foreach($articles as $news)
                        <a href="News/{{$news->article->id}}" style="text-decoration: none;">
                            <div class="post-card mt-3">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="fs-4 text-light">
                                            {{$news->article->title}}
                                        </h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="lead text-secondary">
                                            At {{$news->article->created_at->format('j F Y')}}
                                            By {{$news->member->name}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-light">
                                            {{ $news->article->content }}...
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        @endif
                        <div class="vh-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

    
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