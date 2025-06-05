@extends('layouts.main')

{{-- SEO Meta Tags --}}
@section('title', $type ?? 'Posts')
@section('description', 'Explore our collection of astronomy-related ' . strtolower($type ?? 'posts') . ' curated by the University Astronomy Club.')
@section('keywords', 'astronomy, university, club, posts, articles, science, space, news')

@section('main')
<div class="posts-page-dark">

    <!-- Hero Section -->
    <section class="hero-section-dark d-flex align-items-center justify-content-center text-center">
        <div class="overlay-dark"></div>
        <div class="container">
            <h1 class="display-4 fw-bold mb-2 text-light">{{ $type ?? 'Posts' }}</h1>
            <p class="lead text-secondary">Stay updated with the latest astronomy insights from the University Astronomy Club.</p>
        </div>
    </section>

    <!-- Search Bar -->
    <section class="search-section-dark py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group dark-input-group rounded-pill overflow-hidden">
                        <span class="input-group-text bg-transparent border-0 px-3 text-secondary">
                            <i class="fas fa-search"></i>
                        </span>
                        <input
                            type="text"
                            id="searchInput"
                            class="form-control bg-transparent border-0 text-light ps-0"
                            {{-- placeholder="Search articles..." --}}
                            aria-label="Search articles"
                            style="background: transparent !important; color: #fff !important; caret-color: #ffc107;"
                            onfocus="this.placeholder=''" 
                            {{-- onblur="this.placeholder='Search articles...'" --}}
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Posts Grid (Dark) -->
    <section class="posts-section-dark py-5">
        <div class="container">
            @if(count($posts) == 0)
                <div class="alert alert-warning text-center bg-secondary text-light border-0">
                    No {{ strtolower($type ?? 'posts') }} are currently available.
                </div>
            @else
                <div class="row gx-4 gy-5" id="postsContainer">

                    {{-- Featured (Most Recent) Post Without Image --}}
                    @if(!empty($posts[0]))
                        <div class="col-12">
                            <a href="/{{ $type }}/{{ $posts[0]->id }}" class="text-decoration-none">
                                <div class="card featured-card-dark shadow-sm border-0 px-4 py-5">
                                    <div class="card-body">
                                        <h2 class="card-title display-5 fw-bold text-light mb-3">
                                            {{ $posts[0]->title }}
                                        </h2>
                                        <div class="post-meta-dark mb-4 d-flex flex-wrap align-items-center text-secondary small">
                                            <a href="/profile/{{ $posts[0]->member->id ?? 0 }}" class="d-flex align-items-center me-4 text-decoration-none text-secondary">
                                                <div class="avatar-sm-dark d-inline-flex align-items-center justify-content-center me-2 rounded-circle">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <span>{{ $posts[0]->member->name ?? 'Unknown' }}</span>
                                            </a>
                                            <div class="me-4 d-flex align-items-center">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $posts[0]->created_at ? $posts[0]->created_at->format('j M Y, g:i A') : '' }}
                                            </div>
                                            <span class="badge category-badge-dark">
                                                {{ $posts[0]->category->name ?? 'General' }}
                                            </span>
                                        </div>
                                        <p class="card-text text-light fs-6">
                                            {{ $posts[0]->content 
                                                ? \Illuminate\Support\Str::limit(
                                                      strip_tags(
                                                        str_replace(['#', '*'], '', $posts[0]->content)
                                                      ),
                                                      350
                                                  )
                                                : '' 
                                            }}
                                        </p>
                                        <button class="btn btn-outline-light btn-lg mt-3">
                                            Read More <i class="fas fa-arrow-right ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif

                    {{-- Secondary Posts (Dark Cards, No Images) --}}
                    @foreach($posts as $index => $post)
                        @continue($index == 0)
                        <div class="col-lg-4 col-md-6">
                            <a href="/{{ $type }}/{{ $post->id }}" class="text-decoration-none">
                                <div class="card post-card-dark h-100 border-0 shadow-sm">
                                    <div class="card-body d-flex flex-column">
                                        <h3 class="card-title h5 fw-semibold text-light mb-3">
                                            {{ $post->title }}
                                        </h3>
                                        <div class="post-meta-dark d-flex flex-wrap align-items-center mb-3 text-secondary small">
                                            <a href="/profile/{{ $post->member->id ?? 0 }}" class="d-flex align-items-center me-3 text-decoration-none text-secondary">
                                                <div class="avatar-xs-dark d-inline-flex align-items-center justify-content-center me-2 rounded-circle">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                                <span>{{ $post->member->name ?? 'Unknown' }}</span>
                                            </a>
                                            <div class="me-3 d-flex align-items-center">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $post->created_at ? $post->created_at->format('j M Y') : '' }}
                                            </div>
                                            <span class="badge category-badge-secondary-dark ms-auto">
                                                {{ $post->category->name ?? 'General' }}
                                            </span>
                                        </div>
                                        <p class="card-text text-secondary mb-4 fs-6 flex-grow-1">
                                            {{ $post->content 
                                                ? \Illuminate\Support\Str::limit(
                                                      strip_tags(
                                                        str_replace(['#','*'], '', $post->content)
                                                      ),
                                                      120
                                                  )
                                                : '' 
                                            }}
                                        </p>
                                        <div class="mt-auto">
                                            <button class="btn btn-sm btn-light">
                                                Read More
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            @endif
        </div>
    </section>
</div>

{{-- Dark Styles --}}
<style>
    /* Root Variables for Dark Theme */
    :root {
        --bg-dark: #121212;
        --surface: #1e1e1e;
        --on-surface: #e0e0e0;
        --on-surface-secondary: #a0a0a0;
        --primary-light: #bb86fc;
        --accent-light: #03dac6;
        --border-dark: #2a2a2a;
        --card-radius-dark: 0.75rem;
    }

    /* Base */
    .posts-page-dark {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-dark);
        color: var(--on-surface);
        min-height: 100vh;
    }
    a {
        transition: opacity 0.2s ease-in-out;
    }
    a:hover {
        opacity: 0.8;
        text-decoration: none;
    }

    /* Hero Section Dark */
    .hero-section-dark {
        position: relative;
        height: 40vh;
        background: #1a1a1a url('/images/dark-astronomy-hero.jpg') center/cover no-repeat;
        display: flex;
    }
    .overlay-dark {
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.6);
    }
    .hero-section-dark .container {
        position: relative;
        z-index: 1;
    }
    .hero-section-dark h1 {
        font-size: 3rem;
        color: var(--primary-light);
    }
    .hero-section-dark p {
        color: var(--on-surface-secondary);
    }

    /* Search Section Dark */
    .search-section-dark {
        background-color: var(--bg-dark);
    }
    .dark-input-group {
        background-color: var(--surface);
        border: 1px solid var(--border-dark);
    }
    #searchInput {
        color: var(--on-surface);
        padding: 0.75rem 1rem;
    }
    .dark-input-group .input-group-text {
        color: var(--on-surface-secondary);
    }

    /* Posts Section Dark */
    .posts-section-dark {
        background-color: var(--bg-dark);
    }

    /* Featured Card Dark */
    .featured-card-dark {
        background-color: var(--surface);
        border-radius: var(--card-radius-dark);
    }
    .featured-card-dark h2 {
        color: var(--primary-light);
    }
    .featured-card-dark p {
        color: var(--on-surface);
        line-height: 1.5;
    }
    .post-meta-dark {
        color: var(--on-surface-secondary);
    }
    .avatar-sm-dark {
        width: 36px;
        height: 36px;
        background-color: var(--border-dark);
        color: var(--on-surface-secondary);
        font-size: 1.2rem;
    }
    .category-badge-dark {
        background-color: var(--accent-light);
        color: var(--bg-dark);
        font-size: 0.8rem;
        padding: 0.25rem 0.6rem;
        border-radius: 0.5rem;
    }
    .btn-outline-light {
        border-color: var(--on-surface-secondary);
        color: var(--on-surface);
    }
    .btn-outline-light:hover {
        background-color: var(--on-surface-secondary);
        color: var(--bg-dark);
    }

    /* Secondary Cards Dark */
    .post-card-dark {
        background-color: var(--surface);
        border-radius: var(--card-radius-dark);
    }
    .post-card-dark h3 {
        color: var(--primary-light);
    }
    .post-card-dark p {
        color: var(--on-surface-secondary);
        line-height: 1.4;
    }
    .avatar-xs-dark {
        width: 28px;
        height: 28px;
        background-color: var(--border-dark);
        color: var(--on-surface-secondary);
        font-size: 1rem;
    }
    .category-badge-secondary-dark {
        background-color: var(--accent-light);
        color: var(--bg-dark);
        font-size: 0.7rem;
        padding: 0.2rem 0.5rem;
        border-radius: 0.4rem;
    }
    .btn-light {
        background-color: var(--primary-light);
        color: var(--bg-dark);
    }
    .btn-light:hover {
        background-color: var(--accent-light);
        color: var(--bg-dark);
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .hero-section-dark {
            height: 30vh;
        }
        .featured-card-dark {
            padding: 2rem 1rem;
        }
    }
</style>

{{-- JavaScript for Search Filtering --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const postItems = Array.from(document.querySelectorAll('.post-card-dark, .featured-card-dark'));

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.trim().toLowerCase();
            postItems.forEach(card => {
                const titleEl = card.querySelector('.card-title');
                const snippetEl = card.querySelector('.card-text');
                const titleText = titleEl ? titleEl.textContent.toLowerCase() : '';
                const snippetText = snippetEl ? snippetEl.textContent.toLowerCase() : '';
                const parentCol = card.closest('div[class^="col-"]');
                if (query === '' || titleText.includes(query) || snippetText.includes(query)) {
                    parentCol.style.display = '';
                } else {
                    parentCol.style.display = 'none';
                }
            });
        });
    });
</script>
@endsection
