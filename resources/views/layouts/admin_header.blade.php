<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IUT FIS</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- own css and js --}}
    <link rel="stylesheet" href="{{ url('css/util.css') }}">

    {{-- icons --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

    {{-- Data Table --}}
    <script defer src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="{{url('css/dt.js')}}"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    {{-- Math --}}
    <script defer type="text/javascript" id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"> </script>

    {{-- markdown --}}
    <script defer src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>

    <nav class="navbar navbar-dark navbar-expand-lg bgd fixed-top bs" id="boss_navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="/" style="font-family: poppins, sans-sherif"><img src="/rsx/logo.svg" alt="" style="width: 80px; margin-top:-5px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

              @if(session('admin') == true)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Member
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/admin/members">All Members</a></li>
                    <li><a class="dropdown-item" href="/admin/createmember">New Member</a></li>
                  </ul>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/executives">Executives</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/reporters">Reporters</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/admins">Admins</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="/admin/panelcreate">Create-Panel</a>
                </li>

              @endif

              @if(session('reporter') == true)
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   News
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/reporter/news">All News</a></li>
                    <li><a class="dropdown-item" href="/reporter/createnews">Create new news</a></li>
                  </ul>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Article
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/reporter/articles">All Articles</a></li>
                    <li><a class="dropdown-item" href="/reporter/createArticles">Create new Article</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Announcement
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/reporter/announcements">All Announcements</a></li>
                    <li><a class="dropdown-item" href="/reporter/createAnnouncements">Create new Announcement</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Event
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/reporter/Events">All Events</a></li>
                    <li><a class="dropdown-item" href="/reporter/createEvents">Create new Event</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                   Workshop
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/reporter/Events">All Workshop</a></li>
                    <li><a class="dropdown-item" href="/reporter/createWorkshop">Create new Workshop</a></li>
                  </ul>
                </li>

                
              @endif

              {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="uil uil-pen"></i>  Create
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/createnews">News</a></li>
                  <li><a class="dropdown-item" href="/createannouncement">Announcement</a></li>
                  <li><a class="dropdown-item" href="/createannouncement">Announcement</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}
              {{-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <ul class="navbar-nav mb-2 mb-lg-0 df aic">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="/storage/{{session('member_photo')}}" alt="" class="profile-pic">
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile">Profile</a></li>
                  <li><a class="dropdown-item" href="/logout">Logout</a></li>
                </ul>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="/profile"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
              </li> --}}
            </ul>
            
          </div>
        </div>
      </nav>

      <style>
        .bgd{
          background-color: rgba(0, 14, 24, 0.5);
          backdrop-filter: blur(4px);
          transition: background-color ease-in-out 0.3s;
        }

        .bg-body-tertiary{
          transition: background-color ease-in-out 0.3s;
        }
      </style>
    
</body>
</html>