@extends('layouts.main')

@section('main')
<div class="post-bg">
    <!-- Hero Section -->
    <div class="vh-40 d-flex align-items-center justify-content-center hero-overlay">
        <div class="container text-center">
            <h1 class="display-1 mb-3">{{$type ?? 'Posts'}}</h1>
            <p class="lead text-light mb-0">Explore our collection of astronomy-related {{$type ?? 'posts'}} curated by the University Astronomy Club.</p>
        </div>
    </div>

    <!-- Featured Posts -->
    <div class="container mt-5 position-relative z-2">
        <div class="row g-4">
            @if(!empty($posts[0]))
            <div class="col-lg-6">
                <div class="card bg-dark-glass border-0 shadow-lg h-100">
                    <div class="card-body">
                        <h2 class="card-title display-5 mb-3">
                            <a href="/{{$type}}/{{$posts[0]->id}}" class="link-unstyled">{{$posts[0]->title}}</a>
                        </h2>
                        <div class="d-flex align-items-center mb-2">
                            <a href="/profile/{{$posts[0]->member->id ?? 0}}" class="d-flex align-items-center link-unstyled me-2">
                                <img src="{{ $posts[0]->member->photo ? '/storage/'.$posts[0]->member->photo : '/default-profile.png' }}" class="profile-pic-sm me-2" alt="">
                                <span class="fw-bold text-light">{{$posts[0]->member->name ?? 'Unknown'}}</span>
                            </a>
                            <span class="text-secondary small ms-2">
                                <i class="bi bi-clock"></i>
                                {{ $posts[0]->created_at ? date('j M Y, g:i A', strtotime($posts[0]->created_at)) : '' }}
                            </span>
                            <span class="badge bg-light text-dark ms-3">{{$posts[0]->category->name ?? 'General'}}</span>
                        </div>
                        <p class="card-text text-light">
                            {{ $posts[0]->content ? \Illuminate\Support\Str::limit(strip_tags(str_replace(['#', '*'], '', $posts[0]->content)), 400) : '' }}
                            <a href="/{{$type}}/{{$posts[0]->id}}">Read more</a>
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-lg-6">
                <div class="row g-4">
                    @foreach([1,2] as $i)
                        @if(!empty($posts[$i]))
                        <div class="col-12">
                            <div class="card bg-dark-glass border-0 shadow h-100">
                                <div class="card-body">
                                    <h3 class="card-title display-6 mb-2">
                                        <a href="/{{$type}}/{{$posts[$i]->id}}" class="link-unstyled">{{$posts[$i]->title}}</a>
                                    </h3>
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="/profile/{{$posts[$i]->member->id ?? 0}}" class="d-flex align-items-center link-unstyled me-2">
                                            <img src="{{ $posts[$i]->member->photo ? '/storage/'.$posts[$i]->member->photo : '/default-profile.png' }}" class="profile-pic-xs me-2" alt="">
                                            <span class="fw-bold text-light">{{$posts[$i]->member->name ?? 'Unknown'}}</span>
                                        </a>
                                        <span class="text-secondary small ms-2">
                                            <i class="bi bi-clock"></i>
                                            {{ $posts[$i]->created_at ? date('j M Y, g:i A', strtotime($posts[$i]->created_at)) : '' }}
                                        </span>
                                        <span class="badge bg-light text-dark ms-3">{{$posts[$i]->category->name ?? 'General'}}</span>
                                    </div>
                                    <p class="card-text text-light">
                                        {{ $posts[$i]->content ? \Illuminate\Support\Str::limit(strip_tags(str_replace(['#', '*'], '', $posts[$i]->content)), 120) : '' }}
                                        <a href="/{{$type}}/{{$posts[$i]->id}}">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Other Posts -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                @forelse($posts as $index => $n)
                    @if($index >= 3)
                    <div class="card bg-dark-glass border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <span class="text-secondary small me-3">
                                    <i class="bi bi-calendar-event"></i>
                                    {{ $n->created_at ? date('j M Y, g:i A', strtotime($n->created_at)) : '' }}
                                </span>
                                <span class="badge bg-light text-dark">{{$n->category->name ?? 'General'}}</span>
                            </div>
                            <h4 class="card-title mb-2">
                                <a href="/{{$type}}/{{$n->id}}" class="link-unstyled">{{$n->title}}</a>
                            </h4>
                            <div class="d-flex align-items-center mb-2">
                                <a href="/profile/{{$n->member->id ?? 0}}" class="d-flex align-items-center link-unstyled">
                                    <img src="{{ $n->member->photo ? '/storage/'.$n->member->photo : '/default-profile.png' }}" class="profile-pic-xs me-2" alt="">
                                    <span class="fw-bold text-light">{{$n->member->name ?? 'Unknown'}}</span>
                                </a>
                            </div>
                            <p class="card-text text-light">
                                {{ $n->content ? \Illuminate\Support\Str::limit(strip_tags(str_replace(['#', '*'], '', $n->content)), 250) : '' }}
                                <a href="/{{$type}}/{{$n->id}}">Read more</a>
                            </p>
                        </div>
                    </div>
                    @endif
                @empty
                    <div class="alert alert-warning mt-4">No posts are currently available.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- Modern Astronomy Club Styles -->
<style>
    .post-bg {
        background: linear-gradient(120deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        background-image: url('/rsx/{{$type ?? "default"}}bg.jpg'), linear-gradient(120deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
        position: relative;
    }
    .hero-overlay {
        background: rgba(10, 10, 30, 0.7);
        min-height: 40vh;
        border-bottom: 4px solid #ffd70044;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        position: relative;
        z-index: 1;
    }
    .bg-dark-glass {
        background: rgba(20, 20, 40, 0.85);
        backdrop-filter: blur(6px);
        border-radius: 18px;
    }
    .profile-pic-sm {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #ffd700;
        background: #222;
    }
    .profile-pic-xs {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        object-fit: cover;
        border: 1.5px solid #ffd700;
        background: #222;
    }
    .link-unstyled {
        text-decoration: none !important;
    }
    .text-gradient {
        /* background: linear-gradient(90deg, #ffd700, #00c3ff, #ff6e7f); */
        /* -webkit-background-clip: text; */
        /* -webkit-text-fill-color: transparent; */
        /* background-clip: text; */
    }
    .bg-gradient-astro {
        /* background: linear-gradient(90deg, #ffd700 0%, #00c3ff 100%); */
        /* color: #222 !important; */
        /* font-weight: 600; */
        /* border-radius: 1em; */
        /* padding: 0.3em 1em; */
        /* font-size: 0.95em; */
    }
    .z-2 { z-index: 2; }
    .mt-n5 { margin-top: -3rem !important; }
    .badge.bg-light.text-dark {
        background: #fff !important;
        color: #222 !important;
        font-weight: 600;
        border-radius: 1em;
        padding: 0.3em 1em;
        font-size: 0.95em;
        border: 1px solid #eee;
    }
    .card-title a.link-unstyled,
    h1.display-1,
    h2.card-title,
    h3.card-title,
    h4.card-title {
        color: #fff !important;
    }
    /* Responsive tweaks */
    @media (max-width: 991px) {
        .mt-n5 { margin-top: 0 !important; }
        .vh-40 { min-height: 30vh !important; }
    }
</style>
@endsection