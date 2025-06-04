@extends('layouts.main')

@section('main')
<div class="executives-page-dark position-relative">
  <!-- Animated Astronomical Background Canvas -->
  <canvas id="astro-bg" class="astro-bg-canvas position-absolute w-100 h-100" style="z-index:0;top:0;left:0;"></canvas>

  {{-- Hero / Header --}}
  <section class="hero-exec-dark d-flex align-items-center justify-content-center text-center position-relative" style="z-index:2;">
    <div class="overlay-dark"></div>
    <div class="container py-5">
      <h1 class="display-3 fw-bold text-accent mb-2">
        Panel {{ $current_panel->host_year }} Executives
      </h1>
      <p class="lead text-secondary">
        Meet the visionaries guiding IUT Al-Fazari Interstellar Society this year.
      </p>
    </div>
  </section>

  {{-- Executives Grid --}}
  <section class="exec-list-section py-5 position-relative" style="z-index:2;">
    <div class="container">
      @if(count($executives) == 0)
        <div class="row">
          <div class="col text-center">
            <div class="alert alert-warning bg-surface border-0 text-center">
              <h4 class="alert-heading text-light">No Executives Found</h4>
              <p class="text-secondary mb-0">
                There are currently no executives listed. Check back soon!
              </p>
            </div>
          </div>
        </div>
      @else
        <div class="row g-5 justify-content-center">
          @foreach($executives as $mem)
            @php $member = $mem->member; @endphp
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex align-items-stretch">
              <div class="exec-card-modern glassmorph-card shadow-lg rounded-4 w-100 d-flex flex-column align-items-center p-0">
                <!-- Photo -->
                <div class="exec-photo-wrapper-modern position-relative w-100">
                  <a href="/profile/{{ $member->id }}">
                    <img 
                      src="{{ asset('storage/' . $member->photo) }}" 
                      alt="{{ $member->name }}" 
                      class="exec-photo-modern rounded-top-4"
                    >
                  </a>
                  <span class="exec-position-badge position-absolute top-0 end-0 m-3 px-3 py-1 rounded-pill fw-bold">
                    {{ strtoupper($mem->position) }}@if($mem->year == 2) TEAM @endif
                  </span>
                </div>
                <!-- Info -->
                <div class="exec-info-modern w-100 p-4 d-flex flex-column align-items-center">
                  <h2 class="fs-5 fw-bold text-light mb-1 text-center">
                    <a href="/profile/{{ $member->id }}" class="text-light exec-name-hover">
                      {{ $member->name }}
                    </a>
                  </h2>
                  <div class="text-secondary fs-7 mb-1 text-center">
                    {{ $member->student_id }} &nbsp;|&nbsp; {{ $member->department }}
                  </div>
                  <!-- Social Icons -->
                  <div class="d-flex gap-3 mb-3 justify-content-center">
                    @if($member->facebook_link)
                      <a href="{{ $member->facebook_link }}" target="_blank" class="social-icon-modern">
                        <i class="fab fa-facebook-f"></i>
                      </a>
                    @endif
                    @if($member->linkedin_link)
                      <a href="{{ $member->linkedin_link }}" target="_blank" class="social-icon-modern">
                        <i class="fab fa-linkedin-in"></i>
                      </a>
                    @endif
                    @if($member->instagram_link)
                      <a href="{{ $member->instagram_link }}" target="_blank" class="social-icon-modern">
                        <i class="fab fa-instagram"></i>
                      </a>
                    @endif
                  </div>
                  <!-- Portfolio & Profile Buttons -->
                  <div class="d-flex flex-column gap-2 w-100 mt-auto">
                    @if($member->portfolio_link)
                      <a 
                        href="{{ $member->portfolio_link }}" 
                        target="_blank" 
                        class="btn btn-sm btn-outline-light w-100 fw-semibold"
                      >
                        Portfolio
                      </a>
                    @endif
                    <a 
                      href="/profile/{{ $member->id }}" 
                      class="btn btn-sm btn-accent w-100 fw-semibold"
                    >
                      View Profile
                    </a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  </section>
</div>

<style>
:root {
  --bg-dark: #0a0a1f;
  --surface: #1f1f36;
  --text-light: #e0e0e0;
  --text-secondary: #a1a1b3;
  --text-accent: #a07bff;
  --border-subtle: #2c2c45;
  --card-radius: 1.25rem;
  --transition-speed: 0.2s;
  --glass-bg: rgba(31,31,54,0.85);
  --glass-blur: 12px;
}
.executives-page-dark {
  background: var(--bg-dark);
  min-height: 100vh;
  position: relative;
  overflow: hidden;
}
.astro-bg-canvas {
  position: fixed;
  top: 0; left: 0;
  width: 100vw; height: 100vh;
  pointer-events: none;
  z-index: 0;
}
.hero-exec-dark {
  position: relative;
  height: 40vh;
  background: linear-gradient(120deg, #1f1f36 60%, #2c2c45 100%);
  display: flex;
  align-items: center;
  justify-content: center;
}
.hero-exec-dark .overlay-dark {
  position: absolute;
  inset: 0;
  background: rgba(0, 0, 0, 0.85);
}
.hero-exec-dark .container {
  position: relative;
  z-index: 1;
}
.hero-exec-dark h1 {
  color: var(--text-accent);
}
.hero-exec-dark p {
  color: var(--text-secondary);
}
.exec-list-section {
  background: transparent;
}
.exec-card-modern {
  background: var(--glass-bg);
  border-radius: var(--card-radius);
  box-shadow: 0 8px 32px rgba(0,0,0,0.18);
  backdrop-filter: blur(var(--glass-blur));
  -webkit-backdrop-filter: blur(var(--glass-blur));
  border: 1.5px solid var(--border-subtle);
  transition: transform var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
  min-height: 420px;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.exec-card-modern:hover {
  transform: translateY(-6px) scale(1.02);
  box-shadow: 0 16px 48px rgba(0,0,0,0.28);
}
.exec-photo-wrapper-modern {
  width: 100%;
  /* fixed height for consistent card appearance */
  height: 250px;
  overflow: hidden;
  background: #181828;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
.exec-photo-modern {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  border-top-left-radius: var(--card-radius);
  border-top-right-radius: var(--card-radius);
  border-bottom: 4px solid var(--text-accent);
}
.exec-position-badge {
  background: var(--text-accent);
  color: var(--bg-dark);
  font-size: 0.95rem;
  box-shadow: 0 2px 8px #a07bff44;
  letter-spacing: 1px;
}
.exec-info-modern {
  width: 100%;
  padding: 1.5rem 1rem 1rem 1rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1 1 auto;
}
.exec-info-modern h2 {
  color: var(--text-light);
  font-size: 1.2rem;
}
.exec-info-modern .text-secondary {
  color: var(--text-secondary) !important;
}
.social-icon-modern {
  color: var(--text-light);
  font-size: 1.3rem;
  transition: color var(--transition-speed) ease, transform var(--transition-speed) ease;
}
.social-icon-modern:hover {
  color: var(--text-accent);
  transform: translateY(-2px) scale(1.1);
}
.btn-accent {
  background: var(--text-accent);
  color: var(--bg-dark);
  border: none;
  border-radius: 0.7rem;
  font-size: 1.05rem;
  transition: background 0.2s;
}
.btn-accent:hover {
  background: #8d6cff;
  color: #fff;
}
@media (max-width: 767px) {
  .exec-card-modern {
    min-height: 340px;
    padding: 0.7rem !important;
  }
  .exec-photo-wrapper-modern {
    height: 180px;
  }
  .exec-info-modern {
    padding: 1rem 0.5rem 0.5rem 0.5rem;
  }
}
</style>
<script>
// Simple animated starfield for astronomical background
const canvas = document.getElementById('astro-bg');
if (canvas) {
  const ctx = canvas.getContext('2d');
  let w = window.innerWidth, h = window.innerHeight;
  canvas.width = w; canvas.height = h;
  let stars = Array.from({length: 100}, () => ({
    x: Math.random() * w,
    y: Math.random() * h,
    r: Math.random() * 1.3 + 0.4,
    o: Math.random() * 0.5 + 0.5,
    s: Math.random() * 0.5 + 0.2
  }));
  function draw() {
    ctx.clearRect(0,0,w,h);
    for (const star of stars) {
      ctx.globalAlpha = star.o + 0.3 * Math.sin(Date.now()/700 + star.x);
      ctx.beginPath();
      ctx.arc(star.x, star.y, star.r, 0, 2*Math.PI);
      ctx.fillStyle = '#fff';
      ctx.shadowColor = '#a07bff';
      ctx.shadowBlur = 8;
      ctx.fill();
      ctx.shadowBlur = 0;
    }
    ctx.globalAlpha = 1;
  }
  function animate() {
    draw();
    requestAnimationFrame(animate);
  }
  animate();
  window.addEventListener('resize', () => {
    w = window.innerWidth; h = window.innerHeight;
    canvas.width = w; canvas.height = h;
    stars.forEach(star => {
      star.x = Math.random() * w;
      star.y = Math.random() * h;
    });
  });
}
</script>
@endsection
