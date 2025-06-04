@extends('layouts.main')

@section('main')
<div class="achievements-page-dark">

  {{-- Hero / Heading --}}
  <section class="hero-ach-dark d-flex align-items-center justify-content-center text-center">
    <div class="overlay-dark"></div>
    <div class="container py-5">
      <h1 class="display-3 fw-bold text-accent mb-3">Achievements</h1>
      <p class="lead text-secondary mb-4">
        Celebrating outstanding performance in our astronomy-inspired competitions.
      </p>
      <a href="/allachievements" class="btn btn-lg btn-outline-light">
        View All Achievements
      </a>
    </div>
  </section>

  {{-- Achievements List (Alternating Cards) --}}
  <section class="achievements-list-section py-5">
    <div class="container">

      @forelse($achievements as $index => $achievement)
        @php
          // Determine whether this card should float left or right on md+
          $floatDirection = $index % 2 === 0 ? 'start' : 'end';
          $alignClass = $index % 2 === 0 ? 'align-left' : 'align-right';
        @endphp

        <div class="row justify-content-{{ $floatDirection }} mb-5">
          <div class="col-12 col-md-6">
            <a href="/achievement/{{ $achievement->id }}" class="text-decoration-none">
              <div class="achievement-card {{ $alignClass }} shadow-sm rounded">

                {{-- Competition Name + Icon --}}
                <div class="d-flex align-items-center mb-3">
                  <i class="fas fa-trophy me-2 text-accent fs-4"></i>
                  <h2 class="fs-4 fw-semibold text-light mb-0">
                    {{ $achievement->competition }}
                  </h2>
                </div>

                {{-- Date + Rank --}}
                <div class="mb-3 text-secondary fs-6">
                  <i class="fas fa-calendar-alt me-2"></i>
                  {{ date('j F, Y', strtotime($achievement->competition_date)) }}
                </div>
                <div class="mb-3 text-secondary fs-6">
                  <i class="fas fa-chart-line me-2"></i>
                  Rank: {{ $achievement->rank }}
                </div>

                {{-- Optional Short Description --}}
                @if(!empty($achievement->description))
                  <p class="text-secondary mb-4 fs-6">
                    {{ Str::limit($achievement->description, 120) }}
                  </p>
                @endif

                {{-- Call to Action --}}
                <button class="btn btn-light btn-sm">
                  Learn More
                </button>
              </div>
            </a>
          </div>
        </div>
      @empty
        <div class="row">
          <div class="col text-center">
            <div class="alert alert-warning bg-surface border-0">
              <h4 class="alert-heading text-light">No Achievements Found</h4>
              <p class="text-secondary mb-0">
                There are no recorded achievements at the moment. Please check back later!
              </p>
            </div>
          </div>
        </div>
      @endforelse

    </div>
  </section>

</div>




<style>
    /* ===== Root Variables ===== */
:root {
  --bg-dark: #0a0a1f;          /* Deep navy-black background */
  --surface: #1f1f36;          /* Slightly lighter dark for cards */
  --darker: #12121e;           /* Darker accent */
  --text-light: #e0e0e0;       /* Off-white primary text */
  --text-secondary: #a1a1b3;   /* Soft grey for secondary text */
  --text-accent: #a07bff;      /* Purple accent for headings & icons */
  --border-subtle: #2c2c45;    /* Dark, subtle border */
  --card-radius: 0.75rem;      /* Soft, modern corner radius */
  --transition-speed: 0.2s;    /* For hovers, etc. */
}

/* ===== Base ===== */
.achievements-page-dark {
  background: var(--bg-dark) url('/rsx/starfield.jpg') repeat center/cover;
  position: relative;
  overflow: hidden;
}
.achievements-page-dark::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('/rsx/twinkling.png') repeat center/cover;
  opacity: 0.4;
  animation: twinkle 200s linear infinite;
  pointer-events: none;
  z-index: 0;
}
@keyframes twinkle {
  from { background-position: 0 0; }
  to { background-position: 10000px 5000px; }
}
a {
  transition: color var(--transition-speed) ease, opacity var(--transition-speed) ease;
}
a:hover {
  opacity: 0.85;
  text-decoration: none;
}

/* ===== Hero Section ===== */
.hero-ach-dark {
  position: relative;
  height: 45vh; /* Generous vertical space */
  background: url('/images/space-hero.jpg') center/cover no-repeat;
  display: flex;
  align-items: center;
  justify-content: center;
}
.hero-ach-dark .overlay-dark {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.85);
}
.hero-ach-dark .container {
  position: relative;
  z-index: 1;
}
.hero-ach-dark h1 {
  color: var(--text-accent);
}
.hero-ach-dark p {
  color: var(--text-secondary);
}
.hero-ach-dark .btn-outline-light {
  border-color: var(--text-light);
  color: var(--text-light);
}
.hero-ach-dark .btn-outline-light:hover {
  background-color: var(--text-accent);
  border-color: var(--text-accent);
  color: var(--bg-dark);
}

/* ===== Achievements List Section ===== */
.achievements-list-section {
  background-color: var(--bg-dark);
}

/* --- Achievement Card Base --- */
.achievement-card {
  background-color: var(--surface);
  border-radius: var(--card-radius);
  padding: 1.75rem;
  position: relative;
  transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
}
.achievement-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
}

/* --- Left-Floating Cards (even indexes) --- */
.achievement-card.align-left {
  border-right: 4px solid var(--text-accent);
}
.achievement-card.align-right::before {
  content: '';
  position: absolute;
  top: 1.5rem;
  left: -12px;  /* sits just outside that 4px border */
  height: 20px;
  width: 20px;
  background-color: var(--text-accent);
  border-radius: 50%;
}

/* --- Right-Floating Cards (odd indexes) --- */
.achievement-card.align-right {
  border-left: 4px solid var(--text-accent);
}
.achievement-card.align-left::before {
  content: '';
  position: absolute;
  top: 1.5rem;
  right: -12px; /* sits just outside that 4px border */
  height: 20px;
  width: 20px;
  background-color: var(--text-accent);
  border-radius: 50%;
}

/* --- Typography & Icon Colors Inside Card --- */
.achievement-card h2 {
  color: var(--text-light);
  margin-bottom: 1rem;
}
.achievement-card .text-secondary {
  color: var(--text-secondary) !important;
}
.achievement-card .text-accent {
  color: var(--text-accent);
}

/* --- “Learn More” Button --- */
.achievement-card .btn-light {
  background-color: var(--text-accent);
  border: none;
  color: var(--bg-dark);
  transition: background-color var(--transition-speed) ease;
}
.achievement-card .btn-light:hover {
  background-color: #8d6cff; /* Slightly deeper purple on hover */
}

/* ===== Responsive Adjustments ===== */
@media (min-width: 768px) {
  /* On tablets and above, cards float left or right inside a 6-column block */
  .achievement-card {
    width: 100%;
  }
}
@media (max-width: 767px) {
  /* On mobile: force single-column, full-width cards, and remove floats/borders */
  .achievement-card {
    border-left: none !important;
    border-right: none !important;
  }
  .achievement-card::before {
    display: none;
  }
}
</style>
@endsection
