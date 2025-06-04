@extends('layouts.main')

@section('main')
@php
    $event = $workshop;    
@endphp
    <!-- Schema.org markup for Event -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "EducationEvent",
      "name": "{{$event->title}}",
      "startDate": "{{date('c', strtotime($event->start_date))}}",
      "endDate": "{{date('c', strtotime($event->end_date))}}",
      "eventAttendanceMode": "https://schema.org/MixedEventAttendanceMode",
      "eventStatus": "https://schema.org/EventScheduled",
      "location": {
        "@type": "Place",
        "name": "{{$event->location}}",
        "address": {
          "@type": "PostalAddress",
          "addressLocality": "Dhaka",
          "addressCountry": "BD"
        }
      },
      "image": [
        "https://images.unsplash.com/photo-1462331940025-496dfbfc7564?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80"
      ],
      "description": "{{ strip_tags($event->description) }}",
      "organizer": {
        "@type": "Organization",
        "name": "IUT Al-Fazari Interstellar Society"
      },
      "offers": {
        "@type": "Offer",
        "url": "{{$event->link}}",
        "price": "0",
        "priceCurrency": "BDT",
        "availability": "https://schema.org/InStock"
      },
      "performer": {
        "@type": "PerformingGroup",
        "name": "Workshop Speakers"
      }
    }
    </script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #101624;
            --secondary: #182032;
            --accent: #4ecb7a;
            --accent-dark: #2fa35a;
            --light: #eafaf1;
            --star: #4ecb7a;
        }
        body {
            background: var(--primary);
            color: var(--light);
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(var(--star), rgba(78,203,122,.10) 2px, transparent 10px),
                radial-gradient(var(--accent), rgba(78,203,122,.08) 1px, transparent 5px);
            background-size: 50px 50px, 30px 30px;
            background-position: 0 0, 20px 20px;
            opacity: 0.10;
            z-index: -1;
        }

        .hero-section {
            background: linear-gradient(rgba(16,22,36,0.95), rgba(40,56,50,0.85)), 
                        url('https://images.unsplash.com/photo-1462331940025-496dfbfc7564?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80') center/cover;
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
            border-bottom: 3px solid var(--accent);
        }

        .workshop-title {
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            font-weight: 700;
            color: var(--accent);
            letter-spacing: 0.5px;
            position: relative;
            display: inline-block;
            padding-bottom: 12px;
            text-shadow: none;
        }
        .workshop-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
        }

        .organizer {
            font-size: 1.1rem;
            color: var(--accent);
            background: rgba(78,203,122,0.10);
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            border: 1px solid rgba(78,203,122,0.18);
        }

        .details-card {
            background: rgba(24,32,50,0.92);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            border: 1px solid rgba(78,203,122,0.18);
            box-shadow: 0 2px 8px rgba(78,203,122,0.06);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
            position: relative;
            overflow: hidden;
        }
        .details-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--accent);
            box-shadow: none;
        }
        .details-card:hover {
            transform: translateY(-5px) scale(1.02);
            border-color: var(--accent);
            box-shadow: 0 4px 16px 0 rgba(78,203,122,0.10);
        }
        .detail-icon {
            font-size: 1.6rem;
            color: var(--accent);
            width: 44px;
            height: 44px;
            background: rgba(78,203,122,0.13);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: none;
        }
        .countdown {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        .countdown-item {
            background: rgba(78,203,122,0.13);
            padding: 12px;
            border-radius: 10px;
            min-width: 65px;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: none;
            border: 1.5px solid var(--accent-dark);
        }
        .countdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--accent);
            box-shadow: none;
        }
        .countdown-value {
            font-size: 1.3rem;
            font-weight: 700;
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            color: var(--accent);
            text-shadow: none;
        }
        .countdown-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--light);
        }
        .section-title {
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            font-weight: 700;
            color: var(--accent);
            position: relative;
            padding-bottom: 12px;
            margin-bottom: 25px;
            text-shadow: none;
        }
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100px;
            height: 3px;
            background: var(--accent);
        }
        .speaker-card {
            background: rgba(24,32,50,0.92);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            border: 1px solid rgba(78,203,122,0.18);
            padding: 20px;
            margin-bottom: 20px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(78,203,122,0.06);
        }
        .speaker-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--accent);
            box-shadow: none;
        }
        .speaker-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 4px 16px 0 var(--accent);
        }
        .speaker-photo {
            width: 80px;
            height: 106px;
            object-fit: cover;
            object-position: top center;
            border-radius: 12px;
            border: 2px solid var(--secondary);
            margin-right: 20px;
            background: #101624;
            box-shadow: none;
        }
        .speaker-name {
            font-weight: 700;
            font-size: 1.15rem;
            color: var(--accent);
            margin-bottom: 5px;
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            text-shadow: none;
        }
        .speaker-info {
            color: var(--light);
            font-size: 0.97rem;
            margin-bottom: 10px;
        }
        .workshop-details {
            background: rgba(24,32,50,0.92);
            backdrop-filter: blur(6px);
            border-radius: 15px;
            border: 1px solid rgba(78,203,122,0.18);
            padding: 30px;
            margin: 2rem 0;
            box-shadow: 0 2px 8px rgba(78,203,122,0.06);
            position: relative;
        }
        .workshop-details::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: var(--accent);
            box-shadow: none;
        }
        .workshop-description {
            line-height: 1.8;
            text-align: justify;
            font-size: 1.08rem;
            color: var(--light);
        }
        .workshop-image {
            width: 100%;
            height: auto;
            border-radius: 15px;
            margin-top: 20px;
            box-shadow: none;
            border: 2px solid var(--secondary);
            object-fit: cover;
            object-position: top center;
        }
        .event-link-btn {
            background: linear-gradient(135deg, var(--accent), var(--accent-dark));
            border: none;
            padding: 14px 36px;
            font-weight: 700;
            letter-spacing: 1px;
            border-radius: 50px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            font-size: 1.15rem;
            text-shadow: none;
        }
        .event-link-btn:focus, .event-link-btn:hover {
            box-shadow: 0 0 8px 2px var(--accent-dark);
            outline: 2px solid var(--accent-dark);
            outline-offset: 2px;
        }
        .event-link-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        .event-link-btn:hover::after {
            left: 100%;
        }
        @keyframes glowPulse {
            0% { box-shadow: none; }
            100% { box-shadow: 0 0 8px 2px var(--accent-dark); }
        }
        .social-sharing {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 2rem;
        }
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.1rem;
            transition: all 0.3s;
            border: 2px solid transparent;
            background: var(--accent-dark);
            box-shadow: none;
        }
        .social-btn:hover {
            transform: translateY(-5px) scale(1.08);
            border-color: var(--accent);
            background: var(--accent);
            color: #fff;
            box-shadow: 0 0 8px 2px var(--accent-dark);
        }
        .facebook { background: #3b5998; }
        .twitter { background: #1da1f2; }
        .linkedin { background: #0077b5; }
        .whatsapp { background: #25d366; }
        .footer {
            background: rgba(8, 8, 28, 0.98);
            padding: 2rem 0;
            margin-top: 4rem;
            border-top: 1px solid var(--accent);
        }
        .footer-logo {
            font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--accent);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .footer-logo i {
            color: var(--accent);
        }
        .progress-container {
            width: 100%;
            height: 8px;
            background: rgba(78,203,122,0.10);
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .progress-bar {
            height: 100%;
            background: var(--accent);
            width: 0%;
            transition: width 0.2s ease;
        }
        @media (max-width: 768px) {
            .hero-section {
                padding: 2.5rem 0 1.5rem;
            }
            .countdown {
                flex-wrap: wrap;
                gap: 20px;
                margin-top: 16px;
            }
            .countdown-item {
                min-width: 90px;
                margin-bottom: 18px;
            }
            .speaker-card {
                flex-direction: column;
                text-align: center;
                margin-bottom: 28px;
                padding: 18px 10px;
            }
            .speaker-photo {
                margin: 0 auto 15px;
            }
            .details-card {
                margin-bottom: 22px;
                padding: 18px 10px;
            }
            .workshop-details {
                margin: 1.5rem 0;
                padding: 18px 10px;
            }
        }
        /* Animation for stars */
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }
        .star {
            position: absolute;
            background-color: var(--accent);
            border-radius: 50%;
            animation: twinkle 3s infinite ease-in-out;
            z-index: -1;
        }
    </style>

    <!-- Reading Progress Bar -->
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>
    
    <!-- Dynamic Stars Background -->
    <div id="stars-container"></div>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container py-4">
            <div class="vh-5"></div>
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="workshop-title display-4 fw-bold mb-3">
                        {{$event->title}}
                    </h1>
                    <p class="organizer mb-4">
                        Organized by <em><strong>IUT Al-Fazari Interstellar Society</strong></em>
                    </p>
                    
                    <!-- Countdown Timer -->
                    <div class="countdown mt-4">
                        <div class="countdown-item">
                            <div class="countdown-value" id="days">00</div>
                            <div class="countdown-label">Days</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="hours">00</div>
                            <div class="countdown-label">Hours</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="minutes">00</div>
                            <div class="countdown-label">Minutes</div>
                        </div>
                        <div class="countdown-item">
                            <div class="countdown-value" id="seconds">00</div>
                            <div class="countdown-label">Seconds</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Workshop Details -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Date Card -->
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Workshop Date</h3>
                            <p class="mb-0">{{date('j F Y - l', strtotime($event->start_date))}}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Time Card -->
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Workshop Time</h3>
                            <p class="mb-0">{{date('g:i A', strtotime($event->start_date))}} to {{date('g:i A', strtotime($event->end_date))}}</p>
                        </div>
                    </div>
                </div>
                
                <!-- Duration Card -->
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Duration</h3>
                            <p class="mb-0" id="durationDisplay">Calculating...</p>
                        </div>
                    </div>
                </div>
                
                <!-- Location Card -->
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Location</h3>
                            <p class="mb-0">{{$event->location}}</p>
                            <button class="btn btn-sm btn-outline-light mt-2">
                                <i class="fas fa-map-marked-alt me-1"></i> View on Map
                            </button>
                        </div>
                    </div>
                </div>
                
                @if($event->link != 'none')
                <div class="text-center mt-4">
                    <a href="{{$event->link}}" class="event-link-btn">
                        <i class="fas fa-external-link-alt"></i> Join Online Workshop
                    </a>
                </div>
                @endif
            </div>
            
            <!-- Featured Image -->
            <div class="col-lg-4">
                @if($event->featured_image != 'ws.jpg')
                <div class="details-card p-3 h-100">
                    <div class="text-center">
                        <h3 class="h5 mb-3"><i class="fas fa-image me-2"></i>Featured Image</h3>
                        <img src="/storage/{{$event->featured_image}}" alt="Workshop Featured Image" class="img-fluid rounded workshop-image">
                    </div>
                </div>
                @endif
            </div>
        </div>
        
        <!-- Speakers Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="section-title display-5"><i class="fas fa-microphone me-2"></i>Speakers</h2>
            </div>
            
            @foreach($speaker_non_members as $nmspeakers)
            <div class="col-md-6">
                <a href="{{$nmspeakers->profile_link}}" class="text-decoration-none">
                    <div class="speaker-card">
                        <div class="d-flex">
                            <img src="/storage/profile_pics/default.jpg" alt="{{$nmspeakers->name}}" class="speaker-photo">
                            <div>
                                <div class="speaker-name">{{$nmspeakers->name}}</div>
                                <div class="speaker-info">{{$nmspeakers->institution}}</div>
                                <div class="text-warning small"><i class="fas fa-external-link-alt me-1"></i> View Profile</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            
            @foreach($speaker_members as $mem)
            <div class="col-md-6">
                <a href="/profile/{{$mem->member->id}}" class="text-decoration-none">
                    <div class="speaker-card">
                        <div class="d-flex">
                            <img src="/storage/{{$mem->member->photo}}" alt="{{$mem->member->name}}" class="speaker-photo">
                            <div>
                                <div class="speaker-name">{{$mem->member->name}}</div>
                                <div class="speaker-info">{{$mem->member->student_id}}, {{$mem->member->department}}</div>
                                <div class="text-warning small"><i class="fas fa-user-graduate me-1"></i> IUT Member</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        
        <!-- Workshop Details Section -->
        <div class="row mt-5">
            <div class="col-12">
                <h2 class="section-title display-5"><i class="fas fa-book-open me-2"></i>Workshop Details</h2>
            </div>
            
            <div class="col-12">
                <div class="workshop-details">
                    <div class="workshop-description" id="workshopDescription">
                        {!! nl2br(e($workshop->description)) !!}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
   
    
    <script>
        // Create dynamic stars
        function createStars() {
            const container = document.getElementById('stars-container');
            const starCount = 150;
            
            for (let i = 0; i < starCount; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                
                // Random size between 1-3px
                const size = Math.random() * 2 + 1;
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                
                // Random position
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                
                // Random opacity and animation delay
                star.style.opacity = Math.random() * 0.5 + 0.1;
                star.style.animationDelay = `${Math.random() * 5}s`;
                
                container.appendChild(star);
            }
        }
        
        // Countdown timer
        function updateCountdown() {
            const eventDate = new Date("{{$event->start_date}}").getTime();
            const now = new Date().getTime();
            const distance = eventDate - now;
            
            if (distance > 0) {
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);
                
                document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
                document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
                document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
                document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
            } else {
                document.querySelector(".countdown").innerHTML = "<div class='alert alert-warning mb-0'>The workshop has started!</div>";
            }
        }
        
        // Calculate duration
        function calculateDuration() {
            const startDate = new Date("{{$event->start_date}}");
            const endDate = new Date("{{$event->end_date}}");
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

            document.getElementById("durationDisplay").textContent = durationStr || "Less than 1 minute";
        }
        
        // Convert URLs to clickable links
        function makeLinksClickable() {
            const description = document.getElementById('workshopDescription');
            const urlRegex = /(https?:\/\/[^\s]+)/g;
            description.innerHTML = description.innerHTML.replace(urlRegex, function(url) {
                return '<a href="' + url + '" target="_blank" class="text-warning">' + url + '</a>';
            });
        }
        
        // Reading progress bar
        function updateProgressBar() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById("progressBar").style.width = scrolled + "%";
        }
        
        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            createStars();
            updateCountdown();
            calculateDuration();
            setInterval(updateCountdown, 1000);
            makeLinksClickable();
            window.addEventListener('scroll', updateProgressBar);
        });
    </script>
</body>
</html>
@endsection