@extends('layouts.main')
@section('main')
    <div class="cm-bg df aic">
        <div class="container cm-holder">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="text-center text-light">Create a new member</h1>
                        </div>
                    </div>
                    <div class="row mt-5 mb-5">
                      <form action="/admin/createmember" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
                                    <label for="floatingInput">Email address</label>
                                    @error('email')
                                        <div class="text-light">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input name="fullname" type="text" class="form-control @error('fullname') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('fullname') }}">
                                    <label for="floatingInput">Name</label>
                                    @error('fullname')
                                        <div class="text-light">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div id="dropzone" class="dropzone mb-3" onclick="document.getElementById('fileInput').click();">
                                    <p style="margin: 0;">click to upload</p>
                                    <input name="profile_pic" type="file" id="fileInput" class="d-none" accept="image/*" onchange="previewImage(event);">
                                    <img id="preview" class="img-fluid mt-3" src="#" alt="Image Preview" style="display: none;">
                                    <button type="button" id="removeButton" class="btn btn-danger mt-3" style="display: none;" onclick="removeImage();">Remove</button>
                                    @error('profile_pic')
                                        <div class="text-light">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8 df dfc jcc">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="dept" type="text" class="form-control @error('dept') is-invalid @enderror" id="floatingInput" placeholder="Department" value="{{ old('dept') }}">
                                            <label for="floatingInput">Department</label>
                                            @error('dept')
                                                <div class="text-light">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3">
                                            <input name="std_id" type="text" class="form-control @error('std_id') is-invalid @enderror" id="floatingInput" placeholder="student ID" value="{{ old('std_id') }}">
                                            <label for="floatingInput">student ID</label>
                                            @error('std_id')
                                                <div class="text-light">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 input-group">
                                            <input name="pass" type="password" class="form-control @error('pass') is-invalid @enderror" id="initialPassword" placeholder="Initial Password">
                                            <label for="initialPassword">Initial Password</label>
                                            <button class="btn btn-outline-secondary" type="button" id="toggleInitialPassword">
                                                <i class="uil uil-eye"></i>
                                            </button>
                                            @error('pass')
                                                <div class="text-light">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 input-group">
                                            <input name="pass_confirmation" type="password" class="form-control @error('pass_confirmation') is-invalid @enderror" id="confirmPassword" placeholder="Confirm Initial Password">
                                            <label for="confirmPassword">Confirm Initial Password</label>
                                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                                <i class="uil uil-eye"></i>
                                            </button>
                                            @error('pass_confirmation')
                                                <div class="text-light">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12 df jcc">
                                <button class="btn btn-lg btn-outline-light" type="submit">Submit</button>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    {{-- <script>
        $(document).ready(function() {
          var dropzone = $("#dropzone");
          var fileInput = $("#fileInput");
          var preview = $("#preview");
          var removeButton = $("#removeButton");
    
          dropzone.on('click', function() {
            fileInput.click();
          });
    
          dropzone.on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.addClass('bg-primary text-white');
          });
    
          dropzone.on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('bg-primary text-white');
          });
    
          dropzone.on('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.removeClass('bg-primary text-white');
    
            var files = e.originalEvent.dataTransfer.files;
            if (files.length) {
              handleFile(files[0]);
            }
          });
    
          fileInput.on('change', function() {
            var files = fileInput[0].files;
            if (files.length) {
              handleFile(files[0]);
            }
          });
    
          removeButton.on('click', function() {
            fileInput.val('');
            preview.attr('src', '#').hide();
            removeButton.hide();
            dropzone.find('p').show();
          });
    
          function handleFile(file) {
            var reader = new FileReader();
            reader.onload = function(e) {
              preview.attr('src', e.target.result).show();
              removeButton.show();
              dropzone.find('p').hide();
            }
            reader.readAsDataURL(file);
          }
        });
      </script> --}}

<script>
    $(document).ready(function() {
      $('#toggleInitialPassword').on('click', function() {
        const passwordField = $('#initialPassword');
        const passwordFieldType = passwordField.attr('type');
        const icon = $(this).find('i');

        if (passwordFieldType === 'password') {
          passwordField.attr('type', 'text');
          icon.removeClass('uil-eye').addClass('uil-eye-slash');
        } else {
          passwordField.attr('type', 'password');
          icon.removeClass('uil-eye-slash').addClass('uil-eye');
        }
      });

      $('#toggleConfirmPassword').on('click', function() {
        const passwordField = $('#confirmPassword');
        const passwordFieldType = passwordField.attr('type');
        const icon = $(this).find('i');

        if (passwordFieldType === 'password') {
          passwordField.attr('type', 'text');
          icon.removeClass('uil-eye').addClass('uil-eye-slash');
        } else {
          passwordField.attr('type', 'password');
          icon.removeClass('uil-eye-slash').addClass('uil-eye');
        }
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