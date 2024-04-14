<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KJSCN Learning Portal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')

    <style>
        .custom_color{
            background-color: #a02929;
        }

        .custom-slider-area {
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            margin-top: 80px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100vw;
        }

        .custom-container {
            display: flex;
            flex-direction: column;
            margin-top: 20vh;
            font-size: xx-large;
            height: fit-content;
            margin-left: 5vw;
        }

        .custom-hero {
            width: 100%;
        }

        .custom-hero h1 {
            font-weight: 1000;
            font-size: 70px;
            width: 40vw;
        }

        .responsive-services {
            position: absolute;
            z-index: 99;
            top: 100vh;
            margin-left: 10vw;
        }

        .responsive-services .service-card {
            width: 100%;
            max-width: 380px;
            margin: 0 auto;
        }

        .responsive-courses {
            margin-top: 10vh;
            font-size: 40px;
            font-weight: 1000;
        }

        .responsive-text {
            margin-top: 8vh;
            height: 20vh;
        }

        .responsive-section {
            margin-left: 5vw;
        }

        .responsive-tittle {
            font-weight: 1000;
            font-size: 35px;
            width: 80vw;
            margin-left: 0;
        }

        .responsive-features-caption {
            margin-left: 0;
        }

        .responsive-img {
            width: 100%;
            max-width: 600px;
        }

        .responsive-sectionn {
            margin-left: 2vw;
        }

        .responsive-tittlee {
            font-size: 40px;
            font-weight: 1000;
            margin-top: 10vh;
        }

        .team-active {
            display: flex;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        .single-cat {
            width: 100%;
            max-width: 300px;
            margin: 0 2vw 2vh 2vw;
        }

        .cat-cap {
            margin-right: 0;
        }

        @media screen and (max-width: 768px) {

            .custom_color {
                padding: 2rem;
            }

            .flex {
                flex-direction: column;
                align-items: center;
            }

            .ml-4 {
                margin-left: 0;
                margin-bottom: 1rem;
            }

            .flex-shrink-0 {
                margin-bottom: 1rem;
            }

            .flex.items-center {
                flex-direction: column;
                text-align: center; /* Center align for mobile */
            }

            .flex.items-center a {
                margin: 0.5rem 0;
            }

            /* Adjust styles for mobile view */
            .flex.items-center {
                flex-direction: column;
                text-align: center;
            }

            .flex.items-center a {
                margin: 0.5rem 0;
                display: block;
            }

            .textt{
                text-align: center;
                margin-left: 8vw;
            }

            .custom-slider-area {
                background-image: none; /* Optionally remove the background image on smaller screens */
            }

            .custom-container {
                margin-top: 10vh;
                font-size: large;
                margin-left: 2vw;
            }

            .custom-hero h1 {
                font-size: 30px;
                width: 80vw;
            }

            .custom-hero{
                margin-top: 16vh;
            }

            .responsive-services {
                top: 80vh;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .responsive-services .service-card {
                margin-bottom: 20px;
            }

            .cardd{
                margin-top: 15vh;
                margin-left: 2vw;
            }

            .responsive-courses {
                font-size: 30px;
            }

            .responsive-text {
                margin-top: 4vh;
            }

            .containerr{
                padding-top: 50vh;
            }

            .responsive-section {
                margin-left: 0;
            }

            .responsive-tittle {
                font-size: 24px;
                width: 80vw;
                margin-left: 8vw;
            }

            .responsive-features-caption {
                margin-left: 0;
            }

            .responsive-img {
                max-width: 100%;
            }

            .responsive-sectionn {
                margin-left: 0;
            }

            .responsive-tittlee {
                font-size: 24px;
            }

            .team-active {
                flex-direction: column;
                align-items: center;
                margin-left: 15vw;
            }

            .single-cat {
                width: 80%;
                max-width: 100%;
                margin: 0 0 2vh 0;
            }

            .cat-cap {
                margin-right: 0;
            }
        }
    </style>

    </head>

    <body class="antialiased" style="overflow-x: hidden;">
     <div class="custom_color p-4 fixed top-0 left-0 w-full z-50" style="z-index: 999;">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex-shrink-0 ml-4">
                <img src="{{ asset('/vendor/bladewind/images/logo.png') }}" alt="Logo" style="height: 3rem; width: 14rem;">
            </div>

            <div class="flex items-center" style="height: 40px; width: 300px; justify-content: space-around; display: flex; flex-direction: row;">

                
                @auth
                <a href="{{ route('register') }}" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; background-color: #2d3748; transition: color 0.3s, background-color 0.3s;"
                    onmouseover="this.style.color='black'; this.style.backgroundColor='white';"
                    onmouseout="this.style.color='white'; this.style.backgroundColor='#2d3748';">Dashboard</a>

                @else
                <a href="{{ route('login') }}" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; background-color: #2d3748; transition: color 0.3s, background-color 0.3s;"
                    onmouseover="this.style.color='black'; this.style.backgroundColor='white';"
                    onmouseout="this.style.color='white'; this.style.backgroundColor='#2d3748';">Log in</a>
                
                <a href="{{ route('register') }}" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; background-color: #2d3748; transition: color 0.3s, background-color 0.3s;"
                    onmouseover="this.style.color='black'; this.style.backgroundColor='white';"
                    onmouseout="this.style.color='white'; this.style.backgroundColor='#2d3748';">Register</a>

                @endauth
                
                <a href="/" style="color: white; text-decoration: none; transition: color 0.3s, transform 0.3s;"
                    onmouseover="this.style.color='white'; this.style.transform='scale(1.3)';"
                    onmouseout="this.style.color='white'; this.style.transform='scale(1)';" class="ml-4">Contact</a>
            </div>
        </div>
    </div>



    <section class="custom-slider-area relative" style="background-image: url('/vendor/bladewind/images/h1_hero.png');">
        <div class="slider-active absolute inset-0 flex">
            <!-- Single Slider -->
            <div class="custom-container mx-auto sm:px-4">
                <div class="flex flex-wrap items-center">
                    <div class="xl:w-1/2 lg:w-3/5 md:w-full">
                        <div class="custom-hero">
                            <h1 class="font-bold leading-tight text-white mb-4 textt" style="display: block;">OnlineLearning Platform</h1>
                            <p class="text-lg md:text-xl lg:text-2xl text-white mb-6">Build skills with courses, certificates, and degrees online from Somaiya University</p>
                            <a href="{{ route('login') }}" class="inline-block text-white py-2 px-4 rounded-md text-lg font-semibold" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; background-color: #2d3748; transition: color 0.3s, background-color 0.3s;" onmouseover="this.style.color='black'; this.style.backgroundColor='white';" onmouseout="this.style.color='white'; this.style.backgroundColor='#2d3748';">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <!-- Services Area -->
   <div class="services-area bg-gray-100 py-16">
        <div class="container mx-auto sm:px-4">
            <div class="flex flex-wrap justify-center responsive-services cardd">
                <!-- Service 1 -->
                <div class="lg:w-1/3 md:w-1/2 sm:w-2/3 mb-8 px-4 service-card">
                    <div class="single-services bg-white border border-gray-300 p-6 rounded-lg flex items-center">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/icon1.svg" alt="Service Icon">
                        </div>
                        <div class="features-caption">
                            <h3 class="text-xl font-semibold mb-2">60+ UX courses</h3>
                            <p class="text-gray-600">The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="lg:w-1/3 md:w-1/2 sm:w-2/3 mb-8 px-4 service-card">
                    <div class="single-services bg-white border border-gray-300 p-6 rounded-lg flex items-center">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/icon2.svg" alt="Service Icon">
                        </div>
                        <div class="features-caption">
                            <h3 class="text-xl font-semibold mb-2">Expert instructors</h3>
                            <p class="text-gray-600">The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="lg:w-1/3 md:w-1/2 sm:w-2/3 mb-8 px-4 service-card">
                    <div class="single-services bg-white border border-gray-300 p-6 rounded-lg flex items-center">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/icon3.svg" alt="Service Icon">
                        </div>
                        <div class="features-caption">
                            <h3 class="text-xl font-semibold mb-2">Somaiya students</h3>
                            <p class="text-gray-600">Exclusive for Somaiya students</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!-- Courses area start -->
<div class="courses-area section-padding40 mt-5 bg-gray-100">
        <div class="container mx-auto sm:px-4 containerr">
            <div class="flex flex-wrap justify-center">
                <div class="xl:w-3/5 pr-4 pl-4 lg:w-2/3 pr-4 pl-4">
                    <div class="section-tittle text-center mb-8 responsive-courses">
                        <h2>Our Courses</h2>
                    </div>
                </div>
            </div>

            <div class="container mx-auto sm:px-4">
                <div class="flex flex-wrap justify-center">
                    <p class="text-gray-600 text-lg responsive-text">No courses available.</p>
                </div>
            </div>
        </div>
    </div>
<!-- Courses area End -->



<!--? About Area-1 Start -->
<section class="about-area1 fix pt-16 pb-20 bg-gray-100">
        <div class="support-wrapper items-center container mx-auto sm:px-4 responsive-section">
            <div class="flex flex-wrap items-center">
                <div class="left-content1 w-full md:w-1/2 lg:w-2/3">
                    <div class="about-icon mb-8">
                        <img src="/vendor/bladewind/images/about.svg" alt="">
                    </div>
                    <!-- section tittle -->
                    <div class="section-tittle section-tittle2 mb-8">
                        <div class="front-text">
                            <h2 class="text-4xl font-bold text-gray-800 responsive-tittle">Learn new skills online with top educators</h2>
                            <p class="text-lg md:text-xl lg:text-2xl text-black mb-6">The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                    <div class="single-features flex items-center mb-6">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption responsive-features-caption">
                            <p class="text-gray-600">Techniques to engage effectively with vulnerable children and young people.</p>
                        </div>
                    </div>
                    <div class="single-features flex items-center mb-6">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption responsive-features-caption">
                            <p class="text-gray-600">Join millions of people from around the world learning together.</p>
                        </div>
                    </div>
                    <div class="single-features flex items-center">
                        <div class="features-icon mr-4">
                            <img src="/vendor/bladewind/images/right-icon.svg" alt="">
                        </div>
                        <div class="features-caption responsive-features-caption">
                            <p class="text-gray-600">Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                        </div>
                    </div>
                </div>
                <div class="right-content1 w-full md:w-1/2 lg:w-1/3 ml-auto">
                    <!-- img -->
                    <div class="right-img relative">
                        <img src="/vendor/bladewind/images/video-bg.svg" alt="" class="responsive-img">
                        <div class="video-icon absolute top-1/2 left-full transform -translate-y-1/2">
                            <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- About Area End -->




<!--? top subjects Area Start -->
<div class="topic-area section-padding40">
            <div class="container mx-auto sm:px-4">
                <div class="flex flex-wrap  justify-center">
                    <div class="xl:w-3/5 pr-4 pl-4 lg:w-2/3 pr-4 pl-4">
                        <div class="section-tittle text-center mb-55">
                            <h2 style="margin-top: 10vh; font-size: 40px; font-weight: 1000;">Explore top subjects</h2>
                        </div>
                    </div>
                </div>
                <div class="whole" style="display: flex; flex-wrap: wrap; flex-direction: column; margin-left: 5vw; margin-right:5vw; margin-top: 4vh;">
                <div class="flex flex-wrap ">
                <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic1.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic2.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic3.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic4.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="flex flex-wrap">
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic5.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic6.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic7.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/4 pr-4 pl-4 md:w-1/2 pr-4 pl-4 sm:w-full pr-4 pl-4" onmouseover="this.style.transform='scale(1.15)';" onmouseout="this.style.transform='scale(1)';">
                        <div class="single-topic text-center mb-30">
                            <div class="topic-img">
                                <img src="/vendor/bladewind/images/topic8.png" alt="">
                                <div class="topic-content-box">
                                    <div class="topic-content">
                                        <h3 class="text-lg md:text-xl lg:text-2xl text-black mb-6" style="margin-right: 3vw"><a href="#">Programing</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap  justify-center" style="margin-top: 2vh;">
                    <div class="xl:w-full pr-4 pl-4">
                        <div class="section-tittle text-center mt-20">
                            <a href="/" class="text-white hover:text-white-900 focus:outline-none focus:text-white-900 px-4 py-2 rounded-md bg-gray-800" style="color: white; text-decoration: none; padding: 8px 16px; border-radius: 4px; background-color: #2d3748; transition: color 0.3s, background-color 0.3s;" onmouseover="this.style.color='white'; this.style.backgroundColor='#ef4444';" onmouseout="this.style.color='white'; this.style.backgroundColor='#2d3748';">View More Subjects.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- top subjects End -->



 <!--? Team -->
 <section class="team-area section-padding40 fix">
        <div class="container mx-auto sm:px-4 responsive-sectionn">
            <div class="flex flex-wrap justify-center">
                <div class="xl:w-3/5 pr-4 pl-4 lg:w-2/3 pr-4 pl-4">
                    <div class="section-tittle text-center mb-55 responsive-tittlee">
                        <h2>Community experts</h2>
                    </div>
                </div>
            </div>
            <div class="team-active flex flex-wrap justify-center">
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="/vendor/bladewind/images/team1.png" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="/">Mr. Urela</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="/vendor/bladewind/images/team2.png" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="/">Mr. Uttom</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="/vendor/bladewind/images/team3.png" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="/">Mr. Shakil</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="/vendor/bladewind/images/team4.png" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="/">Mr. Arafat</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
                <div class="single-cat text-center">
                    <div class="cat-icon">
                        <img src="/vendor/bladewind/images/team3.png" alt="">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="/">Mr. Saiful</a></h5>
                        <p>The automated process all your website tasks.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!-- Team End -->

</body>

</html>
