<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Alumn</title>
    <style>
        html {
            scroll-behavior: smooth;
        }

        /*--------------------------------------------------------------
        # General
        --------------------------------------------------------------*/


        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            margin: 0 0 20px 0;
            padding: 0;
        }


        /*typing effect*/
        .line {

            width: 16em;
            margin: 0 auto;
            border-right: 2px solid rgba(255, 255, 255, 0.75);
            font-size: 180%;
            text-align: center;
            white-space: nowrap;
            overflow: hidden;
            transform: translateY(-50%);
        }

        /*Animation*/

        .anim-typewriter {
            animation: typewriter 4s steps(40) 1s 1 normal both,
                blinkTextCursor 500ms steps(40) infinite normal;
        }

        @keyframes typewriter {
            from {
                width: 0;
            }

            to {
                width: 11em;
            }
        }

        @keyframes blinkTextCursor {
            from {
                border-right-color: rgba(255, 255, 255, 0.75);
            }

            to {
                border-right-color: transparent;
            }
        }



        /*--------------------------------------------------------------
        # Hero Section
        --------------------------------------------------------------*/

        #hero {
            width: 100%;
            height: 100vh;
            background: url(/storage/images/dawn.jpg) top center;
            background-size: cover;
            position: relative;
        }

        #hero:before {
            content: "";
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero .hero-container {
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            text-align: center;
        }

        #hero h1 {
            margin: 30px 0 10px 0;
            font-size: 48px;
            font-weight: 700;
            line-height: 56px;
            text-transform: uppercase;
            color: #fff;
        }

        #hero h2 {
            color: #eee;
            margin-bottom: 50px;
            font-size: 24px;
        }


        /*--------------------------------------------------------------
        # Sections
        --------------------------------------------------------------*/

        /* Sections Header
        --------------------------------*/

        .section-header .section-title {
            font-size: 32px;
            color: #111;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .section-header .section-description {
            text-align: center;
            padding-bottom: 40px;
            color: #999;
        }

        /* About Us Section
        --------------------------------*/

        #about {
            background: #fff;
            padding: 80px 0;
        }

        #about .about-container .background {
            min-height: 300px;
            background: url(storage/images/about-img.jpg) center top no-repeat;
            margin-bottom: 10px;
        }

        #about .about-container .content {
            background: #fff;
        }

        #about .about-container .title {
            color: #333;
            font-weight: 700;
            font-size: 32px;
        }

        #about .about-container p {
            line-height: 26px;
        }

        #about .about-container p:last-child {
            margin-bottom: 0;
        }

        #about .about-container .icon-box {
            background: #fff;
            background-size: cover;
            padding: 0 0 30px 0;
        }

        #about .about-container .icon-box .icon {
            float: left;
            background: #fff;
            width: 64px;
            height: 64px;
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            text-align: center;
            border-radius: 50%;
            border: 2px solid #2dc997;
        }

        #about .about-container .icon-box .icon i {
            color: #2dc997;
            font-size: 24px;
        }

        #about .about-container .icon-box .title {
            margin-left: 80px;
            font-weight: 500;
            margin-bottom: 5px;
            font-size: 18px;
            text-transform: uppercase;
        }

        #about .about-container .icon-box .title a {
            color: #111;
        }

        #about .about-container .icon-box .description {
            margin-left: 80px;
            line-height: 24px;
            font-size: 14px;
        }

        /*--------------------------------------------------------------
        # Footer
        --------------------------------------------------------------*/

        #footer {
            background: #343b40;
            padding: 30px 0;
            color: #fff;
            font-size: 14px;
        }

        #footer .copyright {
            text-align: center;
        }

        #footer .credits {
            padding-top: 10px;
            text-align: center;
            font-size: 13px;
            color: #ccc;
        }


        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }


        @media (max-width: 768px) {
            .back-to-top {
                bottom: 15px;
            }

            #header #logo h1 {
                font-size: 26px;
            }

            #header #logo img {
                max-height: 40px;
            }

            #hero h1 {
                font-size: 28px;
                line-height: 36px;
            }

            #hero h2 {
                font-size: 18px;
                line-height: 24px;
                margin-bottom: 30px;
            }

            #nav-menu-container {
                display: none;
            }

            #mobile-nav-toggle {
                display: inline;
            }

            #about .about-container .title {
                padding-top: 15px;
            }
    </style>


    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-md sticky-top navbar-light  bg-light  shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Alumn') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                aria-controls="myNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class=" navbar-nav ml-auto">
                    <li class=" nav-item active"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">AIM</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item"> <a class="nav-link" href="/profile/{{ auth()->user()->id }}">Your Profile</a></li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item"> <a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>

    </nav>
    <section id="hero">
        <div class="hero-container">
            <h1 class="line anim-typewriter">Welcome to Alumn</h1>
            <h2>Your connections to all the things around you literally define who you are.”</h2>
            <!-- <a href="#register" class="btn-get-started">Register Now</a> -->
        </div>
    </section>



    <main id="main">
        <section style="height:100vh" id="about">
            <div class="container">
                <div class="row about-container">

                    <div class="col-lg-6 content order-lg-1 order-2">
                        <h2 class="title">Whats We Do Here.</h2>
                        <p>
                            We provides a value based platform for imparting quality education to equip future corporate
                            leaders and
                            Entrepenuers.
                        </p>

                        <div class="icon-box wow fadeInUp">
                            <div class="icon"><i class="fa fa-shopping-bag"></i></div>
                            <h4 class="title"><a href="">Connections</a></h4>
                            <p class="description">A platform to form connections with other Alumni of our college
                                groups
                                allowing us
                                to grow as people and as an organisation.</p>
                        </div>

                        <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-photo"></i></div>
                            <h4 class="title"><a href="">Events</a></h4>
                            <p class="description">Opportunity to Join and Admit to community events by the College
                                Groups.
                            </p>
                        </div>

                        <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon"><i class="fa fa-bar-chart"></i></div>
                            <h4 class="title"><a href="">Exclusive</a></h4>
                            <p class="description">Join one of the most exclusive community which will allow us to grow
                                both
                                as person
                                and as leaders of tomorrow.</p>
                        </div>

                    </div>

                    <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
                </div>

            </div>
        </section>
    </main>

    <footer class="page-footer font-small d-flex justify-content-between" id="footer">
        <div class="container">
            <div class="footer-copyright">
                &copy; Copyright <strong>ALUMN</strong>. All Rights Reserved<br>
                Designed by <a href="#">4AM</a>
            </div>

        </div>

        <div class="container">
            Do you belong to
            <div>
                <a href="{{ route('d_admin.login')}}">Directorate?</a>
            </div>
            <div>
                <a href=" {{ route('c_admin.login')}}">college?</a>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>