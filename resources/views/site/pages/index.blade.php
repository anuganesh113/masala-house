@extends('site.layouts.layout')
@section('page_title', config()->get('app.name'))

@push('seo-share')
<meta name="title" content="{{ data_get($setting, 'seo.title') }}" />
<meta name="keywords" content="{{ data_get($setting, 'seo.keywords') }}" />
<meta name="description" content="{{ data_get($setting, 'seo.description') }}" />

<meta property="og:url" content="{{ request()->url() }}" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="en_US" />
<meta property="og:title" content="{{ data_get($setting, 'name') }}" />
<meta property="og:description" content="{{ substr(strip_tags(data_get($about, 'excerpt')), 0, 215) }}" />
<meta property="og:image"
    content="{{ asset(sprintf('%s%s', App\Enums\UploadFilePath::LOGO_PATH, data_get($setting, 'logo'))) }}" />
<meta property="og:image:alt" content="{{ data_get($setting, 'name') }}" />
@endpush

@section('content')

<x-site.banner />

<!-- experience section start -->
<section class="experience">
    <div class="experience__img">
        <img src="{{ asset('site-assets/images/index/exp-bg-3.png') }}" alt="">
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 offset-lg-5 col-xl-6 offset-xl-6">
                <div class="section__title">
                    <h4>Since 2015</h4>
                    <h2> Wonderful Dining Experience & Indian Food</h2>
                </div>
                <div class="content">
                    <p>Masala House was founded in 2015 by Chef Raj Sharma with a simple mission: to bring the authentic flavors of India to Pittsburg, 
                        California. Born and raised in Delhi, Chef Raj learned the art of Indian cooking from his grandmother, 
                        who taught him the importance of freshly ground spices and traditional cooking techniques.</p>
                </div>
                <div class="btn__group">
                    <button class="l__button l__button--primary" data-bs-toggle="modal"
                        data-bs-target="#bookatableModal">find a table
                    </button>
                    <button class="l__button l__button--secondary">order now</button>
                </div>
            </div>
        </div>
    </div>
    <div class="experience__img--bottom">
        <img src="{{ asset('site-assets/images/index/exp-bg-1.png') }}" class="img-1" alt="">
        <img src="{{ asset('site-assets/images/index/exp-bg-2.png') }}" class="img-2" alt="">
    </div>
</section>
<!-- experience section end -->


<!-- popular menu section start -->
@include("site.pages.popular_menu")

<!-- popular menu section end -->


<!-- family together section start -->
<section class="family p__tb--t">
    <div class="section__title text-center">
        <h5>Grab a grand orders for your family </h5>
        <h2>Family Together</h2>
        @include("site.includes.scroll")
    </div>
    <div class="owl-carousel owl-theme family__carousel">
        @include("site.includes.menu-slider")

    </div>
    <div class="text-center">
        <!-- <a href="" class="l__button l__button--primary">complete order</a> -->
    </div>
</section>
<!-- family together section end -->

<!-- text slider section start -->
<section class="textSlider textSlider__index mb-0">
    @include("site.includes.text-slider")
</section>
<!-- text slider section end -->

<!-- explore menu section for mobile start -->
<section class="menu__index">
    <div class="menu__index__box">
        <div class="flex">
            <div class="section__title">
                <h2>Explore our Whole Menu</h2>
            </div>
            <div class="d-none d-lg-block">
                @include("site.includes.scroll")
            </div>
        </div>
        <div class="tab">
            <div class="row">
                <div class="col-lg-4 col-xl-4 col-xxl-3">
                    <ul class="tab__buttons">
                        @foreach ($categories as $category)
                        @if(isset($category->menus) && $category->menus->count() > 0)

                        <li class="tab__buttons--btn {{ $loop->first ? 'active' : '' }}"
                            data-target="#tab{{ $loop->iteration }}">
                            <span></span> {{ $category->name }}
                        </li>
                        @endif

                        @endforeach
                    </ul>
                </div>
                <div class="whole-menu-section col-lg-8 col-xl-8 col-xxl-9">
                    <div class="tab__contents">
                        @foreach ($categories as $category)
                        <div id="tab{{ $loop->iteration }}"
                            class="tab__contents--text {{ $loop->first ? 'active' : '' }}">

                            <div class="owl-carousel owl-theme wholeMenu__carousel">
                                @foreach ($category->menus as $item)
                                <div class="item">
                                    <div class="menu__card">
                                        <div class="menu__card--img">
                                            <a href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">
                                                <img class="owl-lazy"
                                                    data-src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($item, 'image'))) }}"
                                                    alt="{{$item->name}}">
                                            </a>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                    x="0" y="0" viewBox="0 0 48 48"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <g fill="#000">
                                                            <path
                                                                d="M22.286 0c-.94 0-1.7.767-1.7 1.714h-.014V15.43a1.714 1.714 0 1 1-3.429 0V1.714h-.013C17.13.767 16.368 0 15.429 0c-.94 0-1.701.767-1.701 1.714h-.013V15.43a1.714 1.714 0 1 1-3.429 0V1.714C10.286.767 9.524 0 8.586 0c-.94 0-1.702.767-1.702 1.714h-.027v17.143c0 2.109 2.116 3.921 5.143 4.715v21a3.429 3.429 0 0 0 6.857 0v-21C21.884 22.778 24 20.966 24 18.857V1.714h-.013C23.987.767 23.225 0 22.286 0zM40.286 0c-6.154 0-11.142 10.745-11.142 24 0 1.164.038 2.309.113 3.429h5.03V44.57a3.429 3.429 0 0 0 6.857 0V.07a5.295 5.295 0 0 0-.858-.07z"
                                                                fill="#000000" opacity="1" data-original="#000000"
                                                                class=""></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="menu__card--content">
                                            <h3><a href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">{{ $item->name }} </a>

                                            </h3>
                                            <div class="exploreour" style="min-height: 50px;">
                                                {!! $item->excerpt ?? '<p>No description available</p>' !!}
                                            </div>

                                            <div class="menu__card--footer">
                                                <h6 class="menu_price_color">${{ $item->price }} </h6>
                                                <span class="cat veg-btn-e bt-fr {{cssnonveg($item->type)}}">{{ checkVegetarian($item->type) }}</span>
                                                <a class="menu__card--cta order-now-btn mt-2 mr-l wtc" href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">Order Now</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>

                            <div class="owl-carousel owl-theme wholeMenu__carousel d-none d-md-block">


                                @foreach ($category->menusOrdered as $item)
                                <div class="item">
                                    <div class="menu__card">
                                        <div class="menu__card--img">
                                            <a href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">
                                                <img class="owl-lazy"
                                                    data-src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($item, 'image'))) }}"
                                                    alt="{{$item->name}}">
                                            </a>
                                            <div class="icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="512" height="512"
                                                    x="0" y="0" viewBox="0 0 48 48"
                                                    style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                    class="">
                                                    <g>
                                                        <g fill="#000">
                                                            <path
                                                                d="M22.286 0c-.94 0-1.7.767-1.7 1.714h-.014V15.43a1.714 1.714 0 1 1-3.429 0V1.714h-.013C17.13.767 16.368 0 15.429 0c-.94 0-1.701.767-1.701 1.714h-.013V15.43a1.714 1.714 0 1 1-3.429 0V1.714C10.286.767 9.524 0 8.586 0c-.94 0-1.702.767-1.702 1.714h-.027v17.143c0 2.109 2.116 3.921 5.143 4.715v21a3.429 3.429 0 0 0 6.857 0v-21C21.884 22.778 24 20.966 24 18.857V1.714h-.013C23.987.767 23.225 0 22.286 0zM40.286 0c-6.154 0-11.142 10.745-11.142 24 0 1.164.038 2.309.113 3.429h5.03V44.57a3.429 3.429 0 0 0 6.857 0V.07a5.295 5.295 0 0 0-.858-.07z"
                                                                fill="#000000" opacity="1" data-original="#000000"
                                                                class=""></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="menu__card--content">
                                            <h3><a href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">{{ $item->name }} </a>

                                            </h3>
                                            <div class="exploreour" style="min-height: 50px;">
                                                {!! $item->excerpt ?? '<p>No description available</p>' !!}
                                            </div>

                                            <div class="menu__card--footer">
                                                <h6 class="menu_price_color">${{ $item->price }} </h6>
                                                <span class="cat veg-btn-e bt-fr {{cssnonveg($item->type)}}">{{ checkVegetarian($item->type) }}</span>
                                                <a class="menu__card--cta order-now-btn mt-2 mr-l" href="{{ requesturl() . '/' . $item->slug  }}"  target="_blank">Order Now</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- explore menu section end -->


<!-- bg section start -->

@include("site.pages.event")
<!-- event section end -->


<!-- cta section start -->
<section class="cta">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="cta__left">
                    <img src="{{ asset('site-assets/images/cta/cta-1.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="cta__middle">
                    <h2>Looking for Catering ? </h2>
                    <p>Explore our most Exquisite Indian Menu</p>
                    <a href="" class="l__button l__button--transparent">Get a Quote Today </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cta__right">
                    <img src="{{ asset('site-assets/images/cta/cta-2.png') }}" class="first" alt="">
                    <img src="{{ asset('site-assets/images/cta/cta-3.png') }}" class="second" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- cta section end -->


<!-- reservation section start -->


@include("site.pages.tableform")
<!-- reservation section end -->

@if(isset($popup) && $popup->count() > 0)

@include("site.pages.popup")
@endif
@endsection

@push('footer')


<!-- owl carousel script -->
<script>


     document.addEventListener('DOMContentLoaded', function() {
        var modal = new bootstrap.Modal(document.getElementById('popupModal'));
        modal.show();
    });
    

    $('.banner__carousel').owlCarousel({
        loop: true,
        margin: 0,
        responsiveClass: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: false,
        lazyLoad: true,
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
                items: 1,
                dots: false,
                nav: false,
            },
            1000: {
                items: 1,
                dots: false,
                nav: false,
            },
            1200: {
                items: 1,
                dots: false,
                nav: false,
            },
        },
    }, );

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
                items: 3.2,
                dots: false,
                nav: false,
            },
            1200: {
                items: 3.2,
                dots: false,
                nav: false,
                margin: 60,
            },
        },
    }, );

    $('.wholeMenu__carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoplay: false,
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
        lazyLoad: true,
        navText: [
            '<i class="fas fa-chevron-left"></i>',
            '<i class="fas fa-chevron-right"></i>'
        ],
        responsive: {
            0: {
                items: 1.5,
                dots: true,
                nav: false,
            },
            767: {
                items: 2.2,
                dots: true,
                nav: false,
            },
            1000: {
                items: 2.2,
                dots: true,
                nav: false,
            },
            1200: {
                items: 2.5,
                dots: true,
                nav: false,
                margin: 40,
            },
            1300: {
                items: 3.5,
                dots: true,
                nav: false,
                margin: 40,
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

    $(document).ready(function() {
        $(".popular__carousel")
            .on("initialized.owl.carousel changed.owl.carousel", function(e) {
                if (!e.namespace) {
                    return;
                }

                const currentIndex = e.relatedTarget.relative(e.item.index) + 1;
                const totalCount = e.item.count;

                $("#counter").html(`
                                                                                                                                                    <span class="left-arrow" style="cursor:pointer;"><i class="fas fa-chevron-left"></i></span>
                                                                                                                                                    <span class="first">${currentIndex}</span> /
                                                                                                                                                    <span class="second">${totalCount}</span>
                                                                                                                                                    <span class="right-arrow" style="cursor:pointer;"><i class="fas fa-chevron-right"></i></span>
                                                                                                                                                `);

                // Remove previous click handlers to avoid duplicates
                $("#counter .left-arrow").off("click").on("click", function() {
                    $(".popular__carousel").trigger("prev.owl.carousel");
                });

                $("#counter .right-arrow").off("click").on("click", function() {
                    $(".popular__carousel").trigger("next.owl.carousel");
                });
            })
            .owlCarousel({
                loop: true,
                margin: 0,
                responsiveClass: true,
                autoplay: false,
                autoplayTimeout: 5000,
                autoplayHoverPause: false,
                navText: [
                    '<i class="fas fa-chevron-left"></i>',
                    '<i class="fas fa-chevron-right"></i>',
                ],
                responsive: {
                    0: {
                        items: 1,
                        dots: false,
                        nav: false,
                    },
                    767: {
                        items: 1,
                        dots: false,
                        nav: false,
                    },
                    1000: {
                        items: 1,
                        dots: false,
                        nav: false,
                    },
                    1200: {
                        items: 1,
                        dots: false,
                        nav: false,
                    },
                },
            });
    });

    // Add owl-carousel + owl-theme below md and remove/destroy above md
    $(function() {
        const MD_BREAKPOINT = 992; // <768px => enable. Change to 992 if your "md" is 992.

        const $tabs = $('.menu__index__box .tab .tab__buttons');

        function toggleTabsCarousel() {
            const isBelowMd = window.innerWidth < MD_BREAKPOINT;

            if (isBelowMd) {
                if (!$tabs.hasClass('owl-carousel')) {
                    $tabs.addClass('owl-carousel owl-theme');
                    if ($.fn.owlCarousel) {
                        $tabs.owlCarousel({
                            autoWidth: true,
                            margin: 30,
                            dots: false,
                            nav: true,
                            navText: [
                                '<i class="fas fa-chevron-left"></i>',
                                '<i class="fas fa-chevron-right"></i>'
                            ],
                            responsive: {
                                0: {
                                    items: 2
                                },
                                480: {
                                    items: 3
                                },
                                640: {
                                    items: 3
                                }
                            }
                        });
                    }
                }
            } else {
                if ($tabs.hasClass('owl-carousel')) {
                    // Destroy Owl (if initialized) and clean up
                    if ($tabs.data('owl.carousel')) {
                        $tabs.trigger('destroy.owl.carousel');
                    }
                    $tabs.removeClass('owl-carousel owl-theme owl-loaded');
                    // If any wrappers remain (depends on Owl version), unwrap safely
                    $tabs.find('.owl-stage-outer').children().unwrap();
                    $tabs.find('.owl-stage').children().unwrap();
                    $tabs.find('.owl-item').children().unwrap();
                }
            }
        }

        // Init + responsive toggle
        toggleTabsCarousel();
        $(window).on('resize orientationchange', debounce(toggleTabsCarousel, 150));

        function debounce(fn, wait) {
            let t;
            return function() {
                clearTimeout(t);
                t = setTimeout(() => fn.apply(this, arguments), wait);
            };
        }
    });

    function toggleContent() {
        if (window.innerWidth < 992) { // < lg
            document.getElementById('contentA').style.display = 'block';
            document.getElementById('contentB').style.display = 'none';
        } else {
            document.getElementById('contentA').style.display = 'none';
            document.getElementById('contentB').style.display = 'block';
        }
    }

    toggleContent(); // Run on load
    window.addEventListener('resize', toggleContent); // Run on window resize
</script>

<!-- quantity script -->
<script>
    (function() {
        "use strict";

        var jQueryPlugin = (window.jQueryPlugin = function(ident, func) {
            return function(arg) {
                if (this.length > 1) {
                    this.each(function() {
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

            $(quantity_minus).click(function() {
                if (quantity_ > min) {
                    quantity_--;
                    quantity_target.val(quantity_);
                }
            });

            $(quantity_plus).click(function() {
                if (quantity_ < max) {
                    quantity_++;
                    quantity_target.val(quantity_);
                }
            });

            // Optional: update quantity_ if user manually changes input
            quantity_target.on("input", function() {
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

<!-- tab script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Select all .tab containers
        document.querySelectorAll('.tab').forEach(tab => {
            const buttons = tab.querySelectorAll('.tab__buttons--btn');
            const contents = tab.querySelectorAll('.tab__contents--text');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and contents inside this tab group
                    buttons.forEach(btn => btn.classList.remove('active'));
                    contents.forEach(content => content.classList.remove('active'));

                    // Activate clicked button
                    button.classList.add('active');

                    // Get target ID and find the matching content inside this tab group
                    const target = button.getAttribute('data-target');
                    const contentToShow = tab.querySelector(target);

                    if (contentToShow) {
                        contentToShow.classList.add('active');
                    }
                });
            });
        });
    });
</script>

@endpush