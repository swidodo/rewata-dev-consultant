<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{$title}}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="{{asset('assets/fontawesome/css/all.min.css')}}" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />
  <link href="{{asset('assets/OwlCarousel/css/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/OwlCarousel/css/owl.theme.default.min.css')}}" rel="stylesheet">
  <script src="{{ asset('assets/OwlCarousel/js/jquery.min.js')}}"></script>
  <script src="{{ asset('assets/OwlCarousel/js/owl.carousel.js')}}"></script>

 <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=083896009671" class="floating fab-icon" target="_blank">
        <img src="https://newconnected.com/assets/img/icon/wa.png" class="img-fluid" data-bs-toggle="tooltip" data-bs-placement="top" title="Contact US" alt="Contact Us, We Will Help You">
     </a>
    @include('includes.navbar')
    @yield('page-layouts')
    @include('includes.footer')
    <div class="containerLoader" hidden>
        <div class="preloader"></div> 
    </div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center bg-danger"><i class="bi bi-arrow-up-short"></i></a>
    <script>
        $('.containerLoader').attr('hidden',false);
        $(document).ready(function() {
            $('.containerLoader').attr('hidden',true);
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
            });
            var owlkelas = $('.owl-kelas');
            owlkelas.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive:{
        0:{
            items:2
        },
        768:{
            items:4
        }
    }
            });
        })
    </script>
    @include('includes.script')
</body>

</html>