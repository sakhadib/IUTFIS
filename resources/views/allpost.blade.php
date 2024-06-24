@extends('layouts.main')

@section('main')
<div class="vh-40 df aic news-bg-black">
    <div class="container">
        <div class="row">
            <div class="col-md-12 df dfc jcc aic">
                <h1 class=" display-1 text-center text-warning">{{$type}}</h1>
                <p class="lead text-light text-center">these are astronomy related {{$type}}. Check if you are interested</p>
                <button class="btn btn-outline-light asc" id="date-form-activator">Jump to a date</button>

                <div class="date-picker" hidden  id="date-form">
                    <form action="/news" method="post">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                                    </div>
                                </div>
                                <div class="col-4 df aife">
                                    <button type="submit" class="btn btn-outline-light"> Go <i class="uil uil-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>                    
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="">
        <div class="container">
        @foreach($posts as $n)
        <div class="row mt-5">
            <div class="col-12">
            <h1 class="fs-4"><mark>{{date('j F Y \a\t g:i A', strtotime($n->created_at))}}</mark></h1>
                <h1 class="display-5"><a href="/news/{{$n->id}}" class="link-dark link-unstyled">{{$n->title}}</a></h1>
                <p class="fs-6 text-secondary">By &nbsp;
                    <a href="/profile/{{$n->member->id}}" class="link-dark link-unstyled">
                        <img src="/storage/{{$n->member->photo}}" class="profile-pic" alt="">
                        {{$n->member->name}}
                    </a>
                </p>
                <p class="lead text-secondary">
                    {{$n->content ? substr($n->content, 0, 250) : ''}}
                    ... <a href="/news/{{$n->id}}">Read more</a>
                </p>
            </div>
        </div>
        <hr>
        @endforeach
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <a href="/allnews" class="btn btn-lg btn-outline-dark">See All News</a>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .news-bg-black {
        background-color: rgba(0, 0, 0, 1);
        transition: background-color ease-in-out 0.3s;
    }

    .link-unstyled{
        text-decoration: none;
    }

    .date-picker{
        background-color: rgba(0, 14, 24, 0.9);
        border-radius: 10px;
        padding: 20px;
        border-bottom: 3px solid rgb(134, 134, 134);
        border-top: 3px solid rgb(134, 134, 134);
    }
</style>

<script>
    document.getElementById('date-form-activator').addEventListener('click', function() {
      document.getElementById('date-form').hidden = false;
      this.hidden = true;
    });
</script>
@endsection