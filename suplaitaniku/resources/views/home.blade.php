@extends('layouts.app')

@section('content')
<section id="slider" class="slider-element slider-parallax swiper_wrapper full-screen clearfix">

    <div class="slider-parallax-inner">

        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                <div class="swiper-slide dark" style="background-image: url('images/welcome-1.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Selamat Datang di SuplaiTaniku</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Website ini didedikasikan untuk para Supplier Hasil Tani Desa Tanjung Beringin</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dark" style="background-image: url('images/welcome-2.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Desa Tanjung Beringin</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Masyarakat desa tanjung beringin, sidikalang punya potensi hasil tani</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide dark" style="background-image: url('images/welcome-3.jpg');">
                    <div class="container clearfix">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">Hasil tani terbaik</h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">Website ini dibangun untuk mempromosikan hasil tani desa ini</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div>
        </div>
    </div>

</section>
@endsection
