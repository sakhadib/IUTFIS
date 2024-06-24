@extends('layouts.main')

@section('main')
    <div class="post-page">
        <div class="vh-10"></div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 text-light">{{$post->title}}</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-auto">
                    <p class="lead text-secondary">
                        {{date('j F Y \a\t g:i A', strtotime($post->created_at))}}
                        by <a href="/profile/{{$post->member->id}}" class="link-success" style="text-decoration: none;">{{$post->member->name}}</a>
                    </p>
                </div>
                <div class="col-auto">
                    <p class="text-secondary lead">
                        &nbsp;| &nbsp; Topic : 
                        {{$post->category->name}}
                    </p>
                </div>
                <div class="col-auto">
                    <button class="btn-sm btn btn-outline-secondary" id="ecb"><i class="uil uil-eye"></i> eye comfort mode</button>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <!-- Use a hidden textarea to store raw markdown content -->
                    <textarea id="markdown-content" style="display: none;">{!! $post->content !!}</textarea>
                    <div class="lead text-light main-content math" style="text-align: justify" id="content">
                        <!-- This will be filled with converted HTML -->
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <img src="/storage/{{$post->member->photo}}" alt="" class="author-pic">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 df jcc mt-3">
                                <h1 class="fs-3 text-light">
                                    {{$post->member->name}}
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 df jcc">
                                <p class="text-light fs-5">
                                    {{$post->executive->position}}
                                    @if($post->executive->year == 2)
                                        Team
                                    @endif
                                    , {{$post->panel->host_year}}<sup>th</sup> Panel
                                </p>
                                
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 df jcc">
                                <a href="/profile/{{$post->member->id}}" class="btn btn-outline-light">Visit Profile</a>
                            </div>
                        </div>
                        

                        @if($more_posts != null)
                            <div class="row mt-5">
                                <div class="col-12">
                                    <p class="fs-5 text-light">More from {{$post->member->name}}</p>
                                </div>
                            </div>
                            @foreach($more_posts as $more_post)
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <a href="/post/{{$more_post->id}}" class="link-light">
                                            <p class="lead">{{$more_post->title}}</p>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .post-page {
            background-color: rgba(0, 14, 24, 1);
            min-height: 100vh;
        }

        .author-pic {
            width: 100%;
            height: auto;
            border-radius: 20px;
            border: 2px solid white;
        }
    </style>

    <!-- MathJax Configuration -->
    <script>
        window.MathJax = {
            tex: {
                inlineMath: [['$', '$'], ['\\(', '\\)']],
                displayMath: [['$$', '$$'], ['\\[', '\\]']]
            },
            svg: {
                fontCache: 'global'
            }
        };
    </script>

    <!-- Include MathJax -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <script>
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
    </script>

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

    <style>
        .main-content img {
            max-width: 100%;
            height: auto;
        }

        .main-content table {
            width: 100%;
            border-collapse: collapse;
        }

        .main-content h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .main-content h2 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .main-content h3 {
            font-size: 1.3rem;
            font-weight: bold;
        }

        .main-conten {
            color: white;
        }
    </style>
@endsection
