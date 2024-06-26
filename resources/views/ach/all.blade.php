@extends('layouts.main')
@section('main')

<div class="main-body">
    <div class="vh-50 df dfc jcc aic ad-main-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-5 text-center text-warning">{{$type}}</h1>
                    <p class="lead text-light text-center">
                        Take actions on the {{$type}} of the society.
                    </p>
                    <a href="/reporter/create{{$type}}" class="btn btn-lg btn-outline-light">Create New {{$type}}</a>
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

                    <table data-order='[[1, "desc"]]' data-page-length='25' id="stable" class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Posted at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($achievements as $event)
                                <tr>
                                    <td>{{ $event->competition }}</td>
                                    <td>{{date('j F Y', strtotime($event->competition_date))}}</td>
                                    <td>{{$event->rank}}</td>
                                    <td>
                                        <a href="/reporter/addWinner/{{$event->id}}" class="btn btn-sm btn-l">
                                            <i class="uil uil-plus"></i> Add Winner
                                        </a> 
                                    </td>
                                    <td>
                                        <a href="/reporter/edit{{$type}}/{{ $event->id }}" class="btn btn-sm btn-outline-success"><i class="uil uil-pen"></i> Edit</a>
                                        <a href="/reporter/deleteAchievement/{{ $event->id }}" class="btn btn-sm btn-outline-danger"><i class="uil uil-trash-alt"></i> Delete</a>
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
