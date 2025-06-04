@extends('layouts.main')

@section('main')
@php
    $event = $workshop;    
@endphp
    <div class="main footer-bg">
        <div class="vh-10"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-2 text-warning">
                        {{$event->title}}
                    </h1>
                    <p class="lead text-secondary">
                        <p class="lead text-secondary">
                            ___Organized by <em><strong>IUT Al-Fazari Interstellar Society</strong></em>
                        </p>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="container">
                        
                        <div class="row mt-5">
                            <div class="col-1 df jcc">
                                <h1 class="display-6 text-light"><i class="uil uil-schedule"></i> </h1>
                            </div> 
                            <div class="col-11">
                                <h1 class="display-6 text-light"> {{date('j F Y - l', strtotime($event->start_date))}}</h1>
                            </div> 
                        </div>
                        <div class="row mt-5">
                            <div class="col-1 df jcc aic">
                                <h1 class="display-6 text-light"><i class="uil uil-clock-seven"></i> </h1>
                            </div>
                            <div class="col-11">
                                <h1 class="display-6 text-light">{{date('g:i A', strtotime($event->start_date))}} &nbsp; to &nbsp; {{date('g:i A', strtotime($event->end_date))}}</h1>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-1 df jcc">
                                <h1 class="display-6 text-light"><i class="uil uil-hourglass"></i></h1>
                            </div> 
                            <div class="col-11">
                                <h1 class="display-6 text-light" data-start="{{ $event->start_date }}" data-end="{{ $event->end_date }}"><span class="duration"></span></h1>
                            </div> 
                        </div>
                        <div class="row mt-5">
                            <div class="col-1 df jcc">
                                <h1 class="display-6 text-light"><i class="uil uil-map-marker"></i></h1>
                            </div> 
                            <div class="col-11">
                                <h1 class="display-6 text-light"> {{$event->location}}</h1>
                            </div> 
                        </div>
                        @if($event->link != 'none')
                        <div class="row mt-5">
                            <div class="col-md-12">
                                <a href="{{$event->link}}" style="text-decoration: none">
                                    <h1 class="btn btn-lg btn-outline-light"><i class="uil uil-link-h"></i> &nbsp; Online Workshop Link</h1>
                                </a>
                                
                            </div> 
                        </div>
                        @endif
                    </div>
                </div>

                
            </div>
            <div class="vh-5"></div>

            <div class="row mb-4 mt-4">
                <div class="col-md-auto">
                    <h1 class="display-4 text-warning">
                        Speakers
                    </h1>
                </div>
                
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @foreach($speaker_non_members as $nmspeakers)
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <a href="{{$nmspeakers->profile_link}}" class="link-light mb-3" style="text-decoration: none; font-size: 1.5rem;">
                                    <img src="/storage/profile_pics/default.jpg" alt="" class="profile-pic-big"> &nbsp;
                                    {{$nmspeakers->name}}, <span class="text-secondary">{{$nmspeakers->institution}}</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @foreach($speaker_members as $mem)
                        <div class="row mb-4">
                            <div class="col-md-12">
                                <a href="/profile/{{$mem->member->id}}" class="link-light mb-3" style="text-decoration: none; font-size: 1.5rem;">
                                    <img src="/storage/{{$mem->member->photo}}" alt="" class="profile-pic-big"> &nbsp;
                                    {{$mem->member->name}}, <span class="text-secondary">{{$mem->member->student_id}}, {{$mem->member->department}}, Islamic University of Technology</span>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 df dfc">
                    <h2 class="display-4 text-warning mb-3">Workshop Details</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="lead text-light mt-4" id="eventDescription" style="text-align: justify">
                                    {!! nl2br(e($workshop->description)) !!}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            @if($event->featured_image != 'ws.jpg')
                            <div class="col-12 mt-3">
                                <img src="/storage/{{$event->featured_image}}" alt="Featured Image" class="ws-image">
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                

                
            </div>



            


        </div>
    </div>




    <style>
        .main{
            min-height: 100vh;
        }

        .ws-image{
            width: 100%;
            height: auto;
            border-radius: 20px;
            border-bottom: 7px solid rgba(255, 255, 255, 0.5);
            border-top: 7px solid rgba(255, 255, 255, 0.5);
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


<style>
    .profile-pic-big{
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 2px solid #1B75BC;
    }
</style>

<script>
    // Function to convert URLs in text to clickable links
    function makeLinksClickable(text) {
        var urlPattern = /(https?:\/\/[^\s]+)/g;
        return text.replace(urlPattern, function(url) {
            return '<a href="' + url + '" target="_blank" rel="noopener noreferrer" class="link-l">' + url + '</a>';
        });
    }

    // Get the event description element and update its HTML with clickable links
    var eventDescriptionElement = document.getElementById('eventDescription');
    eventDescriptionElement.innerHTML = makeLinksClickable(eventDescriptionElement.innerHTML);
</script>
@endsection