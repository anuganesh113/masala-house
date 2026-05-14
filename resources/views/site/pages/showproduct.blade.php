@extends('site.layouts.layout',[
'title' => $menu->name,
'seotitle' => $seotitle,
'description' => $seodescription,
'image' => $menu ? $menu->full_image_link : banner(),
'keywords' => $seokeywords,
])


@push('header')
<link rel="stylesheet" href="{{ asset('site-assets/css/fancybox.css') }}">
<style>
    .long-desc p,
    .long-desc li,
    .long-desc span,
    .product-short-desc p,
    .product-short-desc {
        font-family: "Sansita Swashed", sans-serif;
    }
</style>
@endpush

@section('content')
<section class="banner banner__page">
    <div class="banner__page--img sinlge">
        <img style="object-position: top;" src="{{ asset('uploads/categories/' . $cat_image_link) }}" alt="{{$menu->name ?? '' }}">
    </div>
    <div class="banner__page--content">
        <h1>{{$cat_name ?? 'Category Name'}}</h1>
        <p> <a href="{{url('/') }}" class="text-white"><i class="fas fa-home"></i></a> / {{$cat_name ?? 'Category Name'}} / {{ $menu->name ?? 'Product Name' }}</p>
    </div>

</section>
<section>


    <div class="mobile-container">

        <!-- Main Content (Scrollable) -->
        <main class="content-scroll">
            <section class="hero-image-container">
                <div class="hero-image-wrapper">
                    <a href="{{$menu->full_image_link}}" data-type="image" data-fancybox="gallery" class="hero-image-link" aria-label="Zoom image">
                        <img src="{{$menu->full_image_link}}"
                            alt="{{$menu->image_alt ?? $menu->name}}" class="hero-image">
                        <div class="zoom-btn" style="z-index: 1;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" class="zoom-icon">
                                <path d="M15 15L21 21M10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10C17 13.866 13.866 17 10 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </a>
                </div>
            </section>

            <section class="product-info">
                <h1 class="product-title">{{$menu->name ?? 'Product Name'}}</h1>
                <p class="product-short-desc">
                    {!! strip_tags($menu->excerpt ?? 'Short product description goes here. This should be a brief summary that highlights the key features and appeal of the dish, enticing customers to learn more.') !!}
                </p>
                <div class="price-row">
                    <span class="price">${{$menu->price ?? '0.00'}}</span>
                    <span class="cat tag-vegetarian  {{cssnonveg($menu->type)}}">{{ checkVegetarian($menu->type) }}</span>


                </div>

            </section>

            <!-- Tabs Section -->
            <section class="tabs-container">
                <div class="tabs-header">
                    <button class="tab active" data-target="overview"><i class="fas fa-file-alt"></i> Description</button>
                    <div class="tab-divider"></div>
                    <button class="tab" data-target="faq"><i class="fas fa-question-circle"></i> FAQ</button>
                    <div class="tab-divider"></div>
                    <a href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank" class="btn bg-orange text-white"> <i class="fas fa-shopping-cart"></i> Order Now</a>
                    <div class="mapbtn up">
                        <a href="{{google_map_address()}}" target="_blank" class="btn viewmapmenu up">

                            <i class="fas fa-location-dot locationm"></i>

                            <em style="text-align: -webkit-auto;"><b> Location</b>
                                <br>
                                <em style="font-size: 9px;"> view on map </em>
                            </em>
                            <i class="fas fa-arrow-up-right-from-square fromsquare"></i>
                        </a>

                    </div>
                </div>
                <div class="mapbtn down">
                    <a href="{{google_map_address()}}" target="_blank" class="btn viewmapmenu down">
                        <i class="fas fa-location-dot locationm"></i>
                        <em style="text-align: -webkit-auto;"><b> Location</b>
                            <br>view on map</em><i class="fas fa-arrow-up-right-from-square fromsquare"></i>
                    </a>

                </div>

                <div class="tab-content-wrapper" style="background: #fff4ea;border-radius: 25px;">
                    <!-- Overview Tab Content -->
                    <div class="tab-content active long-desc" id="overview">
                        <h2 class="section-title">{{$menu->name ?? 'Product Name'}}</h2>
                        <div class=" long-desc">
                            {!!$menu->description ?? $menu->excerpt ?? 'Detailed product description goes here. This section can include information about the ingredients, preparation method, taste profile, and any other relevant details that would help customers understand what makes this dish special.' !!}
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
                            @if(isset($menu) && $menu->menufaqs->isNotEmpty())
                            @foreach($menu->menufaqs as $val)
                            <div class="faq-item">
                                <details name="faq">
                                    <summary>
                                        {{$val->question}}
                                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </summary>
                                    <div class="faq-answer">
                                        {!! $val->answer !!}
                                    </div>
                                </details>
                            </div>
                            @endforeach

                            @else

                            <div class="faq-item">
                                <details name="faq">
                                    <summary>
                                        No FAQs available for this menu
                                        <svg class="faq-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </summary>
                                    <div class="faq-answer">
                                        No FAQs available for this menu
                                </details>
                            </div>
                            @endif
                            <!-- <div class="faq-item">
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
                            </div> -->
                        </div>
                    </div>

                    <!-- Order Now Tab Content -->
                    <!-- <div class="tab-content" id="order">
                        <h2 class="section-title">Order Now</h2>
                         <div class="order-container">
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
                        </div> 
                    </div> -->
                </div>
            </section>
        </main>
    </div>
</section>

<section class="grab" style="background: #fff4ea;">
    <div class="container-fluid">
        <div class="flex">
            <div class="section__title text-center" style="margin: auto;">
                <!-- <h4>Similar Items of {{$menu->name ?? 'Similar Items' }}</h4> -->

                <h2>{{ 'Similar Items' }}</h2>
            </div>

        </div>
    </div>
    <div class="grab__box itemgrab__box" style="padding-left: 1.375rem;">
        <div class="owl-carousel owl-theme family family_caro" style="padding: 0;">


            @foreach ($similarMenus as $menu)
            <div class="item" style="margin-right: -20px;">
                <div class="menu__card menu__card--family" style="width: 95%;">
                    <a href="{{ route('product.old', ['id' => $menu->id]) }}" target="">
                        <div class="menu__card--img">

                            <img class="owl-lazy"
                                data-src="{{ asset(sprintf('%s%s', \App\Enums\UploadFilePath::MENUS_PATH, data_get($menu, 'image'))) }}"
                                alt="{{ $menu->image_alt ?? $menu->name }}">

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
                    </a>

                    <div class="menu__card--content">
                        <div class="menu__card--header">
                            <h3 class="titlehgt">
                                <a href="{{ route('product.old', ['id' => $menu->id]) }}" target="_blank">{{ $menu->name }}</a>
                            </h3>
                            <div>

                                <span class="menu__card--price">${{ $menu->price }}</span>
                                <span class="text-white br-25  bt-fr {{$menu->type == 'veg' ? 'bg-green' : 'cssnonveg'}}" style="font-size: 0.725rem;font-weight: 400;padding: 5px 15px 5px 15px;">{{ checkVegetarian($menu->type) }}</span>
                            </div>

                        </div>
                        <div class="itemexcerpthover">
                            <p>{!! strip_tags($menu->excerpt ?? 'no description available') !!}</p>
                        </div>
                    
                        <div class="menu__card--footer">
                            <span class="btn veg-btn bt-fr  menuviewbtn br-25 iisection mb-1" style="width: 100%;">
                                <a href="{{ route('product.old', ['id' => $menu->id]) }}" target="" style="color: inherit;font-size: 18px;">
                                    <i class="fas fa-search"></i> View Details
                                </a>
                            </span>
                            <a class="menu__card--cta order-now-btn viewip ml-auto   wtc mb-1" style="width: 100%;margin-left: auto;" href="{{ requesturl() . '/' . $menu->slug  }}" target="_blank"><i class="fas fa-shopping-cart"></i> Order Now</a>
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
        autoplaySpeed: 500,
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