@extends('site.layouts.layout')

@section('page_title', 'blogs')

@push('header')
<link rel="stylesheet" href="{{ asset ('site-assets/css/fancybox.css') }}">
@endpush

@section('content')
<!-- page banner start -->
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ asset ('site-assets/images/about/about-banner.png') }}" alt="">
    </div>
    <div class="banner__page--content">
        <h1>Our Blogs </h1>
        <p>Have a sneak peak at our taste and Interesting Blogs</p>
    </div>
</section>
<!-- page banner end -->

<!-- catering section start -->
<section class="blog">
    <div class="container">
        <div class="section__title catering__title text-center">
            <h5>A Journey Through Flavours</h5>
            <h2>How traditional cooking connects culture, community, and comfort.</h2>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-4">

            @foreach($blogs ?? [] as $blog)
                <div class="col">
                    <div class="blog__card">
                        <div class="blog__card--img">
                            <img src="{{ $blog->full_image_link }}"
                                 alt="{{ $blog->name }}"
                            />
                            <span class="tags">{{ $blog->tag }}</span>
                        </div>
                        <div class="blog__card--content" style="position: relative;">
                            <h3 class="blogtitle" style="width: 100%;">{{ $blog->name }}</h3>
                            <a href="{{ route('site.blog', $blog->slug) }}" title="{{ $blog->name }}">
                                <div class="icon blogtitle"><i class='bx bx-arrow-back'></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
<!-- catering section end -->

<!-- text slider section start -->
<section class="textSlider">
    @include("site.includes.text-slider")
</section>
<!-- text slider section end -->

<!-- testimonial section start -->
<section class="testimonial testimonial__blog">
    <div class="container">
        @include("site.includes.testimonial")
    </div>
</section>
<!-- testimonial section end -->


<!-- video section srat -->
<section class="video mobvideo {{isset($videos) && $videos ? '' : 'd-none'}}">
    <div class="container-fluid">
        <div class="flex">
            <div class="section__title">
                <h4> {{ $videos->title ?? 'Watch our cooking skills in Tiktok' }} </h4>
                <h2>{{ $videos->name ?? 'Watch Us' }}</h2>
            </div>
            <div class="text-end">
                <span class="scroll">Scroll</span>
            </div>
        </div>
    </div>
    <div class="video__box">
        <div class="owl-carousel owl-theme video__carousel">
            @foreach($videos->metadata ?? []  as $key=>$link)
               <div class="item">
                <div class="video__card">
                    <a data-fancybox="video" href="{{ $link }}">
                        <img alt="Video poster" class="img-fluid"
                            src="https://img.youtube.com/vi/{{ getidVideo($link) }}/maxresdefault.jpg" />
                    </a>
                </div>
            </div>
            @endforeach
  
        </div>
    </div>
</section>
<!-- video section end -->

@endsection

@push('footer')
<script src="{{ asset ('site-assets/js/facybox.js') }}"></script>
<script>
    Fancybox.bind("[data-fancybox]", {
        Hash: false,
    });
</script>
<!-- owl carousel -->
<script>
    $('.textSlider__carousel').owlCarousel({
        loop: true,
        center: true,
        margin: 90,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        autoplaySpeed: 10000,
        smartSpeed: 6000,
        autoWidth: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                dots: false,
                nav: false,
            },
            767: {
                items: 2,
                dots: false,
            },
            991: {
                items: 3,
                dots: false,
            },
            1200: {
                items: 3,
                dots: false,
            },
        },
    })
    .on('changed.owl.carousel', function(event) {
        // Remove active class from all items
        $('.textSlider__carousel .owl-item').removeClass('is-center-active');

        // Get the centered item index
        var current = event.item.index;

        // Add active class to the centered item
        $('.textSlider__carousel .owl-item').eq(current).addClass('is-center-active');
    });

    $('.testimonial__carousel').owlCarousel({
        loop: false,
        margin: 0,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 600,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1,
                dots: true,
                nav: false,
            },
            767: {
                items: 1,
                dots: true,
                nav: false,
            },
            1000: {
                items: 1,
                dots: true,
                nav: false,
            },
            1200: {
                items: 1,
                dots: true,
                nav: false,
            },
        },
    }, );

    $('.video__carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 700,
        lazyLoad: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 2,
                dots: false,
                nav: false,
                margin: 15,
            },
            767: {
                items: 2.2,
                dots: false,
                nav: false,
            },
            1000: {
                items: 2.2,
                dots: false,
                nav: false,
            },
            1200: {
                items: 2.5,
                dots: false,
                nav: false,
                margin: 40,
            },
            1300: {
                items: 3.5,
                dots: false,
                nav: false,
                margin: 40,
            },
        },
    }, );
</script>
@endpush
