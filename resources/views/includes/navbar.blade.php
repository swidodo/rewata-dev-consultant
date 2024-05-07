 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
    <div class="p-section d-flex align-items-center">

      {{-- <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1> --}}
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo me-auto"><img src="{{asset('assets/img/logo/logo-rewata-consultant.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0 ms-5">
        <ul>
            <li><a class="active" href="{{URL::to('/')}}">Home</a></li>
            <li><a href="/tentang-perusahaan">Tentang Kami</a></li>
            <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="/page-layanan-perusahaan">Layanan Perusahaan</a></li>
                <li><a href="/page-layanan-sekolah">Layanan Sekolah</a></li>
                <li><a href="/page-layanan-personal">Layanan Pesonal</a></li>
                </ul>
            </li>
            <li><a href="#">Tanya Jawab</a></li>
            <li><a href="/page-blog-artikel">Blog dan Artikel</a></li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="/page-hubungi-kami" class="get-started-btn border border-danger fw-bold shadow-sm">Hubungi kami</a>

    </div>
  </header><!-- End Header -->