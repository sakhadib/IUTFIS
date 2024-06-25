@extends('layouts.main')

@section('main')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <div class="bg-create-event df jcc aic">
        
        <div class="container mt-5 mb-5">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-bg">
                        <h2 class="display-3 text-light text-center mb-4">Create Event</h2>
                        <form action="/reporter/createEvents" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder="Event Title" value="{{ old('title') }}">
                                <label for="floatingInput">Event Title</label>
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="start_datetime" class="form-control datetimepicker @error('start_datetime') is-invalid @enderror" id="startDatetime" placeholder="Select start date and time" value="{{ old('start_datetime') }}">
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
                                        <input type="text" name="end_datetime" class="form-control datetimepicker @error('end_datetime') is-invalid @enderror" id="endDatetime" placeholder="Select end date and time" value="{{ old('end_datetime') }}">
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
                                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Enter location" value="{{ old('location') }}">
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
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" id="socialMediaLink" placeholder="Enter social media link" value="{{ old('link') }}">
                                        <label for="socialMediaLink">Social Event Link</label>
                                        @error('link')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="desc" rows="5" placeholder="Short Description about event ...">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 df jcc">
                                    <button type="submit" class="btn btn-light btn-lg">Create Event</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .bg-create-event{
            background-image: url('/rsx/Articlesbg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            min-height: 100vh;
        }

        .form-bg{
            background-color: rgba(0,0,0,0.4);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 100px rgba(0,0,0,0.8);
            backdrop-filter: blur(10px);
            border: 3px solid white;
        }
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".datetimepicker", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });
    });
</script>

@endsection