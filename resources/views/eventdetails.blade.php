@extends('layouts.main')

@section('main')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Event",
      "name": "{{$event->name}}",
      "startDate": "{{date('c', strtotime($event->start_date))}}",
      "endDate": "{{date('c', strtotime($event->end_date))}}",
      "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
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
      }
    }
</script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0b0b2b;
            --secondary: #1a1a4e;
            --accent: #4d5bce;
            --light: #e0e7ff;
            --star: #ffd700;
        }
        body {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: #fff;
            font-family: 'Montserrat', sans-serif;
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
                radial-gradient(white, rgba(255,255,255,.2) 2px, transparent 10px),
                radial-gradient(white, rgba(255,255,255,.15) 1px, transparent 5px);
            background-size: 50px 50px, 30px 30px;
            background-position: 0 0, 20px 20px;
            opacity: 0.1;
            z-index: -1;
        }
        .hero-section {
            background: linear-gradient(rgba(11, 11, 43, 0.9), rgba(26, 26, 78, 0.7)), 
                        url('https://images.unsplash.com/photo-1462331940025-496dfbfc7564?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80') center/cover;
            padding: 5rem 0;
            position: relative;
            overflow: hidden;
        }
        .event-title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(77, 91, 206, 0.5);
            letter-spacing: 1px;
        }
        .organizer {
            font-size: 1.1rem;
            color: var(--light);
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        .organizer::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
        }
        .details-card {
            background: rgba(13, 13, 40, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(77, 91, 206, 0.3);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
            margin-bottom: 1.5rem;
        }
        .details-card:hover {
            transform: translateY(-5px);
            border-color: rgba(77, 91, 206, 0.6);
        }
        .detail-icon {
            font-size: 2rem;
            color: var(--accent);
            width: 60px;
            height: 60px;
            background: rgba(77, 91, 206, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        .countdown {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        .countdown-item {
            background: rgba(77, 91, 206, 0.2);
            padding: 15px;
            border-radius: 10px;
            min-width: 80px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .countdown-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--accent);
        }
        .countdown-value {
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Orbitron', sans-serif;
            color: var(--light);
        }
        .countdown-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(224, 231, 255, 0.7);
        }
        .description-box {
            background: rgba(13, 13, 40, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: 1px solid rgba(77, 91, 206, 0.3);
            padding: 2rem;
            margin: 2rem 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .event-link-btn {
            background: linear-gradient(135deg, var(--accent), #6a5af9);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
            letter-spacing: 1px;
            border-radius: 50px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(77, 91, 206, 0.4);
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--light);
        }
        .event-link-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(77, 91, 206, 0.6);
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
        .social-sharing {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 2rem;
        }
        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }
        .social-btn:hover {
            transform: translateY(-5px);
            border-color: white;
        }
        .facebook { background: #3b5998; }
        .twitter { background: #1da1f2; }
        .linkedin { background: #0077b5; }
        .whatsapp { background: #25d366; }
        .footer {
            background: rgba(8, 8, 28, 0.9);
            padding: 2rem 0;
            margin-top: 4rem;
            border-top: 1px solid rgba(77, 91, 206, 0.3);
        }
        .footer-logo {
            font-family: 'Orbitron', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--light);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .footer-logo i {
            color: var(--star);
        }
        @media (max-width: 768px) {
            .hero-section {
                padding: 3rem 0;
            }
            .countdown {
                flex-wrap: wrap;
            }
            .countdown-item {
                min-width: 70px;
                padding: 10px;
            }
            .countdown-value {
                font-size: 1.5rem;
            }
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; }
            50% { opacity: 1; }
        }
        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: twinkle 3s infinite ease-in-out;
            z-index: -1;
        }
    </style>

    <div id="stars-container"></div>
    <section class="hero-section">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="vh-5"></div>
                <div class="col-lg-10 text-center">
                    <h1 class="event-title display-3 fw-bold mb-3">
                        {{$event->name}}
                    </h1>
                    <p class="organizer">
                        Organized by <em><strong>IUT Al-Fazari Interstellar Society</strong></em>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-calendar-day"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Event Date</h3>
                            <p class="mb-0 lead">{{date('j F Y - l', strtotime($event->start_date))}}</p>
                        </div>
                    </div>
                </div>
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Event Time</h3>
                            <p class="mb-0 lead">{{date('g:i A', strtotime($event->start_date))}} to {{date('g:i A', strtotime($event->end_date))}}</p>
                        </div>
                    </div>
                </div>
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-hourglass-half"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-3">Event Starts In</h3>
                            <div class="countdown">
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
                <div class="details-card p-4">
                    <div class="d-flex align-items-center">
                        <div class="detail-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <h3 class="h5 mb-1">Event Location</h3>
                            <p class="mb-0 lead">{{$event->location}}</p>
                            
                        </div>
                    </div>
                </div>
                <div class="description-box">
                    <h3 class="mb-4 text-center"><i class="fas fa-book-open me-2"></i> Event Description</h3>
                    <div class="lead" style="line-height: 1.8; text-align: justify;">
                        {!! nl2br(e($event->description)) !!}
                    </div>
                </div>
                <div class="text-center mt-5">
                    <a href="{{$event->link}}" class="event-link-btn">
                        <i class="fas fa-external-link-alt"></i> Visit Event Page
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        function createStars() {
            const container = document.getElementById('stars-container');
            const starCount = 150;
            for (let i = 0; i < starCount; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                const size = Math.random() * 2 + 1;
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                star.style.left = `${Math.random() * 100}%`;
                star.style.top = `${Math.random() * 100}%`;
                star.style.opacity = Math.random() * 0.5 + 0.1;
                star.style.animationDelay = `${Math.random() * 5}s`;
                container.appendChild(star);
            }
        }
        function updateCountdown() {
            const eventDate = new Date("{{$event->start_date}}" ).getTime();
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
                document.querySelector(".countdown").innerHTML = "<div class='alert alert-success mb-0'>The event has started!</div>";
            }
        }
        function makeLinksClickable() {
            const description = document.querySelector('.description-box .lead');
            const urlRegex = /(https?:\/\/[^\s]+)/g;
            description.innerHTML = description.innerHTML.replace(urlRegex, function(url) {
                return '<a href="' + url + '" target="_blank" class="text-info">' + url + '</a>';
            });
        }
        document.addEventListener('DOMContentLoaded', function() {
            createStars();
            updateCountdown();
            setInterval(updateCountdown, 1000);
            makeLinksClickable();
        });
    </script>

@endsection