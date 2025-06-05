@extends('layouts.main')

@section('main')
    <div class="astro-post-page">
        <div class="astro-header-bg">
            <div class="container py-5">
                <div class="row mb-3 align-items-center">
                    <div class="vh-5"></div>
                    <div class="col-12 col-md-9">
                        <h1 class="astro-title">{{$post->title}}</h1>
                        <div class="astro-meta mt-2">
                            <span><i class="bi bi-calendar-event"></i> {{date('j F Y, g:i A', strtotime($post->created_at))}}</span>
                            <span class="mx-2">|</span>
                            <span>@lang('By') <a href="/profile/{{$post->member->id}}" class="astro-author-link">{{$post->member->name}}</a></span>
                            <span class="mx-2">|</span>
                            <span class="astro-category">{{$post->category->name}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                        <button class="btn btn-outline-light btn-sm me-2" id="ecb"><i class="uil uil-eye"></i> @lang('Eye Comfort')</button>
                        <button class="btn btn-outline-light btn-sm" id="share"><i class="uil uil-copy-alt"></i> @lang('Copy Link')</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8">
                    <article class="astro-content p-5 rounded-4 shadow-lg text-justify" id="main-content">
                        {!! Str::markdown($post->content) !!}
                    </article>
                    <div class="astro-references mt-5">
                        {{-- Optionally, render references/footnotes here if available --}}
                        @if(isset($post->references) && count($post->references))
                            <h3>@lang('References')</h3>
                            <ol>
                                @foreach($post->references as $ref)
                                    <li>{!! $ref !!}</li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="astro-sidebar p-4 rounded-4 shadow-sm">
                        <div class="astro-author-card text-center mb-4 p-4 rounded-4">
                            <img src="/storage/{{$post->member->photo}}" alt="{{$post->member->name}}" class="astro-author-pic mb-3 shadow">
                            <h2 class="astro-author-name mb-1">{{$post->member->name}}</h2>
                            <p class="astro-author-role mb-1">{{$post->executive->position}}@if($post->executive->year == 2) Team @endif</p>
                            <p class="astro-author-panel mb-2">{{$post->panel->host_year}}<sup>th</sup> Panel</p>
                            <a href="/profile/{{$post->member->id}}" class="astro-profile-btn mt-2">@lang('Visit Profile')</a>
                        </div>
                        @if($more_posts != null)
                            <div class="astro-more-posts mt-4">
                                <h6 class="astro-more-title mb-3">@lang('More from') {{$post->member->name}}</h6>
                                <div class="astro-more-list">
                                    @foreach($more_posts as $more_post)
                                        <a href="/{{$type}}/{{$more_post->id}}" class="astro-more-card d-flex align-items-center mb-3 p-3 rounded-3 shadow-sm">
                                            <div class="astro-more-icon me-3">
                                                <i class="bi bi-journal-text"></i>
                                            </div>
                                            <div class="astro-more-info flex-grow-1">
                                                <div class="astro-more-title-link">{{$more_post->title}}</div>
                                                <div class="astro-more-date">{{date('j M Y', strtotime($more_post->created_at))}}</div>
                                            </div>
                                            <div class="astro-more-arrow ms-2">
                                                <i class="bi bi-arrow-right-circle"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        {{-- Related by topic --}}
                        @if(isset($related_posts) && count($related_posts))
                            <div class="astro-related-posts mt-4">
                                <h6 class="text-secondary mb-2">@lang('Related Articles')</h6>
                                <ul class="list-unstyled">
                                    @foreach($related_posts as $rel_post)
                                        <li class="mb-2">
                                            <a href="/{{$type}}/{{$rel_post->id}}" class="astro-more-link">{{$rel_post->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Roboto:wght@400;500;700&display=swap');

        body {
            background: #0d1b2a;
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-header-bg,
        .astro-title,
        .astro-meta,
        .astro-content,
        .astro-content h1, .astro-content h2, .astro-content h3, .astro-content h4,
        .astro-author-name,
        .astro-author-role,
        .astro-author-panel,
        .astro-profile-btn,
        .astro-more-title,
        .astro-more-title-link,
        .astro-more-date,
        .astro-more-arrow,
        .astro-sidebar,
        .astro-more-card,
        .astro-more-icon {
            font-family: 'Inter', 'Roboto', Arial, sans-serif !important;
        }
        .astro-content {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-content h1, .astro-content h2, .astro-content h3, .astro-content h4 {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-author-name {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-meta {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-profile-btn {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-more-title-link {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-more-date {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-more-arrow {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-sidebar {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-more-card {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-more-icon {
            font-family: 'Inter', 'Roboto', Arial, sans-serif;
        }
        .astro-header-bg {
            background: linear-gradient(120deg, #0f2027 0%, #203a43 50%, #2c5364 100%), url('/images/stars-bg.svg');
            background-size: cover;
            background-repeat: no-repeat;
            border-bottom: 2px solid #3ec6e0aa;
        }
        .astro-title {
            color: #3ec6e0;
            font-size: 2.7rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            margin-bottom: 0.3em;
            font-family: 'Merriweather', 'Georgia', serif;
        }
        .astro-meta {
            color: #bfc9d1;
            font-size: 1.08rem;
            font-family: 'Inter', sans-serif;
        }
        .astro-meta a.astro-author-link {
            color: #3ec6e0;
            text-decoration: underline;
        }
        .astro-meta .astro-category {
            background: #3ec6e0;
            color: #222;
            border-radius: 0.5em;
            padding: 0.2em 0.7em;
            font-weight: 600;
            font-size: 0.98em;
        }
        .astro-content {
            background: rgba(20, 20, 40, 0.97);
            color: #e6e6e6;
            font-size: 1.15rem;
            line-height: 1.85;
            letter-spacing: 0.01em;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
            min-height: 350px;
            font-family: 'Merriweather', 'Georgia', serif;
        }
        .astro-content h1, .astro-content h2, .astro-content h3, .astro-content h4 {
            color: #3ec6e0;
            font-family: 'Merriweather', 'Georgia', serif;
            margin-top: 2.2rem;
            margin-bottom: 1.1rem;
            font-weight: 700;
            line-height: 1.25;
        }
        .astro-content h1 { font-size: 2.2rem; border-bottom: 2px solid #3ec6e0; padding-bottom: 0.3em; }
        .astro-content h2 { font-size: 1.7rem; border-bottom: 1px solid #3ec6e0; padding-bottom: 0.2em; }
        .astro-content h3 { font-size: 1.3rem; }
        .astro-content h4 { font-size: 1.1rem; }
        .astro-content p, .astro-content ul, .astro-content ol, .astro-content blockquote {
            margin-bottom: 1.3em;
            font-size: 1.08em;
        }
        .astro-content blockquote {
            border-left: 4px solid #3ec6e0;
            background: rgba(62,198,224,0.07);
            padding: 0.8em 1.2em;
            font-style: italic;
            color: #b0e0ef;
        }
        .astro-content pre, .astro-content code {
            background: #1a263a;
            color: #3ec6e0;
            border-radius: 6px;
            padding: 0.2em 0.5em;
            font-size: 1em;
        }
        .astro-content pre {
            padding: 1em;
            overflow-x: auto;
        }
        .astro-content img {
            max-width: 100%;
            height: auto;
            margin: 1.5em 0;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }
        .astro-content figure {
            margin: 2em 0;
            text-align: center;
        }
        .astro-content figcaption {
            color: #bfc9d1;
            font-size: 0.98em;
            margin-top: 0.5em;
        }
        .astro-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5em;
        }
        .astro-content th, .astro-content td {
            border: 1px solid #444;
            padding: 0.7em 1em;
        }
        .astro-content th {
            background: #1a263a;
            color: #3ec6e0;
        }
        .astro-content hr {
            border: none;
            border-top: 2px solid #3ec6e0;
            margin: 2em 0;
        }
        .astro-content .katex, .astro-content .MathJax {
            font-size: 1.15em;
            background: none;
            color: #e6e6e6;
        }
        .astro-content ul, .astro-content ol {
            padding-left: 2em;
        }
        .astro-content li {
            margin-bottom: 0.5em;
        }
        .astro-content a {
            color: #3ec6e0;
            text-decoration: underline;
        }
        .astro-content a:hover {
            color: #fff;
            background: #3ec6e0;
            text-decoration: none;
            border-radius: 4px;
            padding: 0 0.2em;
        }
        .astro-author-card {
            background: linear-gradient(135deg, rgba(62,198,224,0.10) 0%, rgba(20,20,40,0.98) 100%);
            box-shadow: 0 4px 24px 0 rgba(62,198,224,0.10);
            border: 1px solid #2a3a4a;
            color: #e6e6e6;
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .astro-author-card:hover {
            box-shadow: 0 8px 32px 0 rgba(62,198,224,0.18);
            transform: translateY(-2px) scale(1.01);
        }
        .astro-author-pic {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            border: 2.5px solid #3ec6e0;
            background: #1a263a;
            box-shadow: 0 2px 12px rgba(62,198,224,0.10);
        }
        .astro-author-name {
            color: #3ec6e0;
            font-size: 1.25rem;
            font-weight: 700;
            letter-spacing: 0.03em;
        }
        .astro-author-role {
            color: #b0e0ef;
            font-size: 1.05rem;
            margin-bottom: 0.2em;
        }
        .astro-author-panel {
            color: #7fd1e3;
            font-size: 0.98rem;
            margin-bottom: 0.5em;
        }
        .astro-profile-btn {
            display: inline-block;
            background: linear-gradient(90deg, #3ec6e0 0%, #1a263a 100%);
            color: #fff !important;
            border: none;
            border-radius: 2em;
            padding: 0.45em 1.4em;
            font-size: 1.01em;
            font-weight: 600;
            letter-spacing: 0.02em;
            box-shadow: 0 2px 8px rgba(62,198,224,0.10);
            text-decoration: none;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        }
        .astro-profile-btn:hover {
            background: linear-gradient(90deg, #1a263a 0%, #3ec6e0 100%);
            color: #3ec6e0 !important;
            box-shadow: 0 4px 16px rgba(62,198,224,0.18);
            text-decoration: none;
        }
        @media (max-width: 991px) {
            .astro-content {
                padding: 2em 1em;
                font-size: 1.05rem;
            }
            .astro-author-pic {
                width: 70px;
                height: 70px;
            }
        }
        @media (max-width: 600px) {
            .astro-content {
                padding: 1em 0.3em;
                font-size: 0.98rem;
            }
            .astro-title {
                font-size: 1.5rem !important;
            }
        }
        .astro-more-title {
            color: #3ec6e0;
            font-size: 1.08rem;
            font-weight: 600;
            letter-spacing: 0.01em;
        }
        .astro-more-list {
            display: flex;
            flex-direction: column;
            gap: 0.5em;
        }
        .astro-more-card {
            background: rgba(62,198,224,0.07);
            color: #e6e6e6;
            border: 1px solid #2a3a4a;
            transition: box-shadow 0.18s, background 0.18s, transform 0.18s;
            text-decoration: none;
            box-shadow: 0 2px 8px rgba(62,198,224,0.07);
        }
        .astro-more-card:hover {
            background: rgba(62,198,224,0.18);
            box-shadow: 0 4px 16px rgba(62,198,224,0.13);
            color: #3ec6e0;
            transform: translateY(-2px) scale(1.01);
            text-decoration: none;
        }
        .astro-more-icon {
            font-size: 1.5em;
            color: #3ec6e0;
            flex-shrink: 0;
        }
        .astro-more-title-link {
            font-size: 1.08em;
            font-weight: 600;
            color: #e6e6e6;
            margin-bottom: 0.1em;
            transition: color 0.18s;
        }
        .astro-more-card:hover .astro-more-title-link {
            color: #3ec6e0;
        }
        .astro-more-date {
            font-size: 0.93em;
            color: #b0e0ef;
        }
        .astro-more-arrow {
            font-size: 1.3em;
            color: #3ec6e0;
            flex-shrink: 0;
            transition: color 0.18s;
        }
        .astro-more-card:hover .astro-more-arrow {
            color: #fff;
        }
    </style>

    <!-- SEO & Social Meta Tags -->
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{{ Str::limit(strip_tags($post->content), 150) }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="/storage/{{$post->member->photo}}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{$post->title}}" />
    <meta name="twitter:description" content="{{ Str::limit(strip_tags($post->content), 150) }}" />
    <meta name="twitter:image" content="/storage/{{$post->member->photo}}" />
    <meta name="description" content="{{ Str::limit(strip_tags($post->content), 160) }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Article",
      "headline": "{{$post->title}}",
      "author": {
        "@type": "Person",
        "name": "{{$post->member->name}}"
      },
      "datePublished": "{{$post->created_at}}",
      "image": "{{ url('/storage/'.$post->member->photo) }}",
      "articleSection": "{{$post->category->name}}",
      "url": "{{ url()->current() }}"
    }
    </script>

    <!-- MathJax for scientific notation -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <script>
        const shareBtn = document.getElementById('share');
        shareBtn.addEventListener('click', () => {
            const link = window.location.href;
            navigator.clipboard.writeText(link)
                .then(() => {
                    shareBtn.innerHTML = '<i class="uil uil-check-circle"></i> Copied!';
                    setTimeout(() => {
                        shareBtn.innerHTML = '<i class="uil uil-copy-alt"></i> Copy Link';
                    }, 4000);
                })
                .catch((error) => {
                    console.error('Failed to copy link to clipboard:', error);
                });
        });
        const eyecomfortbtn = document.getElementById('ecb');
        const maincontent = document.getElementById('main-content');
        let eyeComfortActive = false;
        eyecomfortbtn.addEventListener('click', () => {
            eyeComfortActive = !eyeComfortActive;
            if (eyeComfortActive) {
                maincontent.classList.remove('text-light');
                maincontent.classList.add('text-secondary');
                maincontent.style.backgroundColor = '#1a263a';
                maincontent.style.color = '#b2e0e6';
            } else {
                maincontent.classList.remove('text-secondary');
                maincontent.classList.add('text-light');
                maincontent.style.backgroundColor = '';
                maincontent.style.color = '';
            }
        });
    </script>
@endsection
