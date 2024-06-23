@extends('layouts.main')
@section('main')

<div class="main-body">
    <div class="vh-50 df dfc jcc aic ad-main-bg">
        <div class="container">
            <div class="row">
                <div class="col-12 df dfc jcc aic">
                    <h1 class="display-1 text-center text-warning">Admins</h1>
                    <p class="lead text-light text-center">
                        They are the supreme being of this 
                        <span id="fisverse-btn" class="btn btn-lg btn-outline-light">FISverse</span>
                        Take actions on them.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="explosion-container"></div>
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
                            @foreach ($admins as $executive)
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
                                        <a href="/admin/makeexecutive/{{ $executive->member->id }}" class="btn btn-sm btn-success">Edit Admin</a>
                                        <a href="/admin/removeadmin/{{$executive->id}}" class="btn btn-sm btn-danger">Remove Admin</a>
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

    #explosion-container {
        position: fixed;
        top: 50%;
        left: 50%;
        width: 200px;
        height: 200px;
        transform: translate(-50%, -50%);
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        z-index: 9999;
    }

    .explosion {
        position: absolute;
        width: 30px;
        height: 30px;
        background: orange;
        border-radius: 50%;
        animation: explode 0.6s ease-out forwards;
    }

    @keyframes explode {
        0% {
            transform: scale(1);
            opacity: 1;
        }
        100% {
            transform: scale(4);
            opacity: 0;
        }
    }
</style>


<script>
document.getElementById('fisverse-btn').addEventListener('click', function() {
    // Create explosion elements
    const container = document.getElementById('explosion-container');
    container.innerHTML = ''; // Clear any previous explosion

    for (let i = 0; i < 10; i++) {
        const explosion = document.createElement('div');
        explosion.classList.add('explosion');
        explosion.style.left = `${Math.random() * 100}px`;
        explosion.style.top = `${Math.random() * 100}px`;
        container.appendChild(explosion);
    }
    
    container.style.opacity = 1;

    // Play explosion sound
    const audio = new Audio('explosion.mp3');
    audio.play();

    // Remove explosion after animation
    setTimeout(() => {
        container.style.opacity = 0;
    }, 600);
});
</script>

@endsection