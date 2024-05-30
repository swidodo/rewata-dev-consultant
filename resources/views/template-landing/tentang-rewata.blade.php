    @extends('template-landing.layouts')
    @section('page-layouts')
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="p-section position-relative text-center" data-aos="zoom-in" data-aos-delay="100">
            <h1 class="text-light mt-4">{!! 'PROFILE PERUSAHAAN' !!}</h1>
            <a href="#" class="btn-get-started bg-primary shadow-sm w-25 p-4 mb-4"><img class="img-fluid" src="{{asset('assets/img/logo/logo-rewata-consultant.png')}}" alt="play"></a>
            <div class="text-light">
                <p>Rewata Consultant didirikan pada tahun 2006, oleh para profesional dan praktisi yang telah berkarir puluhan tahun di beberapa perusahaan multi nasional, perguruan tinggi, dan pusat kebudayaan asing hingga mendapat pengesahan dari Departemen Kehakiman. Dengan Pengalaman para pendiri sebagai pimpinan dan praktisi dalam bidang-bidang pengembangan sumber daya manusia, pusat dokumentasi & informasi, perbankan, keuangan, dan perpajakan, Solusi Training & Consulting memberikan pelatihan dan pengembangan sumber daya manusia.
                    Rewata Consultant juga memberikan jasa perekrutan tenaga kerja (mulai dari tenaga pelaksana sampai manajemen), penempatan & pengelolaan tenaga kerja serta jasa komersial yang didukung oleh profesional dan praktisi yang berpengalaman luas dalam bidangnya.</p>
            </div>
        </div>
    </section>
    <main id="main">
        <section id="about" class="about" style="margin-top: -40px; margin-bottom : -25px;">
            <div class="p-section" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-6 order-1 order-lg-2 mt-5" data-aos="fade-left" data-aos-delay="100">
                        {!! $tentang->deskripsi !!}
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                        <h3>{{'TENTANG REWATA CONSULTANT'}}</h3>
                        {!! $tentang->short_deskripsi !!}
                    </div>
                </div>
            </div>
        </section>
        <section id="demos" style="background: #EBECF0;">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">CEO REWATA CONSULTANT</h2>

                </div>
                <div class="row">
                    @foreach ($profile as $prof)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body shadow-lg border border-primary">
                                {!! $prof->name !!}
                                {!! $prof->specialis !!}
                                <h5>{{'EDUCATION'}}</h5>
                                {!! $prof->education !!}
                                <h5>{{ 'SKILLS' }}</h5>
                                {!! $prof->skill !!}
                                <h5> {{ 'EXPERIENCE' }}</h5>
                                {!! $prof->experience !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6" style="background: url('../img/logo/cover_zero_page.jpg') top center">
                        <img src="{{asset('storage/profile/'.basename($prof->image))}}" class="img-fluid">
                    </div>
                    @endforeach
                    
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
                            <div class="item w-100">
                                <iframe 
                                    width="300" height="215"
                                    src={{$vd->url}}
                                    title="YouTube video player" 
                                    frameborder="0" 
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                    referrerpolicy="strict-origin-when-cross-origin" 
                                    allowfullscreen>
                                </iframe>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
          </section>

    </main>
    @endsection()