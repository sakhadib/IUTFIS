@extends('layouts.main')



@section('main')
<div class="workshops-page">

    {{-- Hero Section --}}
    <section class="hero-dark d-flex align-items-center justify-content-center text-center">
        <div class="overlay"></div>
        <div class="container py-5">
            <div class="vh-5"></div>
            <h1 class="display-3 fw-bold text-light mb-2">WORKSHOPS</h1>
            <p class="lead text-secondary mb-4">
                Explore our upcoming workshops designed to enhance your knowledge.
            </p>
            <a href="/allworkshops" class="btn btn-lg btn-outline-light">
                Show All Workshops
            </a>
        </div>
    </section>

    {{-- Workshops List --}}
    <section class="list-section py-5">
        <div class="container">
            @forelse($workshops as $index => $event)
                {{-- WRAPPER: center + alternate alignment --}}
                <div class="card-wrapper d-flex {{ $index % 2 === 0 ? 'justify-content-start' : 'justify-content-end' }}">
                    <div class="workshop-card shadow-sm" data-index="{{ $index }}">
                        <div class="row g-0 align-items-center">
                            {{-- Left: Metadata --}}
                            <div class="col-md-4 py-4 px-3">
                                <div class="meta-box mb-3">
                                    <div class="fs-5 text-secondary mb-2">
                                        <i class="fas fa-calendar-alt me-2"></i>
                                        {{ date('j F, Y', strtotime($event->start_date)) }}
                                    </div>
                                    <div class="fs-5 text-secondary mb-2">
                                        <i class="fas fa-clock me-2"></i>
                                        {{ date('g:i A', strtotime($event->start_date)) }}
                                    </div>
                                    <div class="fs-5 text-secondary mb-2">
                                        <i class="fas fa-hourglass-half me-2"></i>
                                        <span class="duration" 
                                              data-start="{{ $event->start_date }}" 
                                              data-end="{{ $event->end_date }}">
                                            <!-- JS will fill -->
                                        </span>
                                    </div>
                                    <div class="fs-5 text-secondary">
                                        <i class="fas fa-map-marker-alt me-2"></i>
                                        {{ $event->location }}
                                    </div>
                                </div>

                                @if($event->link != 'none')
                                    <div class="badge badge-online mb-2">
                                        <i class="fas fa-globe me-1"></i> Online
                                    </div>
                                @endif
                            </div>

                            {{-- Right: Content --}}
                            <div class="col-md-8 py-4 px-4 border-start border-secondary-subtle">
                                {{-- COUNTDOWN (only for the most recent workshop) --}}
                                @if($loop->first)
                                    <div 
                                        id="countdown" 
                                        class="countdown-clock mb-3 text-warning fs-5" 
                                        data-start="{{ $event->start_date }}">
                                        <!-- JS will fill “Starts in …” -->
                                    </div>
                                @endif

                                <h2 class="fs-3 fw-bold text-light mb-2">
                                    <a href="/workshop/{{ $event->id }}" class="text-decoration-none text-light">
                                        {{ $event->title }}
                                    </a>
                                </h2>
                                <p class="text-secondary mb-3">
                                    {{ Str::limit($event->description, 150) }}
                                </p>
                                <a href="/workshop/{{ $event->id }}" class="btn btn-light btn-sm">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning text-center">
                    <h4 class="alert-heading">No Workshops Available</h4>
                    <p>Currently, there are no workshops scheduled. Please check back later.</p>
                </div>
            @endforelse
        </div>
    </section>

</div>

{{-- ========== STYLES ========= --}}
<style>
    /* -------- Root Colors -------- */
    :root {
        --bg-dark: #121212;
        --surface-dark: #1e1e1e;
        --text-light: #e0e0e0;
        --text-secondary: #a0a0a0;
        --accent-primary: #bb86fc;
        --accent-hover: #9a66e0;
        --border-subtle: #2a2a2a;
        --card-radius: 0.75rem;
    }

    /* -------- Base -------- */
    .workshops-page {
        background-color: var(--bg-dark);
        color: var(--text-light);
        font-family: 'Inter', sans-serif;
    }
    a {
        transition: color 0.2s ease, opacity 0.2s ease;
    }
    a:hover {
        opacity: 0.8;
        text-decoration: none;
    }

    /* -------- Hero -------- */
    .hero-dark {
        position: relative;
        height: 40vh;
        background: #1a1a1a url('/images/dark-workshop-hero.jpg') center/cover no-repeat;
        display: flex;
    }
    .hero-dark .overlay {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
    }
    .hero-dark .container {
        position: relative;
        z-index: 1;
    }
    .hero-dark h1 {
        color: var(--accent-primary);
    }
    .hero-dark p {
        color: var(--text-secondary);
    }
    .btn-outline-light {
        border-color: var(--text-light);
        color: var(--text-light);
    }
    .btn-outline-light:hover {
        background-color: var(--accent-primary);
        border-color: var(--accent-primary);
        color: var(--bg-dark);
    }

    /* -------- List Section -------- */
    .list-section {
        background-color: var(--bg-dark);
    }

    /* WRAPPER: centers each card and alternates left/right */
    .card-wrapper {
        margin-bottom: 3rem;               /* extra space between cards */
    }
    @media (min-width: 768px) {
        .card-wrapper {
            /* 90% width, so the card is not full-bleed */
            /* width: 90%; */
            /* max-width: 900px; */
        }
    }
    @media (max-width: 767px) {
        .card-wrapper {
            width: 100%;
        }
    }

    /* -------- Workshop Card -------- */
    .workshop-card {
        background-color: var(--surface-dark);
        border-radius: var(--card-radius);
        overflow: hidden;
        border: 1px solid var(--border-subtle);
        width: 100%;
    }
    .workshop-card .row {
        margin: 0;
    }
    .workshop-card .col-md-4,
    .workshop-card .col-md-8 {
        padding-left: 0;
        padding-right: 0;
    }
    .workshop-card .meta-box {
        padding-left: 1rem;
    }
    /* Left side (meta) */
    .workshop-card .col-md-4 {
        background-color: var(--surface-dark);
    }
    .workshop-card .col-md-8 {
        background-color: var(--surface-dark);
    }
    /* Title */
    .workshop-card h2 a {
        color: var(--text-light);
    }
    .workshop-card h2 a:hover {
        color: var(--accent-primary);
    }
    /* Description */
    .workshop-card p {
        line-height: 1.6;
    }
    /* Learn More Button */
    .workshop-card .btn-light {
        background-color: var(--accent-primary);
        border: none;
        color: var(--bg-dark);
    }
    .workshop-card .btn-light:hover {
        background-color: var(--accent-hover);
    }
    /* Metadata text */
    .workshop-card .fs-5,
    .workshop-card .text-secondary {
        color: var(--text-secondary);
    }
    /* Online Badge */
    .badge-online {
        display: inline-flex;
        align-items: center;
        background-color: var(--accent-primary);
        color: var(--bg-dark);
        font-size: 0.8rem;
        padding: 0.3rem 0.6rem;
        border-radius: 0.5rem;
        margin-left: 1rem;
    }
    .badge-online i {
        font-size: 0.9rem;
    }

    /* -------- Countdown Clock -------- */
    .countdown-clock {
        font-weight: 500;
    }
    .countdown-clock span {
        display: inline-block;
        min-width: 2rem;
        text-align: center;
    }

    /* -------- Responsive -------- */
    @media (max-width: 768px) {
        .hero-dark {
            height: 30vh;
        }
        .workshop-card {
            border-radius: 0.5rem;
        }
        .workshop-card .col-md-4,
        .workshop-card .col-md-8 {
            padding: 0.75rem;
        }
        .workshop-card .meta-box {
            padding-left: 0;
        }
        .card-wrapper {
            margin-bottom: 2.5rem;
        }
    }
</style>

{{-- ========== SCRIPTS ========== --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1) Populate all duration spans
        document.querySelectorAll('.duration').forEach(function(el) {
            const start = new Date(el.dataset.start);
            const end = new Date(el.dataset.end);
            const diffMs = end - start;

            const minutes = Math.floor((diffMs / 60000) % 60);
            const hours   = Math.floor((diffMs / (60000 * 60)) % 24);
            const days    = Math.floor(diffMs / (60000 * 60 * 24));

            let str = "";
            if (days) { str += days + " day" + (days > 1 ? "s " : " "); }
            if (hours) { str += hours + " hour" + (hours > 1 ? "s " : " "); }
            if (minutes) { str += minutes + " min"; }
            el.textContent = str || "0 min";
        });

        // 2) Live countdown for the very first workshop
        const countdownEl = document.getElementById('countdown');
        if (countdownEl) {
            const startTime = new Date(countdownEl.dataset.start).getTime();

            function updateCountdown() {
                const now = Date.now();
                let diff = startTime - now;

                if (diff <= 0) {
                    countdownEl.textContent = "Workshop has started!";
                    clearInterval(intervalId);
                    return;
                }

                const days    = Math.floor(diff / (1000 * 60 * 60 * 24));
                diff -= days * (1000 * 60 * 60 * 24);
                const hours   = Math.floor(diff / (1000 * 60 * 60));
                diff -= hours * (1000 * 60 * 60);
                const minutes = Math.floor(diff / (1000 * 60));
                diff -= minutes * (1000 * 60);
                const seconds = Math.floor(diff / 1000);

                // Format: “Starts in 2d 05h 12m 09s”
                const parts = [];
                if (days)    parts.push(days + "d");
                if (hours)   parts.push(("0" + hours).slice(-2) + "h");
                if (minutes) parts.push(("0" + minutes).slice(-2) + "m");
                parts.push(("0" + seconds).slice(-2) + "s");

                countdownEl.textContent = "Starts in " + parts.join(" ");
            }

            updateCountdown();
            const intervalId = setInterval(updateCountdown, 1000);
        }
    });
</script>


    <meta property="og:title" content="Workshops | University Astronomy Club" />
    <meta property="og:description" content="Explore upcoming and past astronomy workshops organized by the University Astronomy Club. Enhance your knowledge with expert-led sessions, hands-on activities, and more." />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:site_name" content="University Astronomy Club" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Workshops | University Astronomy Club" />
    <meta name="twitter:description" content="Explore upcoming and past astronomy workshops organized by the University Astronomy Club." />
    <meta name="robots" content="index, follow" />

