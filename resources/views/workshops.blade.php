@extends('layouts.main')

@section('main')

<div class="event-bg">
    <div class="declaration">
        <div class="vh-10"></div>
        <div class="container mt-5 mb-5 df jcc aic">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-3 text-center text-light">WORKSHOPS</h1>
                    <p class="text-light lead">
                        Workshops of IUT FIS. Click on them to learn more.
                    </p>
                    <a href="/allevents" class="btn btn-lg btn-outline-light">Show All Events</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        @foreach($workshops as $event)
        <div class="row mt-5">
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
                                <a href="/workshop/{{$event->id}}" class="btn btn-lg btn-light mt-3">Learn More</a>
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
        @endforeach
        <div class="vh-10"></div>
    </div>
</div>

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
        background-color: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 100px rgba(0, 0, 0, 0.8);
        border: 4px solid rgba(255, 255, 255, 0.1);
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
