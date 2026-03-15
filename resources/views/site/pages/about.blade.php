@extends('site.layouts.layout')
@section('page_title', 'about')

@section('content')

<!-- page banner start -->
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ asset ('site-assets/images/about/about-banner.png') }}" alt="">
    </div>
    <div class="banner__page--content">
        <h1>Our story</h1>
        <p>The story behind our Masala House Initiative</p>
    </div>
</section>
<!-- page banner end -->

<!-- welcome section start -->
<section class="welcome m__tb--t">
    <div class="container">
        <div class="section__title text-center">
            <h5>{{ data_get($welcome, 'name') }}</h5>
            <h2>{{ data_get($welcome, 'title') }}</h2>
        </div>
        <div class="welcome__box">
            <div class="welcome__left">
                <svg viewBox="0 0 500 500" width="500" height="500">
                    <!-- Define a circle path with center at (250,250) and radius 150 -->
                    <path id="circlePath" d="M 400,250 A 150,150 0 1,1 100,250 A 150,150 0 1,1 400,250"
                        fill="transparent" />

                    <text text-anchor="middle" dominant-baseline="middle">
                        <textPath href="#circlePath" startOffset="50%">
                            Serving Indian Authentic Cuisine
                        </textPath>
                    </text>
                </svg>
                <div class="welcome__left--year">
                    <span>10</span><small>Years</small>
                </div>
                <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::PAGES_PATH, data_get($welcome, 'image_one'))) }}"
                    alt="{{ data_get($welcome, 'image_one_alt') }}" />
            </div>
            <div class="welcome__right">
                <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::PAGES_PATH, data_get($welcome, 'image_two'))) }}"
                    alt="{{ data_get($welcome, 'image_two_alt') }}" />
            </div>
        </div>
    </div>
</section>
<!-- welcome section end -->

<!-- about section start -->
<section class="about p__tb m__tb--b">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section__title">
                    <h6>About Restaurant</h6>
                    <h2>{{ data_get($our_story, 'name') }}</h2>
                </div>
                <div class="about__img position-static mb-4 d-block d-lg-none">
                    <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::PAGES_PATH, data_get($our_story, 'image_one'))) }}"
                        alt="{{ data_get($our_story, 'image_one_alt') }}" />
                </div>
                <div class="about__content">
                    {!! data_get($our_story, 'description') !!}
                </div>
                {{--<div class="review">
                    <strong>4.5</strong>
                    <div class="box">
                        <div class="star">
                            <span><i class='bx bxs-star'></i></span>
                            <span><i class='bx bxs-star'></i></span>
                            <span><i class='bx bxs-star'></i></span>
                            <span><i class='bx bxs-star'></i></span>
                            <span><i class='bx bxs-star-half'></i></span>
                        </div>
                        <p>Reviewed by Google</p>
                    </div>
                </div>--}}
            </div>
            <div class="col-lg-6">
                <div class="about__img d-none d-lg-block">
                    <img src="{{ asset('site-assets/images/about/about.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about section end -->


<!-- chef section start -->
<section class="chef">
    <div class="container-fluid">
        <div class="section__title text-center">
            <h5>Get to know our team</h5>
            <h2>Meet Our Chefs</h2>
        </div>
    </div>
    <div class="chef__box p__tb">
        <div class="owl-carousel owl-theme chef__carousel">

            @foreach($members ?? [] as $member)
            <div class="item">
                <div class="container">
                    <div class="chef__card">
                        <div class="row">
                            <div class="col-lg-7 order-2 order-lg-1">
                                <div class="chef__card--content">
                                    <h6>{{ data_get($member, 'name') }}</h6>
                                    <h3>{{ data_get($member, 'designation') }}</h3>
                                    <div class="content">
                                        {!! data_get($member, 'message') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 order-1 order-lg-2">
                                <div class="chef__card--img mb-4 mb-lg-0">
                                    <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MEMBERS_PATH, data_get($member, 'image'))) }}"
                                        alt="{{ data_get($member, 'name') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- chef section end -->


<!-- testimonial section start -->
<section class="testimonial m__tb--b">
    <div class="container">
        @include("site.includes.testimonial")
    </div>
</section>
<!-- testimonial section end -->


<!-- text slider section start -->
<section class="textSlider">
    @include("site.includes.text-slider")
</section>
<!-- text slider section end -->


<!-- history slider section start -->
<section class="history">
    <div class="history__box">
        @include("site.includes.scroll")
        <div class="owl-carousel owl-theme histroy__carousel">
            <div class="item">
                <div class="history__card">
                    <div class="row g-0">
                        <div class="col-xxl-5 col-xl-5 col-lg-6 order-2 order-lg-1">
                            <div class="history__card--content">
                                <div class="section__title">
                                    <h4>{{ data_get($dining_experience, 'name') }}</h4>
                                    <h2>{{ data_get($dining_experience, 'title') }}</h2>
                                </div>

                                <div class="content">
                                    {!! data_get($dining_experience, 'description') !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-7 col-xl-7 col-lg-6  order-1 order-lg-2">
                            <div class="history__card--img mb-4 mb-lg-0">
                                <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::PAGES_PATH, data_get($dining_experience, 'image_one'))) }}"
                                    alt="{{ data_get($dining_experience, 'image_one_alt') }}" />
                            </div>
                        </div>
                        <div class="col-xxl-7 col-xl-7 col-lg-6  order-3">
                            <div class="btn__group">
                                <button class="l__button l__button--primary" data-bs-toggle="modal" data-bs-target="#bookatableModal">Reserve</button>
                                <a href="/contact" class="l__button l__button--secondary" target="_blank">Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row justify-content-end d-none d-lg-flex">
            <div class="col-xxl-7 col-xl-7 col-lg-6">
                <div class="stat">
                    <div class="star mb-0">
                        <span><i class="bx bxs-star"></i></span>
                        <span><i class="bx bxs-star"></i></span>
                        <span><i class="bx bxs-star"></i></span>
                        <span><i class="bx bxs-star"></i></span>
                        <span><i class="bx bxs-star"></i></span>
                    </div>
                    <div class="">
                        <strong>30,000+ Happy Food Lovers</strong>
                        <p>Visited our Authentic Indian Restaurant</p>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>
</section>
<!-- history slider section end -->


<!-- gallery section start -->
<section class="gallery p__tb">
    <div class="container-fluid">
        <div class="flex">
            <div class="section__title">
                <h4>Making Memories with US </h4>
                <h2>Our Gallery</h2>
            </div>
            @include("site.includes.scroll")
        </div>
    </div>

    <div class="gallery__box gallery__boxres" >

        <div class="owl-carousel owl-theme gallery__carousel">
            @foreach($galleries ?? [] as $image)
            @foreach($image->gallery ?? [] as $key => $item)

            <div class="item ">
                <div class="gallery__card gallery__card--big">
                    <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::GALLERIES_PATH, $item->image)) }}" alt="{{ $item->image_alt }}">
                </div>
            </div>

            <!-- @if(count($image->gallery) > 1)
           <div class="item">
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 g-4">
                    @foreach($image->gallery->slice(1, 4) ?? [] as $key => $item)

                    <div class="col">
                        <div class="gallery__card gallery__card--small">
                            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::GALLERIES_PATH, $item->image)) }}" alt="{{ $item->image_alt }}">
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            @endif -->
            @endforeach
            @endforeach

        </div>
    </div>
</section>
<!-- gallery section end -->

@endsection

@push('footer')
<script>
    $('.chef__carousel').owlCarousel({
        loop: false,
        margin: 25,
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
                nav: true,
            },
        },
    }, );

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


    $('.histroy__carousel').owlCarousel({
        loop: true,
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

    $('.gallery__carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoplay: false,
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
                items: 2,
                dots: true,
                nav: false,
            },
            1000: {
                items: 2,
                dots: true,
                nav: false,
            },
            1200: {
                items: 3,
                dots: true,
                nav: false,
            },
        },
    }, );
</script>
@endpush