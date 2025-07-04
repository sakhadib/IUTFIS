<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
      @if($header != null)
        {{$header}} - IUTFIS
      @else
        IUTFIS
      @endif
      </title>

    {{-- Icon --}}
    <link rel="icon" href="/rsx/ico.svg">

    {{-- own css and js --}}
    <link rel="stylesheet" href="{{ url('css/util.css') }}">

    {{-- icons --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    {{-- Math --}}
    <script defer type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"> </script>

    {{-- Data Table --}}
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{url('css/dt.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- markdown --}}

    {{-- <script defer src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script> --}}
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script defer type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    


</head>
<body>

    <nav class="navbar navbar-dark navbar-expand-lg bgd fixed-top bs" id="boss_navbar">
        <div class="container">
          <a class="navbar-brand" href="/" style="font-family: poppins, sans-sherif"><img src="/rsx/logo.svg" alt="" style="width: 80px; margin-top:-5px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3"> <!-- Added horizontal gap between groups -->
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/"><i class="fa fa-home"></i> Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-newspaper"></i> News & Updates
                </a>
                <ul class="dropdown-menu py-2" style="min-width: 220px;">
                  <li><a class="dropdown-item py-2" href="/news"><i class="fa fa-bullhorn"></i> News</a></li>
                  <li><a class="dropdown-item py-2" href="/announcements"><i class="fa fa-bell"></i> Announcements</a></li>
                  <li><a class="dropdown-item py-2" href="/events"><i class="fa fa-calendar-alt"></i> Events</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-tasks"></i> Activities
                </a>
                <ul class="dropdown-menu py-2" style="min-width: 220px;">
                  <li><a class="dropdown-item py-2" href="/workshops"><i class="fa fa-chalkboard-teacher"></i> Workshops</a></li>
                  <li><a class="dropdown-item py-2" href="/articles"><i class="fa fa-file-alt"></i> Articles</a></li>
                  <li><a class="dropdown-item py-2" href="/achievements"><i class="fa fa-trophy"></i> Achievements</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-users"></i> Executives
                </a>
                <ul class="dropdown-menu py-2" style="min-width: 220px;">
                  <li><a class="dropdown-item py-2" href="/executives"><i class="fa fa-user-tie"></i> Current Executive Panel</a></li>
                  <li><a class="dropdown-item py-2" href="/panels"><i class="fa fa-list"></i> All Panels</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/about"><i class="fa fa-info-circle"></i> About</a>
              </li>
            </ul>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <ul class="navbar-nav mb-2 mb-lg-0 gap-3"> <!-- Added horizontal gap for right group -->
              <li class="nav-item">
                <a class="nav-link" href="/login"><i class="fa fa-sign-in-alt"></i> Login</a>
              </li>
            </ul>
            
          </div>
        </div>
      </nav>

      <style>
        .bgd{
          background-color: rgba(0, 14, 24, 0.5);
          transition: background-color ease-in-out 0.3s;
          backdrop-filter: blur(6px);
        }

        .bg-body-tertiary{
          transition: background-color ease-in-out 0.3s;
        }

        body{
          background: var(--bg-dark);
          color: var(--text-light);
        }
      </style>