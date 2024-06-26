@extends('layouts.main')

@section('main')
    <div class="main footer-bg">
        <div class="vh-10"></div>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="display-3 text-light">
                        {{$achievement->competition}}
                    </h1>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-auto">
                            <h4 class="text-info"><i class="uil uil-calender"></i> : {{date('j F Y', strtotime($achievement->competition_date))}} 
                            </h4>
                        </div>
                        <div class="col-md-auto">
                            <h4 class="text-info"><i class="uil uil-analytics"></i> : {{$achievement->rank}}</h4>
                            </h4>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="vh-5"></div>

            <div class="row mb-4 mt-2">
                <div class="col-md-auto">
                    <h1 class="display-6 text-light">
                        Winners
                    </h1>
                </div>
                <div class="col-md-auto df aic">
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="uil uil-plus"></i> Add a Winner
                    </button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    @foreach($winner_members as $mem)
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <a href="/profile/{{$mem->member->id}}" class="link-light mb-3" style="text-decoration: none; font-size: 1.5rem;">
                                <img src="/storage/{{$mem->member->photo}}" alt="" class="profile-pic"> &nbsp;
                                {{$mem->member->name}}, <span class="text-secondary">{{$mem->member->student_id}}, {{$mem->member->department}}, Islamic University of Technology</span>
                            </a>
                            <a href="/reporter/removeWinner/{{$mem->winner->id}}" class="btn btn-sm btn-outline-danger"><i class="uil uil-trash-alt"></i> Remove</a>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>

            <div class="row mt-5 mb-4">
                <div class="col-md-12 df dfc">
                    <h2 class="display-6 text-light mb-3">Details</h2>
                    <p class="lead text-light mt-4" style="text-align: justify">
                        {!! nl2br(e($achievement->story)) !!}
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
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Winner to This Achievement</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/reporter/addWinner/{{$achievement->id}}" method="post">
                @csrf
                       
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

                <div class="row">
                    <div class="col-12 df jcc">
                        <button type="submit" class="btn btn-primary">Add Winner</button>
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


@endsection