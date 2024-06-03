@extends('template-landing.layouts')
@section('page-layouts')
    <section class="d-flex justify-content-center align-items-center" style="background-size:cover !important;background: url({{asset('assets/img/zero-title.png')}})">
        <div class="p-section position-relative text-center" data-aos="zoom-in" data-aos-delay="100" style="margin-top: 50px;">
            <h2 class="text-dark">{!! 'KONSULTASI PERSONAL' !!}</h2>
            <div class="row">
                <h3><strong>GROW WITH US</strong></h3>
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
                                    <a href="show-layanan-personal"><button class="btn btn-sm btn-outline-primary rounded-pill shadow-sm text-dark">selengkapnya</button></a>
                                </div>
                            </div>
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