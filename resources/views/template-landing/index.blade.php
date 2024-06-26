@extends('template-landing.layouts')
@section('page-layouts')
    <section id="hero" class="d-flex justify-content-start align-items-center">
        <div class="kotak"></div>
        <div class="container">
            <div class="p-section position-relative" data-aos="zoom-in" data-aos-delay="100">
                <h1 style="margin-top: 50px">{!! 'Layanan konsultasi dan pendampingan dari' !!}</h1>
                <h1 style="margin-top:-15px; font-size: 38px;">{!! '<span style="font-weight: bolder; color:#FF0000">HR Consultant</span> berpengalaman' !!}</h1>
                <h2>{!! 'Konsultasi Managemen HR, Sistem Managemen Mutu, <br>Bantuan Hukum dan Pendampingan khusus masalah ketenagakerjaan <br>dan Hubungan Industrial.</br></br>> Layanan HR Software' !!}</h2>
                <a href="https://www.youtube.com/@budirewata" class="btn-get-started shadow-sm" target="_blank"><img class="img-fluid" width="35" src="{{asset('assets/img/mini-logo/youtube.png')}}" alt="play">&nbsp&nbspBudi Rewata</a>
            </div>
        </div>
    </section>
    <main id="main">
        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007bff" fill-opacity="1" d="M0,96L26.7,90.7C53.3,85,107,75,160,85.3C213.3,96,267,128,320,154.7C373.3,181,427,203,480,197.3C533.3,192,587,160,640,160C693.3,160,747,192,800,192C853.3,192,907,160,960,154.7C1013.3,149,1067,171,1120,186.7C1173.3,203,1227,213,1280,213.3C1333.3,213,1387,203,1413,197.3L1440,192L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z"></path></svg> --}}
        {{-- <section id="counts" class="counts section-bg">
            <div class="p-section">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Konsultasi Gratis!</h1>
                        <h5>Silahkan hubungi kami untuk konsultasi lebih lanjut.</h5>
                    </div>
                    <div class="col-md-4">
                        <a href="/page-hubungi-kami" class="btn btn-lg btn-outline-danger rounded-pill fw-bold shadow-sm">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </section> --}}
        <section id="layanan-utama" class="courses">
            <div class="p-section" data-aos="fade-up" style="">
                {{-- <div class="section-title bottom-title">
                    <h2 class="text-danger fw-bold">Layanan Utama</h2>
                </div> --}}
                <div class="row" data-aos="zoom-in" data-aos-delay="100" >
                    @foreach ($company as $comp)
                    @if ($comp->image !='' || $comp->image !=null)
                        <div class="col-lg-3 col-md-4 d-flex align-items-stretch mt-3 bottom-section">
                            <div class="course-item shadow-sm">
                                <div class="" style="height: 200px;">
                                    <img src="{{asset('storage/layanan/perusahaan/'.basename($comp->image))}}" class="img-fluid" alt="image-layanan">
                                </div>
                                <div class="course-content">
                                    <h3><a href="#">{!! $comp->title !!}</a></h3>
                                    {!! $comp->short_description !!} 
                                    <a href=""><button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm p-1">Selengkapnya</button></a>
                                </div>
                            </div>
                        </div> 
                        
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <section id="konsultasi-sdm-profesional" class="about">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">HUMAN CAPITAL & BUSINESS CONSULTANT</h2>
                </div>
                <div class="row" style="margin-bottom: -50px;">
                    <div class="col-md-12 mb-4">
                        <h3>{{$konsultasi_sdm->judul}}</h3>
                        {!! $konsultasi_sdm->deskripsi !!}
                    </div>
                    <div class="row">
                        @foreach ($poin_sdm as $poin)
                            <div class="col-md-3">
                                <div class="text-center w-25 d-flex align-items-center" >
                                    <img class="img-fluid float-center" src="{{asset('storage/logo-sdm/'.basename($poin->image))}}" alt="{!! $poin->judul !!}" style="min-height: 70px; max-height :70px;">
                                </div>
                                <div class="mt-1">{!! $poin->judul !!}</div>
                                <div>
                                    {!! $poin->deskripsi !!}
                                </div>
                            </div>                            
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section id="pentingnya-pelatihan" class="about" style="margin-top: -35px; margin-bottom : -35px;">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">KONSULTAN SDM BERPENGALAMAN</h2>
                </div>
                <div class="row"  style="margin-bottom: -50px;">
                    <div class="col-md-12">
                        <h2 class="fw-bold">{{ $pelatihan->judul }}</h2>
                    </div>
                    <div class="col-md-6 text-justify">
                        {!! $pelatihan->deskripsi !!}
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            {{-- <div class="col-md-4"> --}}
                                <img src="{{asset('assets/img/logo/18.-Pelatihan-Ahli-K3-Umum.webp')}}" height="300">
                            {{-- </div> --}}
                            
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <div class="shadow-sm">
                            <img src="{{asset('assets/img/logo/cover_zero_page.jpg')}}" alt="foto">
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <section id="popular-courses" class="courses">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">Kelas Rewata consultant </h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="large-12 columns">
                        <div class="owl-carousel owl-theme">
                            @foreach ($kelas as $kls)
                                <div class="item my-1 mx-2">
                                    <div class="course-item shadow-sm">
                                        <img src="{{asset('storage/kelas/'.basename($kls->image))}}" class="img-fluid" alt="kelas-rewata">
                                        <div class="course-content">
                                            <a href="{{$kls->resource}}">{!! $kls->title !!}</a></h3>
                                            {!! $kls->short_description !!}
                                            <div class="row">
                                                <a href="{{$kls->resource}}" class="text-center"><button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm">{{'Mulai Belajar'}}</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="about" style="margin-top: -40px; margin-bottom : -25px;">
            <div class="p-section" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 mt-5" data-aos="fade-left" data-aos-delay="100">
                        {!! $tentang->deskripsi !!}
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>{{ $tentang->judul }}</h3>
                        {!! $tentang->short_deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
        <section id="konsultasi perusahaan" class="why-us section-bg">
            <div class="p-section" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            <h1>Konsultasi Perusahaan</h1>
                            <p>Kami tidak hanya menerima konsultasi dengan individu perorangan, tapi bisa juga menerima konsultasi dari perusahaan</p>
                            <div class="mt-3">
                                <button class="btn btn-lg btn-outline-danger rounded-pill fw-bold shadow-sm">Selengkapnya</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    
                    </div>
                </div>
            </div>
        </section>
        <section id="counts" class="counts" style="background: #DDDDDD">
            <div class="p-section">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">konsultasi sekolah</h2>
                </div>
                <div class="row counters">
                    <div class="row">
                        <div class="text-center">
                            konsultasi sekolah
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="konsultasi-personal" class="courses">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">Konsultasi Personal</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($personal as $person)
                       <div class="col-lg-3 col-md-4 d-flex align-items-stretch mt-3 bottom-section mb-3">
                            <div class="course-item shadow-sm mb-3">
                                <div class="">
                                    <img src="{{asset('storage/layanan/personal/'.basename($person->image))}}" class="img-fluid" alt="image-layanan">
                                </div>
                                <div class="course-content">
                                    <h3><a href="#">{!! $person->title !!}</a></h3>
                                    {!! $person->short_description !!}
                                    <a href=""><button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm">selengkapnya</button></a>
                                </div>
                            </div>
                        </div> 
                    @endforeach        
                </div>
            </div>
        </section>
        <section id="trainers" class="trainers"  style="margin-top: -80px;">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">Faq</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('assets/img/home-1.jpg')}}" class="img-fluid shadow-sm">
                    </div>
                    <div class="col-md-6">
                        <h4>Pertanyaan yang Sering Diajukan</h4>
                        <div class="accordion shadow-sm mt-2" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Apakah Layanan Perusahaan di REWATA Consultant ?
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body shadow-sm">
                                        Management SDM, Recruitment, Kinerja, Remunerasi, Karir, Training, Set up ISO 9001 dan Sertifikasi, Set up sistem management mutu 14001:2015, Set up sistem OHSAS 45001:2018, Konsultasi dan Set up Sistem SMK3, dan Software dan Aplikasi HRD.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Berapa biaya untuk konsultasi ?
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body shadow-sm">
                                        Tidak perlu khawatir, kami akan membantu anda secara gratis untuk konsultasi.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed bg-danger text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Apakah layanan personal di REWATA Consultant    ?
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body shadow-sm">
                                        Layanan kami adalah PHK/ Pemutusan Hubungan Kerja, Status Karyawan, Pensiun, Kepesertaan BPJS Ketenagakerjaan dan BPJS Kesehatan, dan Hak-hak normative lainnya.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <section id="demos" class="section-bg">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">Youtube Rewata consultant </h2>
                </div>
                <div class="row">
                    <div class="large-12 columns">
                        <div class="owl-carousel owl-theme">
                            @foreach ($video as $vd)
                            <div class="col-sm-2 item w-100">
                                {{-- <iframe 
                                    width="300" height="215"
                                    src={{$vd->url}}
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" 
                                    allowfullscreen>
                                </iframe> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </section>

    </main>
@endsection()