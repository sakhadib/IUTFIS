@extends('layouts.main')

@section('main')
    <div class="main footer-bg">
        <div class="vh-10"></div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-3 text-light">
                        {{$workshop->title}}
                    </h1>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-info"><i class="uil uil-calender"></i> : {{date('j F Y \a\t g:i A', strtotime($workshop->start_date))}} 
                                &nbsp; <span class="l">to</span> &nbsp; 
                                {{date('j F Y \a\t g:i A', strtotime($workshop->end_date))}}
                            </h4>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-info"><i class="uil uil-map-marker"></i> : {{$workshop->location}}</h4>
                            </h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="vh-5"></div>

            <div class="row mb-4 mt-4">
                <div class="col-md-auto">
                    <h1 class="display-6 text-light">
                        Speakers
                    </h1>
                </div>
                <div class="col-md-auto df aic">
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil uil-plus"></i> Add a Speaker
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @foreach($speaker_non_members as $nmspeakers)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="{{$nmspeakers->profile_link}}" class="link-light mb-3" style="text-decoration: none; font-size: 1.5rem;">
                                <img src="/storage/profile_pics/default.jpg" alt="" class="profile-pic"> &nbsp;
                                {{$nmspeakers->name}}, <span class="text-secondary">{{$nmspeakers->institution}}</span>
                            </a>
                            <a href="/reporter/removeSpeaker/{{$nmspeakers->id}}" class="btn btn-sm btn-outline-danger"><i class="uil uil-trash-alt"></i> Remove</a>
                        </div>
                    </div>
                    @endforeach
                    @foreach($speaker_members as $mem)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="/profile/{{$mem->member->id}}" class="link-light mb-3" style="text-decoration: none; font-size: 1.5rem;">
                                <img src="/storage/{{$mem->member->photo}}" alt="" class="profile-pic"> &nbsp;
                                {{$mem->member->name}}, <span class="text-secondary">{{$mem->member->student_id}}, {{$mem->member->department}}, Islamic University of Technology</span>
                            </a>
                            <a href="/reporter/removeSpeaker/{{$mem->speaker->id}}" class="btn btn-sm btn-outline-danger"><i class="uil uil-trash-alt"></i> Remove</a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>

            <div class="row mt-5 mb-4">
                <div class="col-md-12 df dfc">
                    <h2 class="display-6 text-light mb-3">Details</h2>
                    <p class="lead text-light mt-4" style="text-align: justify">
                        {!! nl2br(e($workshop->description)) !!}
                    </p>
                    
                </div>
            </div>

            <div class="row text-light">
                <div class="col-md-12 mt-4">
                    @if ($errors->any())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>


        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Speaker to this workshop</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/reporter/addSpeaker/{{$workshop->id}}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-12 df jcc">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" value="member" name="btnradio" id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-dark" for="btnradio1">Member</label>
                            <input type="radio" class="btn-check" value="not_member" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-dark" for="btnradio2">Not Member</label>
                        </div>
                    </div>
                </div>
        
                <div class="row mb-3" id="member-form">
                    <div class="col-12">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect" name="member_id" aria-label="Floating label select example">
                                @foreach ($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </select>
                            <label for="floatingSelect">Select A member</label>
                        </div>
                        @if ($errors->has('member_id'))
                        <div class="text-danger">{{ $errors->first('member_id') }}</div>
                        @endif
                    </div>
                </div>
        
                <div class="row mb-3" id="non-member-form" style="display: none;">
                    <div class="col-12 mb-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputName" name="name" placeholder="Name">
                            <label for="floatingInputName">Name</label>
                        </div>
                        @if ($errors->has('name'))
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInputEmail" name="email" placeholder="Email">
                            <label for="floatingInputEmail">Email</label>
                        </div>
                        @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInputInstitution" name="institution" placeholder="Institution">
                            <label for="floatingInputInstitution">Institution</label>
                        </div>
                        @if ($errors->has('institution'))
                        <div class="text-danger">{{ $errors->first('institution') }}</div>
                        @endif
                    </div>
                    <div class="col-12 mb-2">
                        <div class="form-floating mb-3">
                            <input type="url" class="form-control" id="floatingInputProfileLink" name="profile_link" placeholder="Profile Link">
                            <label for="floatingInputProfileLink">Profile Link</label>
                        </div>
                        @if ($errors->has('profile_link'))
                        <div class="text-danger">{{ $errors->first('profile_link') }}</div>
                        @endif
                    </div>
                </div>
        
                <div class="row">
                    <div class="col-12 df jcc">
                        <button type="submit" class="btn btn-primary">Add Speaker</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

    <style>
        .main{
            min-height: 100vh;
        }

        .ws-image{
            width: 60%;
            height: auto;
            border-radius: 20px;
            border-bottom: 7px solid rgba(255, 255, 255, 0.5);
            border-top: 7px solid rgba(255, 255, 255, 0.5);
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const memberForm = document.getElementById('member-form');
        const nonMemberForm = document.getElementById('non-member-form');
        const btnRadio1 = document.getElementById('btnradio1');
        const btnRadio2 = document.getElementById('btnradio2');

        function toggleForms() {
            if (btnRadio1.checked) {
                memberForm.style.display = 'block';
                nonMemberForm.style.display = 'none';
            } else {
                memberForm.style.display = 'none';
                nonMemberForm.style.display = 'block';
            }
        }

        btnRadio1.addEventListener('change', toggleForms);
        btnRadio2.addEventListener('change', toggleForms);

        toggleForms();
    });
</script>
@endsection