@extends('layouts.main')
@section('main')

<div class="main-body">
    <div class="vh-50 df dfc jcc aic ad-main-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-1 text-center text-warning">Members</h1>
                    <p class="lead text-light text-center">
                        Take actions on the members of the society.
                    </p>
                    <a href="/admin/createmember" class="btn btn-lg btn-outline-light mt-3"><i class="uil uil-pen"></i> Create Member</a>
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
                                <th>Department</th>
                                <th>Student ID</th>
                                <th>Member From</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                                <tr>
                                    <td>{{ $member->name }}</td>
                                    <td>{{ $member->department }}</td>
                                    <td>{{ $member->student_id }}</td>
                                    <td>
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
                                    </td>
                                    <td>
                                        <a href="/admin/makeexecutive/{{ $member->id }}" class="btn btn-sm btn-success">Make Executive</a>
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
