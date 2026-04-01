@extends('site.layouts.layout')

@push('header')
<link rel="stylesheet" href="{{ asset('site-assets/css/fancybox.css') }}">
@endpush

@section('content')
<section class="banner banner__page">
    <div class="banner__page--img sinlge">
        <img src="{{asset('site-assets/images/menu-1.png')}}" alt="product banner">
    </div>
    <div class="banner__page--content">
        <h1>Product</h1>
        <p>Product show</p>
    </div>

</section>
<section>


    <div class="mobile-container">

        <!-- Main Content (Scrollable) -->
        <main class="content-scroll">
            <section class="hero-image-container">
                <div class="hero-image-wrapper">
                    <a href="{{ asset('site-assets/images/menu-1.png') }}" data-type="image" data-fancybox="gallery" class="hero-image-link" aria-label="Zoom image">
                        <img src="{{ asset('site-assets/images/menu-1.png') }}"
                            alt="Product Image" class="hero-image">
                        <div class="zoom-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="zoom-icon">
                                <path d="M15 15L21 21M10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 13.866 13.866 17 10 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
            </section>

            <section class="product-info">
                <h1 class="product-title">Chaat Papdi</h1>
                <p class="product-short-desc">
                    Crispy wafers layered with potatoes, chickpeas, yogurt, tamarind and mint chutneys, and sev. A
                    delightful mix of...
                </p>
                <div class="price-row">
                    <span class="price">$8.99</span>
                    <span class="tag-vegetarian">Vegetarian</span>
                </div>
            </section>

            <!-- Tabs Section -->
            <section class="tabs-container">
                <div class="tabs-header">
                    <button class="tab active" data-target="overview">Overview</button>
                    <div class="tab-divider"></div>
                    <button class="tab" data-target="faq">FAQ</button>
                    <div class="tab-divider"></div>
                    <button class="tab" data-target="order">Order Now</button>
                </div>

                <div class="tab-content-wrapper">
                    <!-- Overview Tab Content -->
                    <div class="tab-content active long-desc" id="overview">
                        <h2 class="section-title">Chaat Papdi</h2>
                        <div class=" long-desc">
                            <p>
                                Chaat Papdi consists of crispy wafers topped with diced boiled potatoes, chickpeas, yogurt,
                                tamarind chutney, mint chutney, green chilles, and is garnished with sev, chopped cilantro,
                                and a mix of Indian spices. It offers a delightful combination of sweet, tangy, and spicy
                                flavors with a variety of textures.
                            </p>

                            <ul>
                                <li>
                                    Chaat Papdi is a popular street food from India, enjoyed across the country with regional variations.
                                </li>
                                <li>
                                    Chaat Papdi is a popular street food from India, enjoyed across the country with regional variations.
                                </li>
                                <li>
                                    Chaat Papdi is a popular street food from India, enjoyed across the country with regional variations.
                                </li>
                            </ul>
                        </div>

                        <!-- <div class="details-grid">
                            <div class="ingredients-section">
                                <h3 class="subsection-title">Ingredients</h3>
                                <ul class="ingredients-list">
                                    <li class="ingredient-item">
                                        <span class="icon-check">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                        </span>
                                        Crispy wafers
                                    </li>
                                    <li class="ingredient-item">
                                        <span class="icon-check">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                        </span>
                                        Diced boiled potatoes
                                    </li>
                                    <li class="ingredient-item">
                                        <span class="icon-check">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                        </span>
                                        Chickpeas
                                    </li>
                                    <li class="ingredient-item">
                                        <span class="icon-check">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                        </span>
                                        Yogurt
                                    </li>
                                    <li class="ingredient-item">
                                        <span class="icon-check">
                                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                                            </svg>
                                        </span>
                                        Tamarind chutney
                                    </li>
                                </ul>
                            </div>

                            <div class="nutrition-section">
                                <h3 class="subsection-title">Nutrition Facts</h3>
                                <div class="nutrition-grid">
                                    <div class="nutrition-card">
                                        <div class="nutrient-icon" style="color: #ea580c;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M8.5 14.5A2.5 2.5 0 0011 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 11-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 002.5 2.5z">
                                                </path>
                                            </svg>
                                        </div>
                                        <span class="nutrient-value">280</span>
                                        <span class="nutrient-label">Calories</span>
                                    </div>
                                    <div class="nutrition-card">
                                        <div class="nutrient-icon" style="color: #94a3b8;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z"></path>
                                            </svg>
                                        </div>
                                        <span class="nutrient-value">10g</span>
                                        <span class="nutrient-label">Fat</span>
                                    </div>
                                    <div class="nutrition-card">
                                        <div class="nutrient-icon" style="color: #b91c1c;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <path d="M8 14s1.5 2 4 2 4-2 4-2"></path>
                                                <line x1="9" y1="9" x2="9.01" y2="9"></line>
                                                <line x1="15" y1="9" x2="15.01" y2="9"></line>
                                            </svg>
                                        </div>
                                        <span class="nutrient-value">29g</span>
                                        <span class="nutrient-label">Carbs</span>
                                    </div>
                                    <div class="nutrition-card">
                                        <div class="nutrient-icon" style="color: #64748b;">
                                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 8h1a4 4 0 010 8h-1"></path>
                                                <path d="M2 8h16v9a4 4 0 01-4 4H6a4 4 0 01-4-4V8z"></path>
                                                <line x1="6" y1="1" x2="6" y2="4"></line>
                                                <line x1="10" y1="1" x2="10" y2="4"></line>
                                                <line x1="14" y1="1" x2="14" y2="4"></line>
                                            </svg>
                                        </div>
                                        <span class="nutrient-value">6g</span>
                                        <span class="nutrient-label">Protein</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- FAQ Tab Content -->
                    <div class="tab-content" id="faq">
                        <h2 class="section-title">Frequently Asked Questions</h2>
                        <div class="faq-accordion">
                            <div class="faq-item">
                                <details name="faq">
                                    <summary>
                                        Is this dish very spicy?
                                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </summary>
                                    <div class="faq-answer">
                                        Chaat Papdi offers a beautifully balanced flavor profile. It has a mild tanginess from the tamarind chutney and a refreshing kick from the mint chutney, making it extremely pleasant and not overwhelmingly spicy. Perfect for all palates!
                                    </div>
                                </details>
                            </div>
                            <div class="faq-item">
                                <details name="faq">
                                    <summary>
                                        Can I order this vegan or gluten-free?
                                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </summary>
                                    <div class="faq-answer">
                                        Because our authentic recipe uses yogurt, this specific dish is vegetarian but not vegan. Additionally, the crispy papdi wafers contain gluten. However, we have an extensive menu of alternative items that cater to vegan and gluten-free diets!
                                    </div>
                                </details>
                            </div>
                            <div class="faq-item">
                                <details name="faq">
                                    <summary>
                                        How long does it take to prepare?
                                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </summary>
                                    <div class="faq-answer">
                                        As one of our most popular street-food style appetizers, Chaat Papdi is prepared rapidly to ensure the wafers remain perfectly crisp. You can typically expect it to arrive at your table within 5 to 10 minutes of ordering.
                                    </div>
                                </details>
                            </div>
                        </div>
                    </div>

                    <!-- Order Now Tab Content -->
                    <div class="tab-content" id="order">
                        <h2 class="section-title">Order Now</h2>
                        <!-- <div class="order-container">
                            <div class="order-section">
                                <h3 class="subsection-title">Quantity</h3>
                                <div class="quantity-stepper">
                                    <button class="qty-btn" id="qty-minus" aria-label="Decrease quantity">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                    <input type="number" id="product-qty" value="1" min="1" readonly>
                                    <button class="qty-btn" id="qty-plus" aria-label="Increase quantity">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="order-section">
                                <h3 class="subsection-title">Extra Add-ons</h3>
                                <div class="addons-list">
                                    <label class="addon-item">
                                        <input type="checkbox" name="addon" value="mint">
                                        <span class="addon-name">Extra Mint Chutney</span>
                                        <span class="addon-price">+$0.50</span>
                                    </label>
                                    <label class="addon-item">
                                        <input type="checkbox" name="addon" value="yogurt">
                                        <span class="addon-name">Side of Sweet Yogurt</span>
                                        <span class="addon-price">+$1.00</span>
                                    </label>
                                    <label class="addon-item">
                                        <input type="checkbox" name="addon" value="sev">
                                        <span class="addon-name">Extra Crispy Sev</span>
                                        <span class="addon-price">+$0.75</span>
                                    </label>
                                </div>
                            </div>

                            <div class="action-footer">
                                <button class="btn-add-cart">Add to Cart</button>
                                <button class="btn-order-now">Checkout Now</button>
                            </div>
                        </div> -->
                    </div>
                </div>
            </section>
        </main>
    </div>
</section>

<section class="grab" style="background: #fff4ea;">
    <div class="container-fluid">
        <div class="flex">
            <div class="section__title text-center" style="margin: auto;">
                <h4>Similar Items of Stress Food</h4>
                <h2>Stress Food</h2>
            </div>

        </div>
    </div>
    <div class="grab__box itemgrab__box" style="padding-left: 1.375rem;">
        <div class="owl-carousel owl-theme family family_caro" style="padding: 0;">
            @php
            $menus = App\Models\Menu::query()->status()->get();

            @endphp

            @foreach ($menus as $menu)
            <div class="item" style="margin-right: -20px;">
                <div class="menu__card menu__card--family" style="width: 95%;">
                    <div class="menu__card--img">
                        <a href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank">
                            <img class="owl-lazy"
                                data-src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($menu, 'image'))) }}"
                                alt="{{ $menu->name }}">
                        </a>
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" width="512"
                                height="512" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512"
                                xml:space="preserve" class="">
                                <g>
                                    <g fill="#000">
                                        <path
                                            d="M22.286 0c-.94 0-1.7.767-1.7 1.714h-.014V15.43a1.714 1.714 0 1 1-3.429 0V1.714h-.013C17.13.767 16.368 0 15.429 0c-.94 0-1.701.767-1.701 1.714h-.013V15.43a1.714 1.714 0 1 1-3.429 0V1.714C10.286.767 9.524 0 8.586 0c-.94 0-1.702.767-1.702 1.714h-.027v17.143c0 2.109 2.116 3.921 5.143 4.715v21a3.429 3.429 0 0 0 6.857 0v-21C21.884 22.778 24 20.966 24 18.857V1.714h-.013C23.987.767 23.225 0 22.286 0zM40.286 0c-6.154 0-11.142 10.745-11.142 24 0 1.164.038 2.309.113 3.429h5.03V44.57a3.429 3.429 0 0 0 6.857 0V.07a5.295 5.295 0 0 0-.858-.07z"
                                            fill="#000000" opacity="1" data-original="#000000" class=""></path>
                                    </g>
                                </g>
                            </svg>

                        </div>
                    </div>
                    <div class="menu__card--content">
                        <div class="menu__card--header">
                            <h3 class="titlehgt">
                                <a href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank">{{ $menu->name }}</a>
                            </h3>
                            <div class="menu__card--price">${{ $menu->price }}</div>
                        </div>
                        <div class="itemexcerpthover">
                            {!! $menu->excerpt !!}
                        </div>
                        <div class="menu__card--footer">
                            <span class="cat veg-btn bt-fr {{cssnonveg($menu->type)}}">{{ checkVegetarian($menu->type) }}</span>
                            <a class="menu__card--cta order-now-btn  mr-l wtc" href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank">Order Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>

@endsection

@push('footer')
<script src="{{ asset('site-assets/js/facybox.js') }}"></script>

<script>
    $('.family_caro').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplaySpeed: 2000,
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
                // margin: 15,
            },
            627: {
                items: 2,
                dots: false,
                nav: false,
            },
            767: {
                items: 2,
                dots: false,
                nav: false,
            },
            1000: {
                items: 3,
                dots: false,
                nav: false,
            },
            1200: {
                items: 4,
                dots: false,
                nav: false,
                // margin: 40,
            },
            1300: {
                items: 4,
                dots: false,
                nav: false,
                // margin: 40,
            },
        },
    }, );
</script>

<script>
    if (typeof Fancybox !== "undefined") {
        Fancybox.bind('[data-fancybox="gallery"]', {
            Fullscreen: {
                autoStart: true
            }
        });
    }


    document.addEventListener('DOMContentLoaded', () => {
        const tabs = document.querySelectorAll('.tab');
        const contents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active classes
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.remove('active'));

                // Add active class to clicked tab
                tab.classList.add('active');

                // Show corresponding content
                const targetId = tab.getAttribute('data-target');
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.add('active');
                }
            });
        });

        // Quantity Stepper Logic
        const qtyInput = document.getElementById('product-qty');
        const qtyPlus = document.getElementById('qty-plus');
        const qtyMinus = document.getElementById('qty-minus');

        if (qtyInput && qtyPlus && qtyMinus) {
            qtyPlus.addEventListener('click', () => {
                let val = parseInt(qtyInput.value) || 1;
                qtyInput.value = val + 1;
            });

            qtyMinus.addEventListener('click', () => {
                let val = parseInt(qtyInput.value) || 1;
                if (val > 1) {
                    qtyInput.value = val - 1;
                }
            });
        }
    });
</script>
@endpush