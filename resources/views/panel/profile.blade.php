@extends('layouts.main')

@section('main')

<!-- SEO & Open Graph -->
<title>{{ $member->name }} | IUT Al-Fazari Interstellar Society</title>
<meta name="description" content="Profile of {{ $member->name }}, {{ $member->student_id }}, {{ $member->department }} at Islamic University of Technology. {{ $member->bio }}">
<meta property="og:title" content="{{ $member->name }} - IUT Astronomy Club">
<meta property="og:description" content="{{ $member->bio }}">
<meta property="og:type" content="profile">
<meta property="og:image" content="/storage/{{ $member->photo }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:site_name" content="IUT Al-Fazari Interstellar Society">
<meta name="twitter:card" content="summary_large_image">

<!-- Google Fonts, Bootstrap, Font Awesome -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
  --primary: #101624;
  --secondary: #182032;
  --accent: #6ec1e4;
  --accent-dark: #3a8ecb;
  --light: #eafaf1;
  --glass-bg: rgba(110,193,228,0.10);
  --glass-border: rgba(110,193,228,0.18);
}
body, .prbg {
  background: var(--primary) !important;
  color: var(--light);
  font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
}
.prbg {
  background-image: url('/rsx/prbg.jpg');
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  min-height: 100vh;
}
.details-card {
  background: var(--glass-bg);
  padding: 2.5rem 2.2rem;
  border-radius: 18px;
  backdrop-filter: blur(12px);
  border: 2.5px solid var(--glass-border);
  box-shadow: 0 4px 24px 0 rgba(110,193,228,0.10), 0 1.5px 8px 0 rgba(58,142,203,0.10);
  margin-bottom: 2.5rem;
}
.pro-pic-xl {
  width: 270px;
  height: 270px;
  border-radius: 22px;
  border: 5px solid var(--accent);
  object-fit: cover;
  background: var(--secondary);
  box-shadow: 0 2px 18px 0 rgba(110,193,228,0.13);
  transition: 0.4s cubic-bezier(.4,2,.6,1);
}
.pro-pic-xl:hover {
  transform: scale(1.06) rotate(-2deg);
  box-shadow: 0 0 32px 6px var(--accent-dark);
}
.display-2, .display-4, .display-6, .fs-4, .h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: 'Montserrat', 'Roboto', Arial, sans-serif;
}
.display-2 {
  color: var(--accent);
  font-weight: 700;
  letter-spacing: 0.5px;
}
.display-6, .fs-4 {
  color: var(--light);
  font-weight: 500;
}
.text-accent {
  color: var(--accent) !important;
}
.btn-outline-light, .btn-outline-success {
  border-radius: 30px;
  border: 1.5px solid var(--accent);
  color: var(--accent);
  background: transparent;
  font-weight: 600;
  transition: background 0.2s, color 0.2s, border-color 0.2s;
}
.btn-outline-light:hover, .btn-outline-light:focus, .btn-outline-success:hover, .btn-outline-success:focus {
  background: linear-gradient(90deg, var(--accent), var(--accent-dark));
  color: #fff;
  border-color: var(--accent-dark);
}
.btn-primary, .btn-dark {
  background: linear-gradient(135deg, var(--accent), var(--accent-dark));
  border: none;
  color: #fff;
  font-weight: 700;
  border-radius: 30px;
  transition: box-shadow 0.2s, transform 0.2s;
}
.btn-primary:hover, .btn-dark:hover {
  box-shadow: 0 0 16px 2px var(--accent-dark);
  color: #fff;
  transform: translateY(-2px) scale(1.03);
}
.stats-box {
  background: var(--glass-bg);
  border-radius: 14px;
  border: 1.5px solid var(--glass-border);
  box-shadow: 0 2px 8px rgba(110,193,228,0.10);
  padding: 1.5rem 1.2rem;
  margin-bottom: 1.5rem;
  text-align: center;
}
.stats-label {
  color: var(--accent);
  font-size: 1.1rem;
  font-weight: 600;
  letter-spacing: 0.2px;
}
.stats-value {
  color: var(--light);
  font-size: 2.1rem;
  font-weight: 700;
  margin-bottom: 0.2rem;
}
@media (max-width: 900px) {
  .pro-pic-xl {
    width: 180px;
    height: 180px;
  }
  .details-card {
    padding: 1.2rem 0.7rem;
  }
}
@media (max-width: 600px) {
  .display-2 {
    font-size: 2.1rem;
  }
  .pro-pic-xl {
    width: 120px;
    height: 120px;
  }
  .details-card {
    padding: 0.7rem 0.5rem;
  }
}
</style>

<div class="prbg">
    <div class="vh-20"></div>
    <div class="container">
        <div class="details-card">
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="/storage/{{$member->photo}}" alt="{{$member->name}}" class="pro-pic-xl">
                </div>
                <div class="col-md-8">
                    <h1 class="display-2 mb-2">{{$member->name}}</h1>
                    <h2 class="display-6 mb-2">{{ strtoupper($executive->position) }} @if($executive->year == 2) TEAM @endif, Panel {{$panel->host_year}}</h2>
                    <div class="fs-4 mb-3">{{$member->student_id}}, {{$member->department}}, Islamic University of Technology</div>
                    <div class="d-flex flex-wrap gap-2 mb-3">
                        @if($member->facebook_link != null)
                        <a href="{{$member->facebook_link}}" class="btn btn-outline-light btn-lg" target="_blank"><i class="fab fa-facebook"></i> facebook</a>
                        @endif
                        @if($member->linkedin_link != null)
                        <a href="{{$member->linkedin_link}}" class="btn btn-outline-light btn-lg" target="_blank"><i class="fab fa-linkedin"></i> linkedin</a>
                        @endif
                        @if($member->instagram_link != null)
                        <a href="{{$member->instagram_link}}" class="btn btn-outline-light btn-lg" target="_blank"><i class="fab fa-instagram"></i> instagram</a>
                        @endif
                        @if($member->portfolio_link != null)
                        <a href="{{$member->portfolio_link}}" class="btn btn-outline-light btn-lg" target="_blank"><i class="fa-solid fa-user-astronaut"></i> portfolio</a>
                        @endif
                        @if(session('member_id') == $member->id && ($member->facebook_link == null || $member->linkedin_link == null || $member->instagram_link == null || $member->portfolio_link == null))
                        <a href="#" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-user-astronaut"></i> Add Social Links</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="details-card">
            <div class="row">
                <div class="col-md-4">
                    <div class="stats-box mb-3">
                        <div class="stats-label">News</div>
                        <div class="stats-value">{{$newsCount}}</div>
                    </div>
                    <div class="stats-box mb-3">
                        <div class="stats-label">Articles</div>
                        <div class="stats-value">{{$articleCount}}</div>
                    </div>
                    <div class="stats-box">
                        <div class="stats-label">Workshops</div>
                        <div class="stats-value">{{$speakerCount}}</div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h1 class="display-4 mb-3">About Me
                        @if(session('member_id') == $member->id)
                            <button class="btn btn-outline-light btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#bio-modal"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                            @if(strtolower(session('position')) == 'president')
                            <button class="btn btn-outline-light btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#pm"><i class="fa fa-pencil" aria-hidden="true"></i> President's Message</button>
                            @endif
                        @endif
                    </h1>
                    <p class="fs-5" style="text-align: justify">{{$member->bio}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="vh-10"></div>
</div>


@if(session('member_id') == $member->id)

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Social Links</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/update_links/{{$member->id}}" method="post">
            @csrf
            <div class="form-floating mb-3">
                <input name="fb" type="url" class="form-control" value="{{$member->facebook_link}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Facebook Link</label>
            </div>
            <div class="form-floating mb-3">
                <input name="ig" type="url" class="form-control" value="{{$member->instagram_link}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Instagram Link</label>
            </div>
            <div class="form-floating mb-3">
                <input name="li" type="url" class="form-control" value="{{$member->linkedin_link}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">linkedin Link</label>
            </div>
            <div class="form-floating mb-3">
                <input name="port" type="url" class="form-control" value="{{$member->portfolio_link}}" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Postfolio Link</label>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <div class="modal fade" id="bio-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Write your bio here</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/updatebio/{{session('member_id')}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <textarea name="bio" class="form-control" placeholder="About You..." id="floatingTextarea2" style="height: 300px;">
                        {{$member->bio}}
                    </textarea>
                    <label for="floatingTextarea2">About You</label>
                </div>
                <button type="submit" class="btn btn-dark" style="width: 100%">Save</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>


  <div class="modal fade" id="pm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">President's Message</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/updatepm/{{$panel->id}}" method="post">
                @csrf
                <div class="form-floating mb-3">
                    <textarea name="pm" class="form-control" placeholder="About You..." id="floatingTextarea2" style="height: 300px;">
                        {{$panel->president_message}}
                    </textarea>
                    <label for="floatingTextarea2">Write the message here ...</label>
                </div>
                <button type="submit" class="btn btn-dark" style="width: 100%">Save</button>
            </form>
        </div>
        
      </div>
    </div>
  </div>

@endif


<style>
    .prbg{
        background-image: url('/rsx/prbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
    }

    .pro-pic-xl{
        width: 350px;
        height: auto;
        border-radius: 15px;
        border: 8px solid white;
        backdrop-filter: brightness(0);
        transition: 0.5s ease-in-out;
        transform: translate(0, -30%);
    }

    .pro-pic-xl:hover{
        transform: translate(0, -30%) scale(1.1);
        transition: 0.5s ease-in-out;
    }

    .details-card{
        background: rgba(0,0,0,0.8);
        padding: 40px;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 7px solid rgba(255,255,255,1);
    }
</style>

@endsection