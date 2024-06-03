@extends('template-landing.layouts')
@section('page-layouts')
    <section class="d-flex justify-content-center align-items-center" style="background-size:cover !important;background: url({{asset('assets/img/zero-title.png')}})">
        <div class="p-section position-relative text-center" data-aos="zoom-in" data-aos-delay="100" style="margin-top: 50px;">
            <h2 class="text-dark">{!! 'BLOG DAN ARTIKEL' !!}</h2>
            <div class="row">
                <h3><strong>______GROW WITH US______</strong></h3>
            </div>            
        </div>
    </section>
    <main id="main">
        <section id="popular-courses" class="courses mb-5">
            <div class="p-section" data-aos="fade-up">
                <div class="section-title">
                    <h2 class="text-danger fw-bold">Blog dan Artikel</h2>
                </div>
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    @foreach ($blog as $artikel)
                        <div class="col-lg-3 col-md-4 d-flex align-items-stretch mt-3 bottom-section">
                            <div class="course-item shadow-sm">
                                <div class="">
                                    <img src="{{asset('storage/blog/'.basename($artikel->image))}}" class="img-fluid" alt="image-layanan">
                                </div>
                                <div class="course-content">
                                    <h3><a href="#">{!! $artikel->title !!}</a></h3>
                                    {!! $artikel->short_description !!} 
                                    <a href="/show-blog-artikel"><button class="btn btn-sm btn-outline-danger rounded-pill shadow-sm text-dark">selengkapnya</button></a>
                                </div>
                            </div>
                        </div> 
                    @endforeach     
                </div>
            </div>
        </section>
    </main>
@endsection()