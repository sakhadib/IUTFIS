@extends('layouts.main')



@section('main')


@php
$event = $achievement;    
@endphp

<!-- SEO & Schema.org -->
<meta name="description" content="Winners of {{ $event->competition }} held on {{ date('j F Y', strtotime($event->competition_date)) }}. See the winning team and their success story.">
<meta property="og:title" content="{{ $event->competition }} Winners">
<meta property="og:description" content="Winners of {{ $event->competition }} held on {{ date('j F Y', strtotime($event->competition_date)) }}. See the winning team and their success story.">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="IUT Al-Fazari Interstellar Society">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Event",
        "name": "{{ $event->competition }}",
        "startDate": "{{ date('c', strtotime($event->competition_date)) }}",
        "eventStatus": "https://schema.org/EventCompleted",
        "location": {
            "@type": "Place",
            "name": "Islamic University of Technology",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Dhaka",
                "addressCountry": "BD"
            }
        }
        "description": "{{ strip_tags($event->story) }}",
        "organizer": {
            "@type": "Organization",
            "name": "IUT Al-Fazari Interstellar Society"
        }
    }
</script>

<!-- Google Fonts, Bootstrap, Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #101624;
        --secondary: #182032;
        --accent: #6ec1e4; /* sky blue */
        --accent-dark: #3a8ecb; /* powder blue/darker sky blue */
        --light: #eafaf1;
        --glass-bg: rgba(110,193,228,0.10);
        --glass-border: rgba(110,193,228,0.18);
    }
    body, .main.footer-bg {
        background: var(--primary) !important;
        color: var(--light);
        font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
    }
    .winner-hero-section {
        background: linear-gradient(120deg, #101624 80%, #182032 100%);
        border-bottom: 3px solid var(--accent);
        margin-bottom: 2.5rem;
        position: relative;
    }
    .trophy-icon {
        font-size: 4rem;
        color: var(--accent);
        filter: drop-shadow(0 0 12px rgba(110,193,228,0.18));
        animation: trophy-bounce 1.5s infinite alternate;
    }
    @keyframes trophy-bounce {
        0% { transform: translateY(0); }
        100% { transform: translateY(-10px); }
    }
    .section-title {
        font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
        font-weight: 700;
        color: var(--accent);
        position: relative;
        padding-bottom: 10px;
        margin-bottom: 25px;
        font-size: 2.1rem;
    }
    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 80px;
        height: 3px;
        background: var(--accent);
    }
    .interactive-card, .team-member-card {
        background: var(--glass-bg);
        border-radius: 20px;
        border: 1.5px solid var(--glass-border);
        box-shadow: 0 4px 24px 0 rgba(110,193,228,0.10), 0 1.5px 8px 0 rgba(58,142,203,0.10);
        padding: 2.2rem 1.5rem 1.5rem 1.5rem;
        min-width: 260px;
        max-width: 340px;
        margin: 0.7rem 0.7rem 1.5rem 0.7rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        transition: box-shadow 0.2s, transform 0.2s, border-color 0.2s, background 0.2s;
        backdrop-filter: blur(8px);
        position: relative;
        overflow: hidden;
    }
    .interactive-card:hover, .interactive-card:focus-within, .team-member-card:hover {
        box-shadow: 0 0 32px 6px var(--accent-dark);
        border-color: var(--accent);
        background: linear-gradient(120deg, var(--glass-bg) 80%, rgba(58,142,203,0.13) 100%);
        transform: translateY(-4px) scale(1.03);
    }
    .competition-title {
        color: var(--accent);
        font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
        font-weight: 700;
        letter-spacing: 0.5px;
        margin-bottom: 0.5rem;
    }
    .competition-date, .competition-rank {
        color: var(--light);
        font-size: 1.15rem;
        margin-bottom: 0.5rem;
    }
    .competition-rank i, .competition-date i {
        color: var(--accent);
        margin-right: 8px;
    }
    .btn-modern {
        background: linear-gradient(135deg, var(--accent), var(--accent-dark));
        color: #fff;
        border: none;
        border-radius: 50px;
        font-weight: 700;
        padding: 12px 32px;
        font-size: 1.1rem;
        transition: box-shadow 0.2s, transform 0.2s;
        box-shadow: none;
    }
    .btn-modern:hover, .btn-modern:focus {
        box-shadow: 0 0 8px 2px var(--accent-dark);
        color: #fff;
        transform: translateY(-2px) scale(1.03);
    }
    .profile-pic-big {
        width: 80px;
        height: 80px;
        border-radius: 18px;
        border: 3px solid var(--accent);
        object-fit: cover;
        background: var(--secondary);
        margin-bottom: 18px;
        box-shadow: 0 2px 12px 0 rgba(110,193,228,0.13);
    }
    .member-info {
        color: var(--light);
        font-size: 1.08rem;
        margin-bottom: 0.5rem;
    }
    .member-name {
        color: var(--accent);
        font-weight: 700;
        font-size: 1.18rem;
        margin-bottom: 6px;
        letter-spacing: 0.2px;
    }
    .btn-outline-success.btn-sm {
        border-radius: 30px;
        border: 1.5px solid var(--accent);
        color: var(--accent);
        background: transparent;
        font-weight: 600;
        transition: background 0.2s, color 0.2s, border-color 0.2s;
    }
    .btn-outline-success.btn-sm:hover, .btn-outline-success.btn-sm:focus {
        background: linear-gradient(90deg, var(--accent), var(--accent-dark));
        color: #fff;
        border-color: var(--accent-dark);
    }
    .success-story-card {
        background: var(--glass-bg);
        border-radius: 16px;
        border: 1.5px solid var(--glass-border);
        box-shadow: 0 2px 8px rgba(110,193,228,0.10);
        padding: 2rem 1.5rem;
        margin-bottom: 2rem;
        backdrop-filter: blur(8px);
    }
    #eventDescription a {
        color: var(--accent);
        text-decoration: underline;
        word-break: break-all;
    }
    .share-achievement-box {
        background: var(--glass-bg);
        border: 1.5px solid var(--glass-border);
        box-shadow: 0 1px 4px rgba(110,193,228,0.04);
        display: inline-block;
        backdrop-filter: blur(8px);
    }
    .social-btn {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.1rem;
        transition: all 0.3s;
        border: 2px solid transparent;
        background: var(--accent-dark);
        box-shadow: 0 0 8px 1px var(--accent);
    }
    .social-btn:hover {
        transform: translateY(-5px) scale(1.08);
        border-color: var(--accent);
        background: var(--accent);
        color: #fff;
    }
    .facebook { background: #3b5998; }
    .twitter { background: #1da1f2; }
    .linkedin { background: #0077b5; }
    .whatsapp { background: #25d366; }
    @media (max-width: 900px) {
        .team-member-card, .interactive-card {
            min-width: 90vw;
            max-width: 98vw;
            padding: 1.1rem 0.7rem 1.5rem 0.7rem;
            margin-bottom: 1.1rem;
        }
        .profile-pic-big {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }
    }
    @media (max-width: 600px) {
        .winner-hero-section {
            padding: 2.5rem 0 1.5rem;
        }
        .section-title {
            font-size: 1.4rem;
            margin-bottom: 18px;
            padding-bottom: 7px;
        }
        .success-story-card {
            padding: 1.1rem 0.7rem;
            margin-bottom: 1.1rem;
        }
    }
</style>

<div class="main footer-bg">
    <div class="vh-10"></div>
    <div class="container py-5">
        <!-- Animated Confetti (Celebration) -->
        <div id="confetti-canvas" style="position:fixed;top:0;left:0;width:100vw;height:100vh;pointer-events:none;z-index:999;"></div>
        
        <!-- Hero Section with Trophy -->
        <section class="winner-hero-section text-center py-5">
            <div class="container">
                <div class="trophy-icon mb-3">
                    <i class="fa-solid fa-trophy"></i>
                </div>
                <h1 class="competition-title display-3 mb-2">{{$event->competition}}</h1>
                <div class="competition-date mb-2"><i class="fa-regular fa-calendar"></i> {{date('j F Y - l', strtotime($event->competition_date))}}</div>
                <div class="competition-rank mb-3"><i class="fa-solid fa-trophy"></i> {{$event->rank}}</div>
                <a href="{{$event->reff_link}}" class="btn btn-modern mb-3" target="_blank" rel="noopener"><i class="fa-solid fa-link"></i> View Competition</a>
            </div>
        </section>
        
        <div class="container py-4">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title"><i class="fa-solid fa-users me-2"></i>Winning Team</h2>
                </div>
                <div class="col-12 d-flex flex-wrap gap-3 justify-content-center">
                    @foreach($winner_members as $mem)
                    <div class="team-member-card interactive-card text-center">
                        <img src="/storage/{{$mem->member->photo}}" alt="{{$mem->member->name}}" class="profile-pic-big mx-auto mb-2">
                        <div class="member-name">{{$mem->member->name}}</div>
                        <div class="member-info">{{$mem->member->student_id}}, {{$mem->member->department}}, Islamic University of Technology</div>
                        <a href="/profile/{{$mem->member->id}}" class="btn btn-outline-success btn-sm mt-2">View Profile</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title"><i class="fa-solid fa-star me-2"></i>Success Story</h2>
                </div>
                <div class="col-12">
                    <div class="success-story-card">
                        <p class="lead mt-2" id="eventDescription" style="text-align: justify">
                            {!! nl2br(e($event->story)) !!}
                        </p>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
    
    
    
    <script>
        
        window.addEventListener('DOMContentLoaded', function() {
            // confettiEffect();
            // Make links clickable in story (fix: preserve HTML, only replace plain URLs)
            var eventDescriptionElement = document.getElementById('eventDescription');
            
            if (eventDescriptionElement)
            {
                let html = eventDescriptionElement.innerHTML;
                // Only replace plain URLs that are not already inside an anchor tag
                html = html.replace(/(https?:\/\/(?![^<]*?>)[^\s<]+)/g, function(url) {
                    return '<a href="' + url + '" target="_blank" rel="noopener noreferrer">' + url + '</a>';
                });
                eventDescriptionElement.innerHTML = html;
            }
        });
    </script>
    @endsection