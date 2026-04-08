@extends('site.layouts.layout',[
'title' => data_get($page, "seo.title") ?? 'Menu',
'description' => strip_tags(data_get($page, "seo.description") ?? description()),
'image' => $page ? $page->full_image_link : banner() ,
'keywords' => data_get($page, "seo.keywords") ?? keywords(),
])
@push('header')
<style>
    .itemgrab__box {
        padding-left: 0.375rem;
    }
</style>
@endpush
@section('content')

<!-- page banner start -->
<section class="banner banner__page">
    <div class="banner__page--img">
        <img src="{{ $page ?  $page->breadcrumbs_image_link : asset ('site-assets/images/about/about-banner.png') }}" alt="{{$page->name}}">
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
                    <div class="menu__box menubox">
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
    <div class="menu__list" id="menuNav{{ $loop->iteration }}" class="sectionsmenu">
        <div class="section__title text-center">
            <div class="container">
                <h5>Missing Indian {{ $category->name }} ?</h5>
                <h2>Checkout Our Delicious {{ $category->name }} Collection</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="menu__list--box deskview">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="image d-none d-lg-block">
                            <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::CATEGORIES_PATH, data_get($category, 'image'))) }}"
                                class="img-1" alt="{{$category->name}} ">
                            <img src="{{ $category->full_icon_link }}" class="img-2" alt="{{$category->name}}">
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
                                    <div class="menuFlex__card dnone menuboxshadow">
                                        <div class="menuFlex__card--img  mobile-menu mb-2 menuimgrespo">
                                            <a href="{{ route('site.product', ['slug' => $menu->slug , 'id' => $menu->id]) }}" >
                                                <img src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($menu, 'image'))) }}"
                                                    alt="{{  $menu->image_alt ?? $menu->name }}">
                                            </a>
                                            
                                        </div>
                                        <div class="menuFlex__card--box">
                                            <div class="menuFlex__card--title">
                                                <h3 class="name">{{ $menu->name }} 
                                                   
                                                    
                                            </h3>
                                                <span class="menu__card--price mob">${{ $menu->price }} <br>

                                            </div>
                                            <div class="menuFlex__card--content dnone dcontent">
                                                <div class="menuFlex__card--text d-block popular_cont">
                                                    {!! $menu->excerpt ?? '<P> no description available</P> ' !!}
                                                </div>
                                                <div class="menuFlex__card--quantity orderdiv">
                                                    <span class="foronly_mobilresponsive" style="color: rgb(229.5, 99.9, 0);font-weight: 900;">${{ $menu->price }}</span>
                                                    <span class="cat catvegg float-end mobresp  mt-0 {{cssnonveg($menu->type)}}">{{ checkVegetarian($menu->type) }}</span>
                                                
                                                    <span>
                                                        <a href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank"
                                                            class="order-now-btn2 boxshadow mobile wtc men-ord"
                                                            style=" display: block;"><i class="fas fa-shopping-cart"></i> Order Now </a>
                                                    </span>
                                                    <span>
                                                        <a href="{{ route('site.product', ['slug' => $menu->slug , 'id' => $menu->id]) }}"
                                                            class="order-now-btn2 boxshadow mobile wtc men-ord menuviewbtn"
                                                            style=" display: block;"><i class="fas fa-search"></i> View Details </a>
                                                    </span>
                                                </div>
                                            </div>
                                             <span class="cat mt-0  desviewresp {{cssnonveg($menu->type)}}">{{ checkVegetarian($menu->type) }}</span>
                                        </div>


                                    </div>

                                    @endforeach
                                </div>

                           
                            </div>
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
                <p> Enjoy our extensive lunch featuring over 20 items including appetizers, main courses, and
                    desserts
                </p>
            </div>
        </div>
    </div>
    <div class="grab__box itemgrab__box">
        <div class="owl-carousel owl-theme family family__carouselss">
            @include("site.includes.menu-slider")
        </div>
    </div>
</section>
<!-- qucik grab section end -->

@endsection

@push('footer')
<script>
    //    $(document).ready(function() {
    //        $('html, body').animate({
    //            scrollTop: $('header').offset().top
    //        }, 0);
    //    });

    $(document).ready(function() {

        $('html, body').animate({
            scrollTop: $('#menuNav1').offset().top
        }, 0);
        $('.nav-links').removeClass('active');
        $('a[href="#menuNav1"]').addClass('active');
    });
</script>
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
        .on('changed.owl.carousel', function(event) {
            // Remove active class from all items
            $('.textSlider__carousel .owl-item').removeClass('is-center-active');

            // Get the centered item index
            var current = event.item.index;

            // Add active class to the centered item
            $('.textSlider__carousel .owl-item').eq(current).addClass('is-center-active');
        });
</script>



<!-- nav script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const OFFSET = 220; // Height of your fixed navbar

        const navLinks = document.querySelectorAll('.nav-links');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
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


<script>
    (function() {
        // DOM elements
        const nav = document.getElementById('navbar');
        const navContainer = document.querySelector('.menu__box.menubox');
        const navLinks = document.querySelectorAll('.nav-links');
        const sections = [];
        document.querySelectorAll('[id^="menuNav"]').forEach(section => {
            sections.push(section);
        });

        let activeSectionId = null;
        let isScrollingProgrammatically = false;

        const options = {
            root: null, // viewport
            rootMargin: '-20% 0px -35% 0px',
            threshold: [0, 0.25, 0.5, 0.75]
        };

        function scrollNavToActiveLink(activeLink) {
            if (!activeLink || !navContainer) return;

            const containerRect = navContainer.getBoundingClientRect();
            const linkRect = activeLink.getBoundingClientRect();

            // Check if the link is outside the visible area
            const isLinkVisible = (
                linkRect.left >= containerRect.left &&
                linkRect.right <= containerRect.right
            );

            if (!isLinkVisible) {
                isScrollingProgrammatically = true;
                const scrollLeft = navContainer.scrollLeft + (linkRect.left - containerRect.left) - (containerRect.width / 2) + (linkRect.width / 2);
                navContainer.scrollTo({
                    left: scrollLeft,
                    behavior: 'smooth'
                });

                // Reset flag after animation completes
                setTimeout(() => {
                    isScrollingProgrammatically = false;
                }, 500);
            }
        }

        // function to set active link based on the section intersecting best
        function setActiveSectionFromObserver(entries) {
            // get the entry with the highest intersection ratio that is intersecting
            let bestEntry = null;
            let maxRatio = 0;

            for (let entry of entries) {
                if (entry.isIntersecting) {
                    const ratio = entry.intersectionRatio;
                    if (ratio > maxRatio) {
                        maxRatio = ratio;
                        bestEntry = entry;
                    }
                }
            }

            if (bestEntry) {
                const section = bestEntry.target;
                const sectionId = section.getAttribute('id');

                // Extract the number from menuNav1, menuNav2, etc.
                if (sectionId && sectionId.startsWith('menuNav')) {
                    const sectionNumber = sectionId.replace('menuNav', '');
                    if (activeSectionId !== sectionNumber) {
                        activeSectionId = sectionNumber;
                        // update active class on nav links
                        updateActiveLink(sectionNumber);
                    }
                }
            }
        }

        // helper to add active class to the current nav item and remove from others
        function updateActiveLink(activeNumber) {
            let activeLink = null;

            navLinks.forEach(link => {
                const href = link.getAttribute('href');
                // Check if href is like "#menuNav1", "#menuNav2", etc.
                if (href === '#menuNav' + activeNumber) {
                    link.classList.add('active');
                    activeLink = link;
                } else {
                    link.classList.remove('active');
                }
            });

            // Scroll navigation to make active link visible
            if (activeLink) {
                scrollNavToActiveLink(activeLink);
            }
        }

        // Function to check and update active section based on scroll position
        function updateActiveSectionOnScroll() {
            let currentSection = null;
            let currentSectionNumber = null;

            // Find which section is currently in view
            for (let i = 0; i < sections.length; i++) {
                const section = sections[i];
                const rect = section.getBoundingClientRect();
                const viewportHeight = window.innerHeight;
                const offset = 200; // Offset from top

                // Check if section is in view
                if (rect.top <= viewportHeight - offset && rect.bottom >= offset) {
                    currentSection = section;
                    const sectionId = section.getAttribute('id');
                    if (sectionId && sectionId.startsWith('menuNav')) {
                        currentSectionNumber = sectionId.replace('menuNav', '');
                    }
                    break;
                }
            }

            // Update active link if section changed
            if (currentSectionNumber && activeSectionId !== currentSectionNumber) {
                activeSectionId = currentSectionNumber;
                updateActiveLink(currentSectionNumber);
            }
        }

        // Initialize Intersection Observer for all sections
        if (sections.length > 0) {
            const observer = new IntersectionObserver(setActiveSectionFromObserver, options);
            sections.forEach(section => {
                observer.observe(section);
            });
        }

        // Handle manual click on nav links
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove 'active' from all links
                navLinks.forEach(l => l.classList.remove('active'));
                // Add 'active' to the clicked link
                this.classList.add('active');

                // Scroll navigation to make active link visible
                scrollNavToActiveLink(this);

                // Scroll to the target section
                const targetID = this.getAttribute('href').substring(1);
                const targetEl = document.getElementById(targetID);
                if (targetEl) {
                    const yOffset = 220; // Height of your fixed navbar
                    const y = targetEl.getBoundingClientRect().top + window.pageYOffset - yOffset;
                    window.scrollTo({
                        top: y,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add scroll listener for navigation bar auto-scroll on section change
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(function() {
                updateActiveSectionOnScroll();
            }, 100);
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial active section
            setTimeout(updateActiveSectionOnScroll, 100);

            // Add horizontal scroll styling to navigation container
            if (navContainer) {
                navContainer.style.overflowX = 'auto';
                navContainer.style.overflowY = 'hidden';
                navContainer.style.whiteSpace = 'nowrap';
                navContainer.style.scrollBehavior = 'smooth';
                if (nav) {
                    nav.style.display = 'inline-flex';
                    nav.style.flexWrap = 'nowrap';
                    nav.style.whiteSpace = 'nowrap';
                }

                // Add custom scrollbar styling (optional)

            }
        });

        // Optional: Add mouse wheel horizontal scrolling for navigation
        if (navContainer) {
            navContainer.addEventListener('wheel', function(e) {
                if (e.deltaY !== 0 && !isScrollingProgrammatically) {
                    e.preventDefault();
                    navContainer.scrollLeft += e.deltaY;
                }
            });
        }

    })();
</script>
@endpush