@extends('layouts.main')
@section('main')
    <div class="vh-100 cm-bg df aic">
        <div class="container cm-holder">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-12 mt-3">
                            <h1 class="text-center text-light">New Executive</h1>
                            <p class="text-light lead text-center">
                                Submissions are final and can not be undone. Be careful about the information you provide.
                            </p>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                      <form action="/admin/panelcreate" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input name="panel_year" type="number" required class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Which batch is 4rth year in new panel ? [eg. 2020]</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 df jcfe">
                                <button type="submit" class="btn btn-lg btn-outline-light">Create Panel</button>
                            </div>
                        </div>
                    </form>                   
                    </div>
                </div>
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

@endsection