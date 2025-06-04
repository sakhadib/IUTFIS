@extends('layouts.main')

@section('main')
<div class="events-page-dark">

  {{-- Hero Section --}}
  <section class="hero-section-dark d-flex align-items-center justify-content-center text-center">
    <div class="overlay-dark"></div>
    <div class="container py-5">
      <h1 class="display-3 fw-bold text-light mb-3">FIS Events</h1>
      <p class="lead text-secondary mb-4">
        Explore upcoming events of the IUT Al-Fazari Interstellar Society.
      </p>
      <a href="/allevents" class="btn btn-lg btn-outline-light">
        Show All Events
      </a>
    </div>
  </section>

  {{-- Events List --}}
  <section class="events-list-section py-5">
    <div class="container">
      @forelse($events as $index => $event)
        <div class="row justify-content-center mb-5">
          <div class="col-12 col-lg-10">
            <div class="event-card-dark d-flex flex-wrap flex-lg-nowrap overflow-hidden shadow-sm rounded">
              
              {{-- Metadata Column --}}
              <div class="meta-col p-4 bg-surface">
                <div class="mb-3 text-secondary fs-6">
                  <i class="fas fa-calendar-alt me-2"></i>
                  {{ date('j F, Y', strtotime($event->start_date)) }}
                </div>
                <div class="mb-3 text-secondary fs-6">
                  <i class="fas fa-clock me-2"></i>
                  {{ date('g:i A', strtotime($event->start_date)) }}
                </div>
                <div class="mb-3 text-secondary fs-6">
                  <i class="fas fa-hourglass-half me-2"></i>
                  <span class="duration" data-start="{{ date('c', strtotime($event->start_date)) }}" data-end="{{ date('c', strtotime($event->end_date)) }}">
                    —
                  </span>
                </div>
                <div class="text-secondary fs-6">
                  <i class="fas fa-map-marker-alt me-2"></i>
                  {{ $event->location }}
                </div>
                @if($event->link && $event->link !== 'none')
                  <div class="badge-online mt-4">
                    <i class="fas fa-globe me-1"></i> Online
                  </div>
                @endif
              </div>

              {{-- Content Column --}}
              <div class="content-col p-5 flex-grow-1 bg-darker border-start border-secondary-subtle">
                <h2 class="fs-3 fw-bold text-light mb-3">
                  <a href="/event/{{ $event->id }}" class="text-decoration-none text-light link-hover">
                    {{ $event->name }}
                  </a>
                </h2>
                <p class="text-secondary mb-4 fs-6">
                  {{ Str::limit($event->description, 180) }}
                </p>
                <div class="d-flex flex-wrap gap-3">
                  <a href="/event/{{ $event->id }}" class="btn btn-light btn-sm">
                    Learn More
                  </a>
                  @if($event->link && $event->link !== 'none')
                    <a href="{{ $event->link }}" target="_blank" class="btn btn-outline-light btn-sm">
                      Visit Link
                    </a>
                  @endif
                </div>
              </div>

            </div>
          </div>
        </div>
      @empty
        <div class="row">
          <div class="col text-center">
            <div class="alert alert-warning bg-surface border-0 text-center">
              <h4 class="alert-heading text-light">No Events Scheduled</h4>
              <p class="text-secondary mb-0">
                Currently, there are no upcoming events. Check back soon!
              </p>
            </div>
          </div>
        </div>
      @endforelse
    </div>
  </section>

</div>

{{-- ========== Styles ========== --}}
<style>
  /* -------- Root Variables -------- */
  :root {
    --bg-dark: #0c0c1a;
    --surface: #1e1e2f;
    --darker: #141421;
    --text-light: #e0e0e0;
    --text-secondary: #a0a0a0;
    --primary-accent: #8a7bff;
    --secondary-accent: #6b63e0;
    --border-subtle: #2b2b40;
    --card-radius: 0.75rem;
    --transition-speed: 0.2s;
}

  /* -------- Base -------- */
  .events-page-dark {
    background-color: var(--bg-dark);
    color: var(--text-light);
    font-family: 'Inter', sans-serif;
    min-height: 100vh;
}
  a {
    transition: color var(--transition-speed) ease, opacity var(--transition-speed) ease;
}
  a.link-hover:hover {
    color: var(--primary-accent) !important;
    text-decoration: none;
}
  h2 a {
    transition: color var(--transition-speed) ease;
}

  /* -------- Hero -------- */
  .hero-section-dark {
    position: relative;
    height: 45vh;
    background: url('/images/space-hero-event.jpg') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
}
  .hero-section-dark .overlay-dark {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.75);
}
  .hero-section-dark .container {
    position: relative;
    z-index: 1;
}
  .hero-section-dark h1 {
    color: var(--primary-accent);
}
  .hero-section-dark p {
    color: var(--text-secondary);
}
  .hero-section-dark .btn-outline-light {
    border-color: var(--text-light);
    color: var(--text-light);
}
  .hero-section-dark .btn-outline-light:hover {
    background-color: var(--primary-accent);
    border-color: var(--primary-accent);
    color: var(--bg-dark);
}

  /* -------- Events List Section -------- */
  .events-list-section {
    background-color: var(--bg-dark);
}
  .event-card-dark {
    background-color: var(--surface);
    border-radius: var(--card-radius);
    overflow: hidden;
}
  .event-card-dark .meta-col {
    flex: 0 0 230px;
    background-color: var(--surface);
}
  .event-card-dark .content-col {
    background-color: var(--darker);
}
  .event-card-dark .border-start {
    border-left: 2px solid var(--border-subtle);
}
  .event-card-dark h2 a {
    color: var(--text-light);
}
  .event-card-dark h2 a:hover {
    color: var(--primary-accent);
}
  .event-card-dark p {
    line-height: 1.6;
}
  .event-card-dark .text-secondary {
    color: var(--text-secondary) !important;
}
  .event-card-dark .btn-light {
    background-color: var(--primary-accent);
    border: none;
    color: var(--bg-dark);
    transition: background-color var(--transition-speed) ease;
}
  .event-card-dark .btn-light:hover {
    background-color: var(--secondary-accent);
}
  .event-card-dark .btn-outline-light {
    border-color: var(--text-light);
    color: var(--text-light);
    transition: background-color var(--transition-speed) ease, color var(--transition-speed) ease;
}
  .event-card-dark .btn-outline-light:hover {
    background-color: var(--primary-accent);
    color: var(--bg-dark);
}
  .badge-online {
    display: inline-flex;
    align-items: center;
    background-color: var(--primary-accent);
    color: var(--bg-dark);
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 0.5rem;
    margin-top: 1rem;
}
  .badge-online i {
    font-size: 0.8rem;
}

  /* -------- Responsive -------- */
    @media (max-width: 992px) {
        .event-card-dark {
            flex-direction: column;
        }
        .event-card-dark .meta-col {
            flex: 0 0 auto;
            width: 100%;
            /* Remove any left border and add a dark bottom border instead */
            border-bottom: 2px solid var(--border-subtle);
            border-left: none;
        }
        .event-card-dark .content-col {
            /* Remove the vertical border entirely */
            border-left: none !important;
            /* Add a dark top border so it lines up neatly under the metadata */
            border-top: 2px solid var(--border-subtle);
        }
    }

  @media (max-width: 576px) {
    .hero-section-dark {
      height: 30vh;
}
    .countdown-box {
      min-width: 100%;
}
    .event-card-dark .meta-col,
    .event-card-dark .content-col {
      padding: 1rem;
}
}
</style>
@endsection
