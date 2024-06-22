@extends('layouts.main')
@section('main')
    <div class="cm-bg df aic">
        <div class="container cm-holder">
            <div class="row">
                <div class="col-md-11 offset-md-1">
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <h1 class="text-center text-light">New Executive</h1>
                            <p class="text-light lead text-center">
                                Submissions are final and can not be undone. Be careful about the information you provide.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-5 mb-2">
                        <div class="col-md-3 df jcc aic mb-3">
                            <img src="/storage/{{$member->photo}}" alt="" class="exec-photo">
                        </div>
                        <div class="col-md-4 offset-md-1">
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    <p class="text-light lead">Name : </p>
                                </div>
                                <div class="col-md-8 col-8">
                                    <p class="text-light lead">{{ $member->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    <p class="text-light lead">Email : </p>
                                </div>
                                <div class="col-md-8 col-8">
                                    <p class="text-light lead">{{ $member->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 col-4">
                                    <p class="text-light lead">Social : </p>
                                </div>
                                <div class="col-md-8 col-8 mb-3">
                                    <a href="{{ $member->facebook_link }}" class="link-light lead">facebook</a><br>
                                    <a href="{{ $member->linkedin_link }}" class="link-light lead">linkedin</a><br>
                                    <a href="{{ $member->instagram_link }}" class="link-light lead">Instagram</a><br>
                                    <a href="{{$member->portfolio_link}}"class="link-light lead">Portfolio</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-6 col-4">
                                    <p class="text-light lead">Student ID : </p>
                                </div>
                                <div class="col-md-6 col-8">
                                    <p class="text-warning lead">{{ $member->student_id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-4">
                                    <p class="text-light lead">Dept :</p>
                                </div>
                                <div class="col-md-6 col-8">
                                    <p class="text-light lead">{{ $member->department }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-4">
                                    <p class="text-light lead">Joined : </p>
                                </div>
                                <div class="col-md-6 col-8">
                                    <p class="text-light lead">
                                        <?php
                                            $created_at = new DateTime($member->created_at);
                                            $current_date = new DateTime();
                                            $interval = $current_date->diff($created_at);
                                            if ($interval->y == 0 && $interval->m == 0 && $interval->d == 0) {
                                                echo 'Today';
                                            } elseif ($interval->y == 0 && $interval->m == 0) {
                                                echo $interval->d . ' days ago';
                                            } elseif ($interval->y == 0) {
                                                echo $interval->m . ' months, ' . $interval->d . ' days ago';
                                            } else {
                                                echo $interval->y . ' years, ' . $interval->m . ' months, ' . $interval->d . ' days ago';
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                                        
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <form action="/admin/makeexecutive" method="post">
                    @csrf
                    <div class="row">
                        <input type="number" name="member_id" value="{{$member->id}}" hidden>
                
                        <div class="col-md-2 offset-md-1">
                            <div class="form-floating mb-3">
                                <input name="year" type="number" class="form-control" id="yearInput" placeholder="name@example.com">
                                <label for="yearInput">Year</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input name="position" type="text" class="form-control" id="positionInput" placeholder="name@example.com">
                                <label for="positionInput" id="positionLabel">Position (all small letter)</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-floating mb-3">
                                <select name="panel_id" name="panel_id" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                    @foreach ($panels as $panel)
                                        <option value="{{$panel->id}}">Panel - {{$panel->host_year}}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">Panel</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 offset-md-4 df jcc">
                            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                <input name="isreporter" type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                <label class="btn btn-lg btn-outline-light" for="btncheck1">Make Reporter</label>
                
                                <input name="isadmin" type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                <label class="btn btn-lg btn-outline-light" for="btncheck2">Make Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 df jcc">
                            <button type="submit" class="btn btn-lg btn-light">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <style>
        .cm-bg{
            background-image: url("/rsx/cmbg.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .cm-holder{
            background-color: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 35px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            margin-top: 10vh;
            margin-bottom: 10vh;
        }
    </style>

    <style>
        .dropzone {
          border: 2px dashed #ffffff;
          border-radius: 5px;
          padding: 20px;
          text-align: center;
          cursor: pointer;
          background-color: rgba(255,255,255,0.6);
          min-height: 18vh;
        }
        .dropzone img {
          max-width: 100%;
          margin-top: 10px;
        }
      </style>

      <style>
        .exec-photo {
            width: 100%;
            border-radius: 10px;
            /* border-bottom: 5px solid white; */
            border: 5px solid white;
        }

        
      </style>

<script>
    document.getElementById('yearInput').addEventListener('input', function() {
        var year = this.value;
        var positionInput = document.getElementById('positionInput');
        var positionLabel = document.getElementById('positionLabel');

        if (year == 2) {
            positionLabel.textContent = 'Assigned Team (all small letter) eg. astrophotography';
            positionInput.value = '';
            positionInput.disabled = false;
        } else if (year == 1) {
            positionInput.value = 'general member';
            positionInput.disabled = true;
        } else {
            positionLabel.textContent = 'Position (all small letter)';
            positionInput.value = '';
            positionInput.disabled = false;
        }
    });
</script>

@endsection