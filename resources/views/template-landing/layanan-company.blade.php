@extends('template-landing.layouts')
@section('page-layouts')
    <section class="d-flex justify-content-center align-items-center" style="background-size:cover !important;background: url({{asset('assets/img/zero-title.png')}})">
        <div class="p-section position-relative text-center" data-aos="zoom-in" data-aos-delay="100">
            <h2 class="text-dark mt-5 mb-3">{!! 'KONSULTASI PERUSAHAAN' !!}</h2>
            <div class="row">
                <h3><strong>______GROW WITH US______</strong></h3>
            </div>
        </div>
    </section>
    <main id="main">
        <div class="section" style="background-color: #1F3A93">
            <div class="container">
                <div class="row w-100">
                    <div class="col-md-4 fs-5 py-2 text-light"><i class="fa-solid fa-phone"></i> {{'083896009671'}}</div>
                    <div class="col-md-4 fs-5 py-2 text-light"><i class="fa-brands fa-whatsapp fw-bold"></i> {{'083896009671'}}</div>
                    <div class="col-md-4 fs-5 py-2 text-light"><span class="fa fa-envelope"></span> {{'budi@rewata.com'}}</div>
                </div>
            </div>
        </div>
       @isset($service)
        <section id="layanan-utama" class="courses">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title bottom-title">
                    <h2 class="text-danger fw-bold">SERVICE/LAYANAN</h2>
                </div>
                @foreach ($service as $sv)
                    {!! $sv->title !!}
                    <div class="mt-3">{!! $sv->body !!}</div>
                @endforeach
            </div>
        </section>
        @endisset
        <section id="layanan-utama" class="courses" style="margin-top: -80px;">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title bottom-title">
                    <h2 class="text-danger fw-bold">Layanan Utama</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($company as $comp)
                    @if ($comp->image !='' || $comp->image !=null)
                    @php
                        $basename = basename($comp->image);
                    @endphp
                        <div class="col-lg-3 col-md-4 d-flex align-items-stretch mt-3 bottom-section">
                            <div class="course-item shadow-sm">
                                <div class="" style="height: 200px;">
                                    <img src="{{asset('storage/layanan/perusahaan/'.$basename)}}" class="img-fluid" alt="image-layanan">
                                </div>
                                <div class="course-content">
                                    <h3><a href="#">{!! $comp->title !!}</a></h3>
                                    {!! $comp->body !!} 
                                    <a href=""><button class="btn btn-sm btn-outline-primary rounded-pill shadow-sm text-dark">selengkapnya</button></a>
                                </div>
                            </div>
                        </div> 
                        
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        <section id="keungulan" class="courses" style="background-size:cover !important;background: url({{asset('assets/img/why-me.png')}})">
            <div class="p-section" data-aos="fade-up">
                <h3>Mengapa Menggunakan Jasa Rewata Consultant</h3>
                    
                <div class="row">
                    @foreach ($why_utama as $utama)
                    <div class="col-md-4">
                       <div>{!! $utama->title !!}</div>
                       <div>{!! $utama->body !!}</div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    @foreach ($why_sub as $sub)
                    <div class="col-md-3">
                       <div>{!! $sub->title !!}</div>
                       <div>{!! $sub->body !!}</div>
                    </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-3">Konsultan Ahli</div>
                    <div class="col-md-3">Harga Terjangkau</div>
                    <div class="col-md-3">Pelaksanaan Training</div>
                    <div class="col-md-3">Dokumentasi dan Materi</div>
                    <div class="col-md-3">Audit Sistem Gratis</div>
                    <div class="col-md-3">Garansi Konsultasi</div>
                    <div class="col-md-3">Diskon Konsultasi</div>
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