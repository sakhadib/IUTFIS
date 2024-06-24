@extends('layouts.main')

@section('main')
<div class="post-bg">
    <div class="vh-40 df aic news-bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12 df dfc jcc aic">
                    <h1 class=" display-1 text-center text-warning">{{$type}}</h1>
                    <p class="lead text-light text-center">these are astronomy related {{$type}}. Check if you are interested</p>
                    
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                @if($post_count > 0)
                <div class="post-holder-big">
                    <h1 class="display-5"><a href="/{{$type}}/{{$posts[0]->id}}" class="link-dark link-unstyled">{{$posts[0]->title}}</a></h1>
                    <p class="fs-6 text-secondary">
                        <a href="/profile/{{$posts[0]->member->id}}" class="link-dark link-unstyled">
                            <img src="/storage/{{$posts[0]->member->photo}}" class="profile-pic" alt="">
                            {{$posts[0]->member->name}}
                        </a>
                        at {{date('j F Y \a\t g:i A', strtotime($posts[0]->created_at))}}
                        on <strong>{{$posts[0]->category->name}}</strong>
                        
                    </p>
                    <p class="lead text-secondary">
                        {{$posts[0]->content ? substr(str_replace(['#', '*'], '', $posts[0]->content), 0, 600) : ''}}
                        ... <a href="/{{$type}}/{{$posts[0]->id}}">Read more</a>
                    </p>
                </div>
                @endif
            </div>
            <div class="col-md-6">
                @if($post_count > 1)
                <div class="row">
                    <div class="col-md-12">
                        <div class="post-holder-big">
                            <h1 class="display-6"><a href="/{{$type}}/{{$posts[1]->id}}" class="link-dark link-unstyled">{{$posts[1]->title}}</a></h1>
                            <p class="fs-6 text-secondary">
                                <a href="/profile/{{$posts[1]->member->id}}" class="link-dark link-unstyled">
                                    <img src="/storage/{{$posts[1]->member->photo}}" class="profile-pic" alt="">
                                    {{$posts[1]->member->name}}
                                </a>
                                at {{date('j F Y \a\t g:i A', strtotime($posts[1]->created_at))}}
                                on <strong>{{$posts[1]->category->name}}</strong>
                                
                            </p>
                            <p class="lead text-secondary">
                                {{$posts[1]->content ? substr(str_replace(['#', '*'], '', $posts[1]->content), 0, 100) : ''}}
                                ... <a href="/{{$type}}/{{$posts[1]->id}}">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endif

                @if($post_count > 2)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="post-holder-big">
                            <h1 class="display-6"><a href="/{{$type}}/{{$posts[2]->id}}" class="link-dark link-unstyled">{{$posts[2]->title}}</a></h1>
                            <p class="fs-6 text-secondary">
                                <a href="/profile/{{$posts[2]->member->id}}" class="link-dark link-unstyled">
                                    <img src="/storage/{{$posts[2]->member->photo}}" class="profile-pic" alt="">
                                    {{$posts[2]->member->name}}
                                </a>
                                at {{date('j F Y \a\t g:i A', strtotime($posts[1]->created_at))}}
                                on <strong>{{$posts[2]->category->name}}</strong>
                                
                            </p>
                            <p class="lead text-secondary">
                                {{$posts[2]->content ? substr(str_replace(['#', '*'], '', $posts[2]->content), 0, 100) : ''}}
                                ... <a href="/{{$type}}/{{$posts[2]->id}}">Read more</a>
                            </p>
                        </div>
                    </div>
                </div>
                @endif
                
            </div>
            
        </div>
    </div>

    <div class="mt-5 mb-5">
        <div class="container">
            @foreach($posts as $index => $n)
            @if($index >= 3)
            <div class="row mt-5">
                <div class="col-12">
                <h1 class="fs-5"><mark>{{date('j F Y \a\t g:i A', strtotime($n->created_at))}}</mark></h1>
                    <h1 class="display-6"><a href="/{{$type}}/{{$n->id}}" class="link-dark link-unstyled">{{$n->title}}</a></h1>
                    <p class="fs-6 text-secondary">
                        <a href="/profile/{{$n->member->id}}" class="link-dark link-unstyled">
                            <img src="/storage/{{$n->member->photo}}" class="profile-pic" alt="">
                            {{$n->member->name}}
                        </a>
                        on <strong>{{$n->category->name}}</strong>
                    </p>
                    <p class="lead text-secondary">
                        {{$n->content ? substr(str_replace(['#', '*'], '', $n->content), 0, 250) : ''}}
                        ... <a href="/{{$type}}/{{$n->id}}">Read more</a>
                    </p>
                </div>
            </div>
            <hr>
            @endif
            @endforeach
        </div>
        
    </div>

</div>


<style>
    .news-bg-black {
        background-color: rgba(0, 0, 0, 0.6);
        transition: background-color ease-in-out 0.3s;
        border-bottom: 5px solid rgb(134, 134, 134);
        backdrop-filter: blur(10px);
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


<style>
    .post-holder-big{
        /* background-color: rgba(0, 0, 0, 0.9); */
        border-radius: 10px;
        padding: 25px;
        padding-top: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
    }

    .post-bg{
        background-image: url('/rsx/{{$type}}bg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
</style>

@endsection