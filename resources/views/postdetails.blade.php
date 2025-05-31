@extends('layouts.main')

@section('main')
    <div class="post-page">
        <div class="vh-10"></div>
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-3 fw-bold text-white mb-2" style="letter-spacing: 1px;">{{$post->title}}</h1>
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-auto">
                    <p class="lead text-secondary mb-0">
                        <i class="bi bi-calendar-event"></i> {{date('j F Y \a\t g:i A', strtotime($post->created_at))}}
                        <span class="mx-2">|</span>
                        <span>by <a href="/profile/{{$post->member->id}}" class="fw-semibold text-white link-unstyled">{{$post->member->name}}</a></span>
                    </p>
                </div>
                <div class="col-auto">
                    <span class="badge bg-white text-dark fs-6 px-3 py-2 ms-2" style="border-radius: 1em;">{{$post->category->name}}</span>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-auto">
                    <button class="btn btn-outline-light btn-sm me-2" id="ecb"><i class="uil uil-eye"></i> Eye Comfort</button>
                    <button class="btn btn-outline-light btn-sm" id="share"><i class="uil uil-copy-alt"></i> Copy Link</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-content math post-content p-5 rounded-4 shadow-lg bg-dark-glass" style="text-align: justify; min-height: 350px;">
                        {!! Str::markdown($post->content) !!}
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col-12 text-center">
                                <img src="/storage/{{$post->member->photo}}" alt="" class="author-pic mb-3 shadow">
                                <h2 class="fs-4 text-white mb-1">{{$post->member->name}}</h2>
                                <p class="text-light fs-6 mb-1">{{$post->executive->position}}@if($post->executive->year == 2) Team @endif, {{$post->panel->host_year}}<sup>th</sup> Panel</p>
                                <a href="/profile/{{$post->member->id}}" class="btn btn-outline-light btn-sm mt-2">Visit Profile</a>
                            </div>
                        </div>
                        @if($more_posts != null)
                            <div class="row mt-4">
                                <div class="col-12">
                                    <p class="fs-6 text-light mb-2">More from {{$post->member->name}}</p>
                                </div>
                            </div>
                            @foreach($more_posts as $more_post)
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <a href="/{{$type}}/{{$more_post->id}}" class="link-light">
                                            <p class="mb-1">{{$more_post->title}}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="vh-5"></div>
    </div>

    <style>
        .post-page {
            background: linear-gradient(120deg, #0f2027 0%, #203a43 50%, #2c5364 100%);
            min-height: 100vh;
        }
        .author-pic {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            background: #222;
        }
        .main-content.post-content {
            background: rgba(20, 20, 40, 0.92);
            color: #fff;
            font-size: 1.15rem;
            line-height: 1.8;
            letter-spacing: 0.01em;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.18);
        }
        .main-content.post-content h1, .main-content.post-content h2, .main-content.post-content h3, .main-content.post-content h4 {
            color: #ffd700;
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }
        .main-content.post-content p, .main-content.post-content ul, .main-content.post-content ol, .main-content.post-content blockquote {
            margin-bottom: 1.2em;
        }
        .main-content.post-content blockquote {
            border-left: 4px solid #ffd700;
            background: rgba(255,255,255,0.05);
            padding: 0.8em 1.2em;
            font-style: italic;
            color: #e0e0e0;
        }
        .main-content.post-content pre, .main-content.post-content code {
            background: #23263a;
            color: #ffd700;
            border-radius: 6px;
            padding: 0.2em 0.5em;
            font-size: 1em;
        }
        .main-content.post-content pre {
            padding: 1em;
            overflow-x: auto;
        }
        .main-content.post-content img {
            max-width: 100%;
            height: auto;
            margin: 1.5em 0;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.15);
        }
        .main-content.post-content table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5em;
        }
        .main-content.post-content th, .main-content.post-content td {
            border: 1px solid #444;
            padding: 0.7em 1em;
        }
        .main-content.post-content th {
            background: #23263a;
            color: #ffd700;
        }
        .main-content.post-content hr {
            border: none;
            border-top: 2px solid #ffd700;
            margin: 2em 0;
        }
        .main-content.post-content .katex, .main-content.post-content .MathJax {
            font-size: 1.15em;
            background: none;
            color: #fff;
        }
        .main-content.post-content ul, .main-content.post-content ol {
            padding-left: 2em;
        }
        .main-content.post-content li {
            margin-bottom: 0.5em;
        }
        .main-content.post-content a {
            color: #ffd700;
            text-decoration: underline;
        }
        .main-content.post-content a:hover {
            color: #fff;
            background: #ffd700;
            text-decoration: none;
            border-radius: 4px;
            padding: 0 0.2em;
        }
        @media (max-width: 991px) {
            .main-content.post-content {
                padding: 2em 1em;
            }
            .author-pic {
                width: 80px;
                height: 80px;
            }
        }
    </style>



    <script>
        const shareBtn = document.getElementById('share');

        shareBtn.addEventListener('click', () => {
            const link = window.location.href;

            navigator.clipboard.writeText(link)
                .then(() => {
                    shareBtn.innerHTML = '<i class="uil uil-check-circle"></i> Copied to clipboard';
                    setTimeout(() => {
                        shareBtn.innerHTML = '<i class="uil uil-copy-alt"></i> Copy link to share';
                    }, 7000);
                })
                .catch((error) => {
                    console.error('Failed to copy link to clipboard:', error);
                });
        });
    </script>

    <!-- Include MathJax -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const rawMarkdown = document.getElementById('markdown-content').value.trim();
            const contentElement = document.getElementById('content');

            // Parse the raw markdown and set it as the innerHTML of the content element
            contentElement.innerHTML = marked.parse(rawMarkdown);

            // Ensure MathJax processes the content
            if (window.MathJax) {
                window.MathJax.typesetPromise();
            }
        });
    </script> --}}

    <script>
        const eyecomfortbtn = document.getElementById('ecb');
        const maincontent = document.getElementById('content');

        eyecomfortbtn.addEventListener('click', () => {
            if (maincontent.classList.contains('text-light')) {
                maincontent.classList.remove('text-light');
                maincontent.classList.add('text-secondary');
            } else {
                maincontent.classList.remove('text-secondary');
                maincontent.classList.add('text-light');
            }
        });
    </script>
@endsection
