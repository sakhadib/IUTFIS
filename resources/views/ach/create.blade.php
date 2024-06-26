@extends('layouts.main')

@section('main')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script defer src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <div class="footer-bg ach-bg">
        <div class="container mt-5">
            <div class="row mt-5">
                <div class="col-12">
                    <div class="form-bg">
                        <form action="/reporter/createAchievements" method="post">
                            @csrf
                            <div class="container">
                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h3 class="text-center display-3 text-light">New Achievement</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <div class="form-floating mb-3">
                                            <input name="competition" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Competition Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-floating mb-3">
                                            <input name="competition_date" type="text" class="form-control datetimepicker @error('end_datetime') is-invalid @enderror" id="endDatetime" placeholder="Select end date and time" value="{{ old('end_datetime') }}">
                                            <label for="endDatetime">Competition Date</label>
                                            @error('date')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <div class="form-floating mb-3">
                                            <input name="rank" type="text" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Position / Rank</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mb-3">
                                        <div class="form-floating mb-3">
                                            <input name="reff_link" type="url" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Competition / Certificate / Award / Event link</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-floating">
                                            <textarea name="story" rows="10" class="form-control" placeholder="Leave a comment here" id="floatingTextarea" oninput="autoResizeTextarea(this)"></textarea>
                                            <label for="floatingTextarea">Success Story</label>
                                        </div>

                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 df dfc jcc aic">
                                        <button type="submit" class="btn btn-lg btn-outline-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .ach-bg{
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-bg{
            background-color: rgba(255, 255, 255, 0.4);
            padding: 20px;
            border-radius: 10px;
            min-height: 20vh;
        }

        .form-control{
            background-color: rgba(255, 255, 255, 0.4);
            border: none;
        }

        .form-control:focus{
            border: none;
            box-shadow: none;
        }
    </style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(".datetimepicker", {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    });
</script>

<script>
    function autoResizeTextarea(element) {
        element.style.height = "auto";
        element.style.height = (element.scrollHeight) + "px";
    }
</script>
@endsection