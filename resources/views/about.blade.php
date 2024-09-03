@extends('layouts.main')


@section('main')

<div class="about-bg">
    <div class="bg-cover df dfc jcc aic">
        <div class="container">
            <div class="row">
                <div class="col-12 vh-40 df dfc jcc aic">
                    <h1 class="display-1 text-light">IUTFIS</h1>
                    <p class="lead text-light text-center">
                        IUT Al-Fazari Interstellar Society. The society that connects the stars.
                    </p>
                    <p class="fs-4 l">
                        #LookUpToWonder
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container main-place mt-5 mb-5">
    <div class="row">
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="tmc">{{$total_member_count}}</h1>
                <p class="lead">Members</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="tnc">{{$total_news_count}}</h1>
                <p class="lead">News</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="tac">{{$total_article_count}}</h1>
                <p class="lead">Articles</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="twc">{{$total_workshop_count}}</h1>
                <p class="lead">Workshops</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="tec">{{$total_event_count}}</h1>
                <p class="lead">Events</p>
            </div>
        </div>
        <div class="col-md-2 col-6 mb-3">
            <div class="stat-box df dfc jcc aic">
                <h1 class="display-4" id="tachc">{{$total_achievement_count}}</h1>
                <p class="lead">Achievements</p>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-12">
            <p class="lead" style="text-align: justify">
                The IUT Al-Fazari Interstellar Society is a student organization at Islamic University of Technology, Gazipur, Bangladesh. 
                The society was founded in 2019 with the aim of promoting space science and technology among the students of IUT. 
                The society has been organizing various events, workshops, and competitions to engage students in space-related activities. 
                The society also aims to inspire students to pursue careers in space science and technology.
            </p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 df dfc jcc">
            <h1 class="display-3">Meet Our Founders</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-5">
            <img src="/rsx/Rubaiat.JPG" alt="" class="founder-img">
        </div>
        <div class="col-md-9 mt-5">
            <div class="row porichoy">
                <div class="col-12">
                    <h1 class="display-5">Rubaiat Rehman Khan </h1>
                    <h1 class="fs-4">Founding President</h1>
                </div>
            </div>
            <div class="row mt-1 bani">
                <div class="col-12">
                    <p class="lead">
                        Our ultimate dream was to witness the rise of Astronomy and Astrophysics in Bangladesh. IUT FIS continues to be a forerunner to convert this distant dream to reality and sets a new standard in the country
                    </p>
                </div>
            </div>

            <div class="row mt-1 links">
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-outline-primary">
                        <i class="uil uil-facebook-f"></i> Facebook
                    </a>
                </div>
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-danger">
                        <i class="uil uil-instagram"></i> Instagram
                    </a>
                </div>
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-primary">
                        <i class="uil uil-linkedin"></i> Linkedin
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mt-5">
            <img src="/rsx/aftab.jpg" alt="" class="founder-img">
        </div>
        <div class="col-md-9 mt-5">
            <div class="row porichoy">
                <div class="col-12">
                    <h1 class="display-5">Aftab Nazim</h1>
                    <h1 class="fs-4">Founding Vice President</h1>
                </div>
            </div>
            <div class="row mt-1 bani">
                <div class="col-12">
                    <p class="lead">
                        Our ultimate dream was to witness the rise of Astronomy and Astrophysics in Bangladesh. IUT FIS continues to be a forerunner to convert this distant dream to reality and sets a new standard in the country
                    </p>
                </div>
            </div>

            <div class="row mt-1 links">
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-outline-primary">
                        <i class="uil uil-facebook-f"></i> Facebook
                    </a>
                </div>
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-danger">
                        <i class="uil uil-instagram"></i> Instagram
                    </a>
                </div>
                <div class="col-auto mt-2">
                    <a href="" class="btn btn-lg btn-primary">
                        <i class="uil uil-linkedin"></i> Linkedin
                    </a>
                </div>
            </div>
        </div>
    </div>

    


    <div class="row mt-4">
        <div class="col-12 df dfc jcc mt-5">
            <h1 class="display-3">Our Mission</h1>
            <hr>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <p class="lead" style="text-align: justify">
                The mission of the IUT Al-Fazari Interstellar Society is to promote space science and technology among the students of IUT. 
                The society aims to inspire students to pursue careers in space science and technology by organizing various events, workshops, 
                and competitions. 
                The society also aims to create a platform for students to engage in space-related activities and collaborate with 
                other students who share a passion for space.
            </p>
        </div>
    </div>


    <div class="row mt-5">
        <div class="col-12 df dfc jcc mt-5">
            <h1 class="display-3">Find Us On ...</h1>
            <hr>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 df socials">
            <a data-mdb-ripple-init class="btn btn-lg" style="background-color: #1877F2; color:white" href="https://www.facebook.com/IUTFIS/" role="button">
                <i class="fab fa-facebook-f me-2"></i>Facebook
            </a>
            <a data-mdb-ripple-init class="btn btn-lg" style="background-color: #721181; color:white" href="https://www.instagram.com/iut_interstellar_society/" role="button">
                <i class="fab fa-instagram me-2"></i>Instagram
            </a>
            <a data-mdb-ripple-init class="btn btn-lg" style="background-color: #FF0000; color:white" href="https://www.youtube.com/@iutfis" role="button">
                <i class="fab fa-youtube me-2"></i>Youtube
            </a>
            <a data-mdb-ripple-init class="btn btn-lg" style="background-color: #0077B5; color:white" href="https://www.linkedin.com/company/iut-al-fazari-interstellar-society" role="button">
                <i class="fab fa-linkedin me-2"></i>Linkedin 
            </a>
            <a data-mdb-ripple-init class="btn btn-lg" style="background-color: #000000; color:white" href="mailto:iutfis2061@gmail.com" role="button">
                <i class="fa-solid fa-envelope"></i> Email 
            </a>
        </div>
    </div>


    
</div>


<style>
    .about-bg{
        background-image: url('/rsx/eventbg.jpg');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        min-height: 50vh;
    }


    .bg-cover{
        background-color: rgba(0, 0, 0, 0.7);
        min-height : 50vh;
        backdrop-filter: blur(7px);
    }

    .stat-box{
        background-color: rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
    }

    .socials a{
        margin-right: 10px;
    }

    .main-place{
        min-height: 100vh;
    }

    .founder-img{
        width: 100%;
        border-radius: 10px;
    }
</style>




<script>
    function formatNumber(num) {
        if (num >= 1000) {
            let rounded = Math.floor(num / 100) / 10; // Round down to one decimal place
            return rounded.toFixed(1) + 'k';
        }
        return num;
    }

    function updateFormattedNumbers() {
        // List of element IDs
        const ids = ['tmc', 'tnc', 'tac', 'twc', 'tec', 'tachc'];

        // Iterate through each ID and format the number
        ids.forEach(id => {
            let element = document.getElementById(id);
            if (element) {
                let value = parseInt(element.textContent);
                element.textContent = formatNumber(value);
            }
        });
    }

    // Call the function on page load or whenever needed
    updateFormattedNumbers();

</script>


@endsection