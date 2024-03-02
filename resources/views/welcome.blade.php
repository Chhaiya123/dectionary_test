<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Psychology</title>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

       
    </head>
    <body >
        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->
        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="bi bi-geo-alt fs-6 me-2 text-warning"></i><a href="#" class="text-white">Phnom Penh</a></small>
                        <small class="me-3"><i class="bi bi-envelope fs-6 me-2 text-warning"></i><a href="mailto:daraksa65@gmail.com" class="text-white">daraksa65@gmail.com</a></small>
                    </div>
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-lg">
                    <a href="" class="navbar-brand"><h1 class="text-success display-6">PSYCHOLOGY</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <i class="bi bi-list h2 text-primary"></i>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto gap-3">
                            {{-- <a href="" class="nav-item nav-link rounded-1 {{ request()->is('home') ? 'active' : '' }}">Home</a> --}}
                            <a href="{{Auth::user() ? url('home') : '/'}}" class="nav-item nav-link rounded-1 {{ request()->is('home') ? 'active' : '' }}">Home</a>
                            <a href="{{Auth::user() ? url('word') : route('login')}}" class="nav-item nav-link rounded-1 {{ request()->is('word') ? 'active' : '' }}">Word</a>
                            {{-- <a href="shop-detail.html" class="nav-item nav-link"></a> --}}
                            <a href="{{Auth::user() ? url('contact') : route('login')}}" class="nav-item nav-link rounded-1 {{ request()->is('contact') ? 'active' : '' }}">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            @auth
                                <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="bi bi-search text-primary"></i></button>
                            @else

                            @endauth
                            <div class="nav-item dropdown">
                                <a class="nav-link btn-search btn btn-md-square rounded-circle bg-white me-4"><i class="bi bi-person-fill h1"></i></a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    @if (Route::has('login'))
                                        @auth
                                            <a href="{{url('profile')}}" class="dropdown-item {{ request()->is('profile') ? 'active' : '' }}"><i class="bi bi-person me-2"></i> Profile</a>
                                            <a href="{{url('setting')}}" class="dropdown-item {{ request()->is('setting') ? 'active' : '' }}"><i class="bi bi-gear me-2"></i> Setting</a>
                                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right me-2"></i> Logout
                                            </a>
                                            <form id="logout-form"  method="POST" action="{{ route('logout') }}">
                                                @csrf
                                            </form>
                                            {{-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a> --}}
                                        @else
                                            <a href="{{ route('login') }}"  class="dropdown-item">Log in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"  class="dropdown-item">Register</a>
                                            @endif
                                        @endauth
                                        
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        {{-- End Navbar --}}
        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <form action="{{url('word.search')}}"  class="w-100">
                             <div class="input-group w-75 mx-auto d-flex">
                                <input type="search" name="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                <button type="submit" id="search-icon-1" class="input-group-text p-3"><i class="bi bi-search text-primary"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->
       
         <!-- Featurs Section Start -->
         <div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-5">
                    @yield('login')
                    @yield('register')
                    @yield('forgot_password')
                    {{-- @yield('reset_password') --}}
                    
                    @yield('home') 
                    @yield('word')
                    @auth
                        @yield('setting')
                        @yield('profile')
                    @else

                    @endauth
                   
                    
                </div>

                
            </div>
        </div>
        <!-- Featurs Section End -->
       
        {{-- <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="mt-16">
                   
                </div>
            </div>
        </div> --}}
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="">
                                <h1 class="text-primary mb-0">PSYCHOLOGY</h1>
                                <p class="text-secondary mb-0">Dictionary</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://web.facebook.com/kakada.raksa.1"><i class="bi bi-facebook"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href="https://t.me/raksada"><i class="bi bi-telegram"></i></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Menu</h4>
                            <a class="btn-link" href="{{Auth::user() ? url('word') : route('login')}}">word</a>
                            <a class="btn-link" href="{{Auth::user() ? url('profile') : route('login')}}">About Us</a>
                            <a class="btn-link" href="{{Auth::user() ? url('contact') : route('login')}}">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Account</h4>
                            <a class="btn-link" href="">My Account</a>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: Battambang</p>
                            <p>Email: daraksa@gmail.com</p>
                            <p>Phone: +855 89 399 588</p>
                            {{-- <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt=""> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="https://t.me/raksada"><i class="fas fa-copyright text-light me-2"></i>Da Raksa</a></span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="https://t.me/yoeunchhaiya">Chhai Ya</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->
        
        
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top text-light"><i class="bi bi-arrow-up-short h3"></i></a> 


        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/waypoints/waypoints.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>

        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
        </script>
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
                }, false)
            })
            })()
        </script>
    </body>
</html>
