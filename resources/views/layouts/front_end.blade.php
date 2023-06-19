
<!DOCTYPE html>
<html lang="en">
<?php
        date_default_timezone_set("Asia/jakarta");
?>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ $icon }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->
    <!-- Navbar Start -->
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
        <div class="top-bar row gx-0 align-items-center d-none d-lg-flex bg-light">
            <div class="col-lg-6 px-5 text-start">
                <small><i class="fa fa-map-marker-alt text-dark me-2"></i><a href="https://goo.gl/maps/AUyzQf2Pv6x26PiB7" target="_blank"> Jl. Bakti No.29, Bojongsari Baru</a></small>
                <small class="ms-4"><i class="fa fa-clock text-dark me-2"> <span id="digital-clock"></span></i></small>
            </div>
            <div class="col-lg-6 px-5 text-end">
                <small><i class="fa fa-envelope text-dark me-2"></i>info@example.com</small>
                <small class="ms-4"><i class="fa fa-phone-alt text-dark me-2"></i>+012 345 6789</small>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg bg-white py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
            <a href="{{ url('/') }}" class="navbar-brand ms-4 ms-lg-4">
                <img src="{{ $logo }}" style="width: 38%" alt="">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    {{-- a href="{{ url('/Beranda') }}" --}}
                    <a href="#beranda" class="nav-item nav-link active">Beranda</a>
                    <a href="#tentang" class="nav-item nav-link">Tentang</a>
                    <a href="#agenda" class="nav-item nav-link">Agenda</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Kelas Pembelajaran</a>
                        <div class="dropdown-menu border-light m-0">
                            <a href="project.html" class="dropdown-item">SMP</a>
                            <a href="feature.html" class="dropdown-item">SMK</a>
                            <a href="team.html" class="dropdown-item"></a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div>
                    <a href ="#kontak" class="nav-item nav-link">Kontak</a>
                    <a href ="{{ url("/login") }}" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <div>
        @yield('content')
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Our Office</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Bakti No.29, Bojongsari Baru, Kec. Bojongsari, Kota Depok, Jawa Barat 16516</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg6 col-md-6">

                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="{{ url('/') }}"><img src="Assets/img/icon.png" style="width:80%;" alt="logo"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">PKBM Langgeng Ikhlas</a>, All Right Reserved.
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="Assets/lib/wow/wow.min.js"></script>
<script src="Assets/lib/easing/easing.min.js"></script>
<script src="Assets/lib/waypoints/waypoints.min.js"></script>
<script src="Assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="Assets/lib/counterup/counterup.min.js"></script>
<script src="Assets/js/clock.js"></script>

<!-- Template Javascript -->
<script src="Assets/js/main.js"></script>
<script>
$(document).ready(function(){
   $(window).scroll(function(){
      $('section').each(function(){
         var sectionId = $(this).attr('id');
         var sectionTop = $(this).offset().top - 100;
         var sectionBottom = sectionTop + $(this).height();
         var scrollPosition = $(window).scrollTop();

         if(scrollPosition >= sectionTop && scrollPosition < sectionBottom){
            $('a').removeClass('active');
            $('a[href="#' + sectionId + '"]').addClass('active');
        }
      });
   });
});
</script>
</body>
</html>