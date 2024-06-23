@extends('layouts.main')
@section('main')

<div class="main-body">
    <div class="vh-50 df dfc jcc aic ad-main-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-5 text-center text-warning">{{$type}} created by {{$member->name}}</h1>
                    <p class="lead text-light text-center">
                        Take actions on the {{$type}} of the society. You can only take action on the {{$type}} you created.
                    </p>
                    <a href="/reporter/createnews" class="btn btn-lg btn-outline-light">Create New News</a>
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
                                <th>title</th>
                                <th>Posted At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->addhours(6)->format('d F, Y \a\t g:m A') }}</td>
                                    <td>
                                        <a href="/reporter/editnews/{{ $post->id }}" class="btn btn-sm btn-outline-success"><i class="uil uil-pen"></i> Edit</a>
                                        <a href="/reporter/deletepost/{{ $post->id }}" class="btn btn-sm btn-outline-danger"><i class="uil uil-trash-alt"></i> Delete</a>
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
        background-image: url('/rsx/rp-bg.jpg');
        background-attachment: fixed;
        background-size: cover;
        background-position: center;
        min-height: 80vh;
    }
</style>

@endsection
