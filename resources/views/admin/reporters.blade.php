@extends('layouts.main')
@section('main')

<div class="main-body">
    <div class="vh-50 df dfc jcc aic ad-main-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-1 text-center text-warning">Reporters</h1>
                    <p class="lead text-light text-center">
                        Take actions on the reporters of the society.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="df dfc jcc aic the-ad-section">
        <div class="container table-holder mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <!-- Success Alert -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <table data-order='[[0, "desc"]]' data-page-length='25' id="stable" class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Position</th>
                                <th>Panel</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reporters as $executive)
                                <tr>
                                    <td>
                                        <img src="/storage/{{$executive->member->photo}}" alt="" class="profile-pic"> &nbsp;
                                        {{ $executive->member->name }}</td>
                                    <td>{{ $executive->member->student_id }}</td>
                                    <td>
                                        {{ $executive->position }}
                                        @if($executive->year == 2)
                                         team
                                        @endif
                                    </td>
                                    <td>Panel {{ $executive->panel->host_year }}</td>
                                    </td>
                                    <td>
                                        <a href="/admin/makeexecutive/{{ $executive->member->id }}" class="btn btn-sm btn-success">Edit Executive</a>
                                        <a href="/admin/removereporter/{{$executive->id}}" class="btn btn-sm btn-danger">Remove reporter</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<style>
    .main-body {
        background-image: url('/rsx/main-table-bg.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        min-height: 80vh;
    }
</style>

@endsection
