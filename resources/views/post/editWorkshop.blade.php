@extends('layouts.main')

@section('main')

<div class="workshop-bg">
    <div class="vh-10"></div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="form-bg">
                    <div class="row mt-3">
                        <h1 class="display-3 text-light text-center">Edit Workshop</h1>
                    </div>

                    <div class="row mt-5">
                        <form action="/reporter/editWorkshops/{{$workshop->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <div class="form-floating mb-3">
                                        <input name="ws_title" value="{{$workshop->title}}" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                        <label for="floatingInput">Title</label>
                                        @error('ws_title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 df dfc aic jcc mb-3">
                                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                        <input type="checkbox" name="in_iut" class="btn-check" id="btncheck1" autocomplete="off"
                                        @if($workshop->in_iut == true) checked @endif
                                        >
                                        <label class="btn btn-outline-light btn-lg" for="btncheck1">In IUT</label>
                                      
                                        <input type="checkbox" name="is_online" class="btn-check" id="online-btn" autocomplete="off"
                                        @if($workshop->is_online == true) checked @endif
                                        >
                                        <label class="btn btn-outline-light btn-lg" for="online-btn">Online</label>                                      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input value="{{$workshop->start_date}}" type="text" name="start_datetime" class="form-control datetimepicker @error('start_datetime') is-invalid @enderror" id="startDatetime" placeholder="Select start date and time" value="{{ old('start_datetime') }}">
                                        <label for="startDatetime">Start Date & Time</label>
                                        @error('start_datetime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input value="{{$workshop->end_date}}" type="text" name="end_datetime" class="form-control datetimepicker @error('end_datetime') is-invalid @enderror" id="endDatetime" placeholder="Select end date and time" value="{{ old('end_datetime') }}">
                                        <label for="endDatetime">End Date & Time</label>
                                        @error('end_datetime')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input value="{{$workshop->location}}" type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter location" value="{{ old('location') }}">
                                        <label for="location">Location</label>
                                        @error('location')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="desc" rows="8" placeholder="Short Description about event ...">{{ old('description') }} {{$workshop->description}} </textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4" hidden>
                                    <div id="dropzone" class="dropzone mb-3" onclick="document.getElementById('fileInput').click();">
                                        <p style="margin: 0;">click to upload the featured image</p>
                                        <input name="workshop_pic" type="file" id="fileInput" class="d-none" accept="image/*" onchange="previewImage(event);">
                                        <img id="preview" class="img-fluid mt-3" src="#" alt="Image Preview" style="display: none;">
                                        <button type="button" id="removeButton" class="btn btn-danger mt-3" style="display: none;" onclick="removeImage();">Remove</button>
                                        @error('workshop_pic')
                                            <div class="text-light">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="linker">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input value="{{$workshop->link}}" type="url" name="link" class="form-control @error('link') is-invalid @enderror" id="socialMediaLink" placeholder="Enter social media link" value="{{ old('link') }}">
                                        <label for="socialMediaLink">Workshop Link</label>
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 df jcc">
                                    <button type="submit" class="btn btn-light btn-lg">Update Workshop</button>
                                </div>
                            </div>
                        </form>
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
        </div>

    </div>
    <div class="vh-10"></div>

</div>



<style>
    .workshop-bg{
        background-image: url('/rsx/Newsbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 100vh;
    }

    .form-bg{
        background-color: rgba(0, 14, 24, 0.5);
        backdrop-filter: blur(10px);
        padding: 20px;
        border-radius: 10px;
        border: 6px solid rgba(255, 255, 255, 0.1);
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
      min-height: 24vh;
    }
    .dropzone img {
      max-width: 100%;
      margin-top: 10px;
    }
  </style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".datetimepicker", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });
</script>


<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
            document.getElementById('removeButton').style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    
    function removeImage() {
        document.getElementById('fileInput').value = null;
        document.getElementById('preview').style.display = 'none';
        document.getElementById('removeButton').style.display = 'none';
    }
    </script>

@endsection