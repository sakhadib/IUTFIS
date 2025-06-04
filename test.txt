@extends('layouts.main')

@section('main')

<div class="ach-main">
    <div class="vh-10"></div>
    <div class="container">
        @foreach($achievements as $achievement)
        <a href="achievement/{{$achievement->id}}" style="text-decoration: none;" title="Click to view in details">
            <div class="row mt-4">
                <div class="ach-card">
                    <div class="col-12">
                        <h1 class="display-4 text-light">
                            {{$achievement->competition}}
                        </h1>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="row">
                            <div class="col-md-auto">
                                <h4 class="text-light"><i class="uil uil-calender"></i> : {{date('j F Y', strtotime($achievement->competition_date))}} 
                                </h4>
                            </div>
                            <div class="col-md-auto">
                                <h4 class="text-light"><i class="uil uil-analytics"></i> : {{$achievement->rank}}</h4>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        <div class="vh-10"></div>
    </div>
</div>


<style>
    .ach-main{
        /* min-height: 100vh; */
        background-image: url('/rsx/Announcementsbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }

    .ach-card{
        background-color: rgba(0, 0, 0, 0.6);
        padding: 30px;
        border-radius: 10px;
        backdrop-filter: blur(7px);
        border: 5px solid rgba(255, 255, 255, 0.2);
    }
</style>

@endsection