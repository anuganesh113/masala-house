@extends('site.layouts.layout')
@section('page_title',  'Menu')

@section('content')

    <!-- page banner start -->
    <section class="banner banner__page">
        <div class="banner__page--img">
            <img src="{{ asset('site-assets/images/about/about-banner.png') }}" alt="">
        </div>
        <div class="banner__page--content">
            <h1>Our menu</h1>
            <p>Check out our Indian Authentic Collection of Foods </p>
        </div>
    </section>
    <!-- page banner end -->

    <!-- menu checkout start -->
    <!-- menu checkout end -->


    <!-- menu list start -->
    <section class="menu__wrapper">
        <section class="menu__item">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-12">
                        <div class="menu__box">
                            <ul class="nav" id="navbar">
                                @foreach ($categories as $category)
                                    @if($category->menus->count() > 0)
                                        <li class="" style="margin-right: inherit;">
                                            <a href="#menuNav{{ $loop->iteration }}" class="nav-links">
                                                {{ $category->name }}
                                            </a>

                                        <li>
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3">
                        <a href="{{ requesturl() }}" class="l__button l__button--primary">
                            <i class='bx bx-carts'></i> Order Now
                        </a>
                    </div> -->
                </div>
            </div>
        </section>

        @foreach ($categories as $category)
            @if($category->menus->count() > 0)
                <div class="menu__list" id="menuNav{{ $loop->iteration }}">
                    <div class="section__title text-center">
                        <div class="container">
                            <h5>Missing Indian Street Food ?</h5>
                            <h2>Checkout Our Delicious {{ $category->name }} Collection</h2>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="menu__list--box">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="image d-none d-lg-block">
                                        <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::CATEGORIES_PATH, data_get($category, 'image'))) }}"
                                            class="img-1" alt="">
                                        <img src="{{ asset('site-assets/images/menu-2.png') }}" class="img-2" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="row  mb-lg-5 mb-4">
                                        <div class="col-xl-7 col-lg-8 col-md-6 col-sm-6">
                                            <div class="section__title">
                                                <h4>Our best {{ $category->name }} </h4>
                                                <h2>{{ $category->name }}</h2>
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6">
                                            <!-- @include("site.includes.scroll") -->
                                        </div>
                                    </div>
                                    <div class="position-relative">
                                        <div class="owl-carousel owl-theme menuList__carousel">

                                            <div class="item">
                                                @foreach ($category->menus as $menu)
                                                    <div class="menuFlex__card dnone">
                                                        <div class="menuFlex__card--img d-lg-none">
                                                            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($menu, 'image'))) }}"
                                                                alt="{{ $menu->name }}">
                                                        </div>
                                                        <div class="menuFlex__card--box">
                                                            <div class="menuFlex__card--title">
                                                                <h3 class="name">{{ $menu->name }} </h3>


                                                                <span class="price">${{ $menu->price }} <br>

                                                            </div>
                                                            <div class="menuFlex__card--content dnone" >
                                                                <div class="menuFlex__card--text d-block popular_cont">
                                                                 
                                                                        {!! $menu->excerpt ?? '<P> no description available</P> ' !!}

                                                                    <!-- <div class="menuFlex__card--quantity d-lg-none mt-4">
                                                                        <h5>Quantity</h5>
                                                                        <div class="box d" data-quantity="">
                                                                            <button class="quantity-btn" data-quantity-minus="">
                                                                                <i class='bx bx-minus'></i>
                                                                            </button>
                                                                            <input type="number" class="quantity-input"
                                                                                data-quantity-target="" value="1" step="1" min="1"
                                                                                max="" name="quantity" />
                                                                            <button class="quantity-btn" data-quantity-plus="">
                                                                                <i class='bx bx-plus'></i>
                                                                            </button>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                                <div class="menuFlex__card--quantity">
                                                            <!-- <div class="box d-none d-lg-flex" data-quantity="">
                                                            <button class="quantity-btn" data-quantity-minus="">
                                                            <i class='bx bx-minus'></i>
                                                            </button>
                                                            <input type="number" class="quantity-input"
                                                            data-quantity-target="" value="1" step="1" min="1" max=""
                                                            name="quantity" />
                                                            <button class="quantity-btn" data-quantity-plus="">
                                                            <i class='bx bx-plus'></i>
                                                            </button>
                                                            </div> -->
                                                                    <span class="cat {{cssnonveg($menu->type)}}">{{ checkVegetarian($menu->type) }}</span>
                                                                    <span>
                                                                        <a href="{{ requesturl() }}" target="_blank"
                                                                            class="order-now-btn2 boxshadow wtc "
                                                                            style="margin-top: 20px; display: block;">Order Now </a>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                @endforeach
                                            </div>

                                            <!-- @include("site.includes.menu-flex") -->
                                        </div>
                                        <!-- <a href="{{ url('checkout') }}" class="l__button l__button--primary">complete order</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </section>
    <!-- menu list end -->

    <!-- text slider section start -->
    <section class="textSlider mb-0" style="margin-top: -4rem;">
        @include("site.includes.text-slider")
    </section>
    <!-- text slider section end -->


    <!-- qucik grab section end -->
    <section class="grab">
        <div class="container-fluid">
            <div class="flex">
                <div class="section__title">
                    <h4>Dining Experiences</h4>
                    <h2>Hyderabad</h2>
                </div>
                <div class="tet-end">
                    <p> Enjoy our extensive lunch buffet featuring over 20 items including appetizers, main courses, and
                        desserts
                    </p>
                </div>
            </div>
        </div>
        <div class="grab__box">
            <div class="owl-carousel owl-theme family family__carousel">
                @include("site.includes.menu-slider")
            </div>
        </div>
    </section>
    <!-- qucik grab section end -->

@endsection

@push('footer')
    <!-- owl carousel -->
    <script>
        $('.menuList__carousel').owlCarousel({
            loop: true,
            margin: 0,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>',
            ],
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                    nav: false,
                },
                600: {
                    items: 1,
                    dots: true,
                    nav: false,
                },
                1000: {
                    items: 1,
                    dots: true,
                    nav: false,
                }
            }
        })

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
            .on('changed.owl.carousel', function (event) {
                // Remove active class from all items
                $('.textSlider__carousel .owl-item').removeClass('is-center-active');

                // Get the centered item index
                var current = event.item.index;

                // Add active class to the centered item
                $('.textSlider__carousel .owl-item').eq(current).addClass('is-center-active');
            });

        $('.family__carousel').owlCarousel({
            loop: true,
            margin: 30,
            responsiveClass: true,
            autoplay: true,
            autoplayHoverPause: true,
            autoplaySpeed: 600,
            lazyLoad: true,
            navText: [
                '<i class="fas fa-chevron-left"></i>',
                '<i class="fas fa-chevron-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1.5,
                    dots: false,
                    nav: false,
                },
                767: {
                    items: 2.5,
                    dots: false,
                    nav: false,
                },
                1000: {
                    items: 3.5,
                    dots: false,
                    nav: false,
                },
                1200: {
                    items: 3.5,
                    dots: false,
                    nav: false,
                    margin: 60,
                },
            },
        },);
    </script>



    <!-- nav script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const OFFSET = 220; // Height of your fixed navbar

            const navLinks = document.querySelectorAll('.nav-links');

            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    // Remove 'active' from all links
                    navLinks.forEach(l => l.classList.remove('active'));

                    // Add 'active' to the clicked link
                    this.classList.add('active');

                    // Scroll to the target section
                    const targetID = this.getAttribute('href').substring(1);
                    const targetEl = document.getElementById(targetID);
                    if (targetEl) {
                        const yOffset = OFFSET;
                        const y = targetEl.getBoundingClientRect().top + window.pageYOffset - yOffset;
                        window.scrollTo({
                            top: y,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>

    <!-- quantity script -->
    <script>
        (function () {
            "use strict";

            var jQueryPlugin = (window.jQueryPlugin = function (ident, func) {
                return function (arg) {
                    if (this.length > 1) {
                        this.each(function () {
                            var $this = $(this);

                            if (!$this.data(ident)) {
                                $this.data(ident, func($this, arg));
                            }
                        });

                        return this;
                    } else if (this.length === 1) {
                        if (!this.data(ident)) {
                            this.data(ident, func(this, arg));
                        }

                        return this.data(ident);
                    }
                };
            });

            // Quantity control function
            function Guantity($root) {
                const element = $root;
                const quantity_target = $root.find("[data-quantity-target]");
                const quantity_minus = $root.find("[data-quantity-minus]");
                const quantity_plus = $root.find("[data-quantity-plus]");
                const min = parseInt(quantity_target.attr("min")) || 1;
                const max = parseInt(quantity_target.attr("max")) || Infinity;

                // Initialize quantity_ from input value
                var quantity_ = parseInt(quantity_target.val()) || min;

                $(quantity_minus).click(function () {
                    if (quantity_ > min) {
                        quantity_--;
                        quantity_target.val(quantity_);
                    }
                });

                $(quantity_plus).click(function () {
                    if (quantity_ < max) {
                        quantity_++;
                        quantity_target.val(quantity_);
                    }
                });

                // Optional: update quantity_ if user manually changes input
                quantity_target.on("input", function () {
                    let val = parseInt($(this).val());
                    if (isNaN(val) || val < min) {
                        val = min;
                    } else if (val > max) {
                        val = max;
                    }
                    quantity_ = val;
                    $(this).val(quantity_);
                });
            }

            $.fn.Guantity = jQueryPlugin("Guantity", Guantity);
            $("[data-quantity]").Guantity();
        })();
    </script>
@endpush