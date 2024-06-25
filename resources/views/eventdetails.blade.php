@extends('layouts.main')

@section('main')

<!-- Load Facebook SDK for JavaScript -->

<div class="everything footer-bg">
    <div class="vh-10"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-2 text-light">
                    {{$event->name}}
                </h1>
                <p class="lead text-secondary">
                    <p class="lead text-secondary">
                        ___Organized by <em><strong>IUT Al-Fazari Interstellar Society</strong></em>
                    </p>
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="display-6 text-light"><i class="uil uil-schedule"></i> &nbsp; {{date('j F Y - l', strtotime($event->start_date))}}</h1>
            </div> 
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="display-6 text-light"><i class="uil uil-clock-seven"></i> &nbsp; {{date('g:i A', strtotime($event->start_date))}} &nbsp; to &nbsp; {{date('g:i A', strtotime($event->end_date))}}</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="display-6 text-light" data-start="{{ $event->start_date }}" data-end="{{ $event->end_date }}"><i class="uil uil-hourglass"></i> &nbsp; <span class="duration"></span></h1>
            </div> 
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <h1 class="display-6 text-light"><i class="uil uil-map-marker"></i> &nbsp; {{$event->location}}</h1>
            </div> 
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <p id="eventDescription" class="lead text-light" style="text-align: justify">
                    {!! nl2br(e($event->description)) !!}
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-auto">
                <a href="{{$event->link}}" class="btn btn-lg btn-light mt-3">Visit Social Event Link</a>
            </div>
        </div>
        <div class="vh-10"></div>
        
    </div>
</div>

<style>
    .everything{
        min-height: 80vh;
    }
</style>


<style>
    .embed-responsive-16by9 {
        position: relative;
        display: block;
        width: 100%;
        padding: 0;
        overflow: hidden;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }

    .embed-responsive-item {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        height: 100%;
        width: 100%;
        border: 0;
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

<script>
    // Function to convert URLs in text to clickable links
    function makeLinksClickable(text) {
        var urlPattern = /(https?:\/\/[^\s]+)/g;
        return text.replace(urlPattern, function(url) {
            return '<a href="' + url + '" target="_blank" rel="noopener noreferrer">' + url + '</a>';
        });
    }

    // Get the event description element and update its HTML with clickable links
    var eventDescriptionElement = document.getElementById('eventDescription');
    eventDescriptionElement.innerHTML = makeLinksClickable(eventDescriptionElement.innerHTML);
</script>

    
@endsection