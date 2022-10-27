<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Online Marketplace to sell and buy Used Item</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/aos/aos.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/css/main.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
 
        <h1>Online Marketplace to sell and buy Used Item<span>.</span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home<i class="bi bi-house"></i></a></li>
          {{-- <li><a href="#about">About<i class="bi bi-card-text"></i></a></li> --}}
          <li class="dropdown"><a href="#"><span>Category</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Computer &amp; technology</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Home &amp; living</a></li>
              <li><a href="#">Hobbies</a></li>
              <li><a href="#">Sport Equipment</a></li>
              <li><a href="#">Book &amp; Article</a></li>
            </ul>
          </li>
          <li><a href="#like">Like<i class="bi bi-heart"></i></a></li>
          <li><a href="#chat">Chat<i class="bi bi-chat"></i></a></li>
          <li><a href="#login">Login</a></li>
          <li><a href="#signup">Sign Up</a></li>
        </ul>
      </nav><!-- .navbar -->
      
    </div>
  </header><!-- End Header -->
  <!-- End Header -->

  @yield('content')
  <!-- End Hero Section -->

  <main id="main">

  
    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container mt-4">
      <div class="copyright">
        © Copyright <strong><span>Online Marketplace to sell and buy Used Item</span></strong>. 
      </div>
      <div class="credits">
        Designed by Jing Tong
      </div>
    </div>

  </footer><!-- End Footer -->
  
  <!-- Vendor JS Files -->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/js/main.js"></script>

</body>

</html>
