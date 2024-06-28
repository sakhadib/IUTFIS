@extends('layouts.main')

@section('main')

<div class="prbg">
    <div class="vh-20"></div>
    <div class="container">
        <div class="details-card">
            <div class="row">
                <div class="col-md-4 df jcc">
                    <img src="/storage/{{$member->photo}}" alt="" class="pro-pic-xl">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-2 text-light">
                                {{$member->name}}
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-6 text-light">
                                {{ strtoupper($executive->position) }}
                                @if($executive->year == 2)
                                TEAM
                                @endif,
                                Panel {{$panel->host_year}}
                            </h1>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12">
                            <h1 class="fs-4 text-light">
                                {{$member->student_id}},
                                {{$member->department}},
                                Islamic University of Technology
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5 mt-3">
                <div class="col-12 df jcc">
                    <div class="btn-group">
                        @if($member->facebook_link != null)
                        <a href="{{$member->facebook_link}}" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-facebook"></i> facebook
                        </a>
                        @endif
                        @if($member->linkedin_link != null)
                        <a href="{{$member->linkedin_link}}" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-linkedin"></i> linkedin
                        </a>
                        @endif
                        @if($member->instagram_link != null)
                        <a href="{{$member->instagram_link}}" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-instagram"></i> instagram
                        </a>
                        @endif
                        @if($member->portfolio_link != null)
                        <a href="{{$member->portfolio_link}}" class="btn btn-outline-light btn-lg">
                            <i class="fa-solid fa-user-astronaut"></i> portfolio
                        </a>
                        @endif

                        {{-- @if(session('member_id') == $member->id) --}}

                        @if($member->facebook_link == null || $member->linkedin_link == null || $member->instagram_link == null || $member->portfolio_link == null)
                        <a href="#" class="btn btn-outline-light btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-solid fa-user-astronaut"></i> Add Social Links
                        </a>
                        @endif

                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="details-card">
            <div class="row">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-8">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                News : 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                {{$newsCount}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                Articles : 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                {{$articleCount}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                Workshops : 
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="h1 fs-3 text-light" style="font-family: jetbrains mono, monospace">
                                {{$speakerCount}}
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 df dfc aifs jcc">
                            <div class="btn-group">
                                <a href="news/{{$member->id}}" class="btn btn-outline-light">My News</a>
                                <a href="articles/{{$member->id}}" class="btn btn-outline-light">My Articles</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-4 text-light">
                                About Me
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="fs-5 text-light">
                                {{$member->bio}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vh-10"></div>
</div>


{{-- @if(session('member_id') == $member->id) --}}

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

{{-- @endif --}}


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